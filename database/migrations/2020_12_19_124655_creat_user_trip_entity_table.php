<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatUserTripEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trip_entity', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('price')->nullable();
            $table->boolean('is_booking')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('entity_id')->nullable();
            $table->unsignedInteger('trip_id')->nullable();
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
        Schema::dropIfExists('user_trip_entity');
    }
}
