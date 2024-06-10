<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefugePetsTable extends Migration
{
    public function up()
    {
        Schema::create('refuge_pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
