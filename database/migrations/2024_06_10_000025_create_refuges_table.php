<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefugesTable extends Migration
{
    public function up()
    {
        Schema::create('refuges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->longText('about_us')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
