<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('service', 150);
            $table->text('description');
            $table->unsignedInteger('ordering')->nullable();
            $table->string('icon', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_services');
    }
}
