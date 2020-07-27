<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->boolean('is_feature')->default(false);
            $table->boolean('shippable')->default(false);
            $table->boolean('downloadable')->default(false);
            $table->string('sku');
            $table->unsignedDouble('regular_price');
            $table->unsignedDouble('sale_price')->nullable();
            $table->unsignedInteger('quantity');
            $table->unsignedTinyInteger('status')->default(1); // 1 - active ; 0 - inactive
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
