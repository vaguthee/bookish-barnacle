<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->string('title')->nullable();
            $table->string('tags')->nullable();
            $table->string('keywords')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('feature_image_url')->nullable();
            $table->boolean('published')->default(false);
            $table->dateTime('publish_date')->default('2019-12-18 00:00:00');
            $table->text('body');
            $table->unsignedBigInteger('profile_id')->index();
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
        Schema::dropIfExists('templates');
    }
}
