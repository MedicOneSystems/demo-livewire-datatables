<?php

namespace App;

use App\Planet;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function comrades()
    {
        return $this->hasManyThrough(User::class, Planet::class, 'id', 'planet_id', 'planet_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class);
    }

    public function planet()
    {
        return $this->belongsTo(Planet::class);
    }

    public function region()
    {
        return $this->hasOneThrough(Region::class, Planet::class, 'id', 'id', 'planet_id', 'region_id');
    }

    public function scopeSelectGroupedWeaponNames($query, $alias)
    {
        $query->addSelect([
            $alias => Weapon::selectRaw('GROUP_CONCAT(name SEPARATOR " | ")')
                ->leftJoin('user_weapon', 'user_weapon.weapon_id', 'weapons.id')
                ->whereColumn('user_weapon.user_id', 'users.id')
        ]);
    }

    public function scopeFilterWeaponNames($query, $value)
    {
        $query->whereHas('weapons', function ($query) use ($value) {
            $query->where('weapons.id', $value);
        });
    }

    public function scopeHasLightSaber($query, $alias)
    {
        $query->addSelect([
            $alias => Weapon::selectRaw('IF(COUNT(weapons.id), 1, 0)')
                ->leftJoin('user_weapon', 'user_weapon.weapon_id', 'weapons.id')
                ->whereColumn('user_weapon.user_id', 'users.id')
                ->where('weapons.name', 'Light Saber')
        ]);
    }

    public function scopeFilterHasLightSaber($query, $value)
    {
        $query->whereHas('weapons', function ($query) use ($value) {
            $query->where('weapons.name', $value ? '=' : '<>', 'Light Saber');
        });
    }
}
