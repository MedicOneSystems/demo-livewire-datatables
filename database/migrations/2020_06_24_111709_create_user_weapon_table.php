<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWeaponTable extends Migration
{
    public function up()
    {
        Schema::create('user_weapon', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('weapon_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_weapon');
    }
}
