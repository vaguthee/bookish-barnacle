<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('tags')->nullable();
            $table->string('keywords')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('feature_image_url')->nullable();
            $table->text('body');
            $table->boolean('published')->default(false);
            $table->boolean('as_template')->default(false);
            $table->dateTime('publish_date')->default('2019-03-10 00:00:00');
            $table->unsignedBigInteger('profile_id')->index();
            $table->string('own_page_url')->nullable();
            $table->string('hidden_from_list')->default(false); //if true wont be displayed on listings but show method will work.
            $table->string('redirect_url')->nullable();//redirect to other sites from backend. dont give access to others
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
        Schema::dropIfExists('pages');
    }
}
