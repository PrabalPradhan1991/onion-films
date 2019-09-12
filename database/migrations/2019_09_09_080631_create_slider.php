<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_slider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('asset', 255);
            $table->string('mime', 255);
            $table->string('intro_text', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->enum('is_active', ['yes','no'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_slider');
    }
}
