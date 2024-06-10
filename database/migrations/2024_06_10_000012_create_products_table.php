<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->longText('details');
            $table->longText('short_details');
            $table->string('added_by')->nullable();
            $table->string('slug');
            $table->string('attributes')->nullable();
            $table->longText('attribute_options')->nullable();
            $table->string('colors')->nullable();
            $table->longText('tags')->nullable();
            $table->string('video_provider')->nullable();
            $table->string('video_link')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->boolean('published')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('variant_product')->default(0);
            $table->integer('rating');
            $table->integer('current_stock');
            $table->integer('num_of_sale');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
