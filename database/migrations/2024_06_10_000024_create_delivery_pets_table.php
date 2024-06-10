<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryPetsTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from_city')->nullable();
            $table->string('to_city')->nullable();
            $table->integer('num_of_pets')->nullable();
            $table->date('date')->nullable();
            $table->longText('note')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
