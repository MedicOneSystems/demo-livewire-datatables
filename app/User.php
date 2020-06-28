<?php

namespace App;

use App\Planet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class);
    }

    public function planet()
    {
        return $this->belongsTo(Planet::class);
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
}
