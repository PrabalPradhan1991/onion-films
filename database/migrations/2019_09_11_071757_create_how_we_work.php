<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowWeWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_we_work', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('link', 255)->nullable();
            $table->string('first', 255)->nullable();
            $table->string('second', 255)->nullable();
            $table->string('asset', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('how_we_work');
    }
}
