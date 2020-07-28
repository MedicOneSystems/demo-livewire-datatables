<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function planets()
    {
        return $this->hasMany(Planet::class);
    }
}
