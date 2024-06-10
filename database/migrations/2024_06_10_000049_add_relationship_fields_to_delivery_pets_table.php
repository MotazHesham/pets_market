<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDeliveryPetsTable extends Migration
{
    public function up()
    {
        Schema::table('delivery_pets', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_type_id')->nullable();
            $table->foreign('pet_type_id', 'pet_type_fk_9859126')->references('id')->on('pet_types');
        });
    }
}
