<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->nullable()->references('id')->on('shop_product_comments')->onDelete('CASCADE');
            $table->integer('author_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->integer('product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->timestamps();
            $table->string('text', 500);
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_comments');
    }
}
