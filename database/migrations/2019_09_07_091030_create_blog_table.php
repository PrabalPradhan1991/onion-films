<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title', 255);
            $table->string('slug', 255)->nullable();
            $table->string('sub_title', 255);
            $table->string('asset', 255);
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('tags', 255);
            $table->date('publish_date')->nullable();
            $table->enum('is_active', ['yes','no']);
            $table->string('author', 255);
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_keywords', 255)->nullable();
            $table->string('seo_description', 255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_blogs');
    }
}
