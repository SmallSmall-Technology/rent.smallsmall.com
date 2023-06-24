<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoworkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coworkings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('cost_per_month');
            $table->integer('location_id');
            $table->longText('address');
            $table->tinyInteger('people_per_space');
            $table->tinyInteger('with_parking');
            $table->tinyInteger('with_generator');
            $table->tinyInteger('is_furnished');
            $table->tinyInteger('is_rented');
            $table->tinyInteger('is_favourite');
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
        Schema::dropIfExists('coworkings');
    }
}
