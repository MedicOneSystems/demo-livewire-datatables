<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
