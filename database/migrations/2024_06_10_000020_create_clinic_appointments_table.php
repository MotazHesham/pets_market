<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('clinic_appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name');
            $table->string('phone');
            $table->string('email');
            $table->longText('address')->nullable();
            $table->date('date');
            $table->time('time');
            $table->integer('age');
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
