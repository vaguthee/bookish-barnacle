<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('category');
            $table->string('island')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->unsignedInteger('total_review_count')->nullable();
            $table->float('average_rating')->nullable();
            $table->unsignedInteger('average_price')->nullable();
            $table->string('average_price_currency')->nullable();
            $table->string('cover_image_url')->nullable();
            $table->boolean('published')->default(false);
            $table->text('summary')->nullable();
            $table->text('getting_here')->nullable();
            #transport specific
            $table->text('travel_summary')->nullable();
            $table->unsignedInteger('from_entity')->nullable();
            $table->unsignedInteger('to_entity')->nullable();
            $table->text('days')->nullable();
            $table->text('hours')->nullable();
            // $table->text('summary')->nullable();
            // $table->string('cover_image_url');
            
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
        Schema::dropIfExists('entities');
    }
}
