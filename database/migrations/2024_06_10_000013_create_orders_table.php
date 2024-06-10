<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_num')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->decimal('shipping_country_cost', 15, 2);
            $table->string('city')->nullable();
            $table->longText('shipping_address')->nullable();
            $table->string('delivery_status')->nullable();
            $table->decimal('total_cost', 15, 2);
            $table->string('payment_type');
            $table->string('payment_status');
            $table->decimal('discount', 15, 2);
            $table->string('discount_code')->nullable();
            $table->longText('cancel_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
