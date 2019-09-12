<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PortfolioServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_portfolio_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('portfolio_id')->index();
            $table->unsignedBigInteger('service_id')->index()->nullable();

            $table->foreign(['portfolio_id'])->references('id')->on('core_portfolios')->onDelete('cascade');
            $table->foreign(['service_id'])->references('id')->on('core_services')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('core_portfolio_services', function (Blueprint $table) {
            $table->dropForeign(['portfolio_id']);
            $table->dropForeign(['service_id']);
        });
        Schema::dropIfExists('core_portfolio_services');
    }
}
