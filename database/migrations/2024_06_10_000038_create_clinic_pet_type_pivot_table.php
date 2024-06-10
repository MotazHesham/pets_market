<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicPetTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('clinic_pet_type', function (Blueprint $table) {
            $table->unsignedBigInteger('clinic_id');
            $table->foreign('clinic_id', 'clinic_id_fk_9854018')->references('id')->on('clinics')->onDelete('cascade');
            $table->unsignedBigInteger('pet_type_id');
            $table->foreign('pet_type_id', 'pet_type_id_fk_9854018')->references('id')->on('pet_types')->onDelete('cascade');
        });
    }
}
