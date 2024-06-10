<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClinicServicesTable extends Migration
{
    public function up()
    {
        Schema::table('clinic_services', function (Blueprint $table) {
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id', 'clinic_fk_9853978')->references('id')->on('clinics');
        });
    }
}
