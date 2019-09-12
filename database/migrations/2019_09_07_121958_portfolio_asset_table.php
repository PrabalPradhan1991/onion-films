<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PortfolioAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_portfolio_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('asset', 255);
            $table->enum('type', ['image', 'video']);
            $table->string('mime', 255)->nullable();
            $table->unsignedBigInteger('portfolio_id')->index();
            $table->foreign(['portfolio_id'])->references('id')->on('core_portfolios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('core_portfolio_assets', function (Blueprint $table) {
            $table->dropForeign(['portfolio_id']);
        });
        Schema::dropIfExists('core_portfolio_assets');
    }
}
