<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_characteristics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('type', 16);
            $table->boolean('required');
            $table->string('default');
            $table->integer('sort');
        });

        Schema::create('shop_characteristic_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('characteristic_id')->references('id')->on('shop_characteristics')->onDelete('CASCADE');
            $table->string('name', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_characteristic_variants');
        Schema::dropIfExists('shop_characteristics');
    }
}
