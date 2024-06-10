<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPetsTable extends Migration
{
    public function up()
    {
        Schema::create('user_pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
