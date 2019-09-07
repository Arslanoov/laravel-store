<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('category_id')->nullable()->references('id')->on('shop_categories')->onDelete('CASCADE');
            $table->integer('brand_id')->nullable()->references('id')->on('shop_brands')->onDelete('CASCADE');
            $table->string('availability', 16);
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->integer('price');
            $table->text('content');
            $table->string('status');
            $table->integer('rating')->nullable();
            $table->integer('reviews');
            $table->integer('comments');
        });

        Schema::create('shop_product_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->string('photo');
        });

        Schema::create('shop_product_characteristics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->integer('characteristic_id')->references('id')->on('shop_characteristics')->onDelete('CASCADE');
            $table->integer('variant_id')->nullable()->references('id')->on('shop_characteristic_variants')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_characteristics');
        Schema::dropIfExists('shop_product_photos');
        Schema::dropIfExists('shop_products');
    }
}
