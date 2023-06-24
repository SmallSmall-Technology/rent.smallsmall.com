<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('location_id');
            $table->string('address');
            $table->longText('description');
            $table->integer('cost_per_month');
            $table->tinyInteger('box_per_space');
            $table->tinyInteger('furnisure_per_space');
            $table->tinyInteger('is_rented');
            $table->tinyInteger('with_security');
            $table->tinyInteger('with_furnisure');
            $table->tinyInteger('is_favourite');
            // // 'images_array' => $faker->array('1'),
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
        Schema::dropIfExists('storages');
    }
}
