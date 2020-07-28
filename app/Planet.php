<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
