<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('instagram')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_2')->nullable();
            $table->longText('keywords_seo')->nullable();
            $table->string('author_seo')->nullable();
            $table->string('sitemap_link_seo')->nullable();
            $table->longText('description_seo')->nullable();
            $table->string('count_stores')->nullable();
            $table->string('count_pets')->nullable();
            $table->string('count_tweets')->nullable();
            $table->string('count_products')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
