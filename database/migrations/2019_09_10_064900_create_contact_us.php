<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_contact_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('more_info', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('landline', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('business_hours', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('google_map', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_contact_us');
    }
}
