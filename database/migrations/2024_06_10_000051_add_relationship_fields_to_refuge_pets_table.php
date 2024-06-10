<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRefugePetsTable extends Migration
{
    public function up()
    {
        Schema::table('refuge_pets', function (Blueprint $table) {
            $table->unsignedBigInteger('refuge_id')->nullable();
            $table->foreign('refuge_id', 'refuge_fk_9859163')->references('id')->on('refuges');
        });
    }
}
