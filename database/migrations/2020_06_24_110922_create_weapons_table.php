<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsTable extends Migration
{
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('power');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weapons');
    }
}
