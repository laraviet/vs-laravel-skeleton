<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_revenue_daily', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('day');
            $table->unsignedDouble('total_revenue')->default(0);
            $table->unsignedInteger('order_count')->default(0);
            $table->unsignedDouble('order_revenue')->default(0);
            $table->timestamps();
        });
        Schema::create('report_revenue_monthly', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->string('month');
            $table->unsignedDouble('total_revenue')->default(0);
            $table->unsignedInteger('order_count')->default(0);
            $table->unsignedDouble('order_revenue')->default(0);
            $table->timestamps();
        });
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDouble('total_revenue')->default(0);
            $table->unsignedInteger('order_count')->default(0);
            $table->unsignedDouble('order_revenue')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_request_monthly');
        Schema::dropIfExists('report_request_daily');
        Schema::dropIfExists('report_revenue_monthly');
        Schema::dropIfExists('report_revenue_daily');
    }
}
