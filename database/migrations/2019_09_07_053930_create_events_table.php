<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title', 255);
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('asset', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('event_time', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->date('deadline');
            $table->unsignedInteger('ordering')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_events');
    }
}
