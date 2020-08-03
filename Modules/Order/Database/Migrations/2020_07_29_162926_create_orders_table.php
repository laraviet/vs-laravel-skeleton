<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->nullable();
            $table->unsignedDouble('amount');
            $table->unsignedBigInteger('order_by')->nullable();
            $table->unsignedTinyInteger('status')->default(0); // 0 - Pending, 1 - Processing, 2 - Submitted, 3 - Cancelled, 4 - Completed
            $table->timestamps();

            $table->foreign('order_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
