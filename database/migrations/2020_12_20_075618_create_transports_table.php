<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('travel_summary')->nullable();
            $table->unsignedInteger('from_entity')->nullable();
            $table->unsignedInteger('to_entity')->nullable();
            $table->text('summary')->nullable();
            $table->text('days')->nullable();
            $table->text('hours')->nullable();
            $table->string('cover_image_url');
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
        Schema::dropIfExists('transports');
    }
}
