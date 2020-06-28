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
}
