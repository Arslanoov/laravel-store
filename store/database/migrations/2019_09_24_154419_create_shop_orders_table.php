<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->integer('customer_data_id')->nullable()->references('id')->on('shop_order_customer_data')->onDelete('CASCADE');
            $table->integer('delivery_data_id')->nullable()->references('id')->on('shop_order_delivery_data')->onDelete('CASCADE');
            $table->integer('delivery_method_id')->nullable()->references('id')->on('shop_delivery_methods')->onDelete('CASCADE');
            $table->timestamps();
            $table->string('delivery_method_name', 255)->nullable();
            $table->integer('delivery_method_cost')->nullable();
            $table->string('payment_method', 255)->nullable();
            $table->integer('cost');
            $table->string('note', 500)->nullable();
            $table->string('current_status', 255);
            $table->string('cancel_reason')->nullable();
        });

        Schema::create('shop_order_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->references('id')->on('shop_orders')->onDelete('CASCADE');
            $table->timestamps();
            $table->string('value', 255);
        });

        Schema::create('shop_order_delivery_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('region_id')->references('id')->on('regions');
            $table->string('code', 255);
        });

        Schema::create('shop_order_customer_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->string('patronymic', 255);
            $table->string('email', 255);
            $table->string('phone', 255);
        });

        Schema::create('shop_order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->references('id')->on('shop_orders')->onDelete('CASCADE');
            $table->integer('product_id')->references('id')->on('shop_products');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->integer('total_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order_items');
        Schema::dropIfExists('shop_order_customer_data');
        Schema::dropIfExists('shop_order_delivery_data');
        Schema::dropIfExists('shop_order_statuses');
        Schema::dropIfExists('shop_orders');
    }
}
