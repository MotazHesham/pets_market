<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdoptionRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('adoption_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('refuge_pet_id')->nullable();
            $table->foreign('refuge_pet_id', 'refuge_pet_fk_9859177')->references('id')->on('refuge_pets');
        });
    }
}
