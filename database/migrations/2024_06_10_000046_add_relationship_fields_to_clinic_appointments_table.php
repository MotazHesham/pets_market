<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClinicAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::table('clinic_appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_9853997')->references('id')->on('clinic_services');
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id', 'clinic_fk_9853998')->references('id')->on('clinics');
            $table->unsignedBigInteger('pet_type_id')->nullable();
            $table->foreign('pet_type_id', 'pet_type_fk_9854019')->references('id')->on('pet_types');
        });
    }
}
