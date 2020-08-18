<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function planets()
    {
        return $this->hasMany(Planet::class);
    }

    public function scopeWithCcps($query, $alias = 'CCPs')
    {
        $query->addSelect([$alias => User::selectRaw('GROUP_CONCAT(users.name SEPARATOR ", ") ')
            ->leftJoin('duty_user', 'duty_user.user_id', 'users.id')
            ->whereColumn('duty_user.duty_id', 'incidents.duty_id')]);
    }
}
