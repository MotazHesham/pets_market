<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variation')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 15, 2);
            $table->decimal('total_cost', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
