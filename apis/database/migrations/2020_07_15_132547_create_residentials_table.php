<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residentials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('cost_per_month');
            $table->integer('num_of_rooms');
            $table->integer('num_of_baths');
            $table->tinyInteger('is_rented');
            $table->integer('location_id');
            $table->string('address');
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
        Schema::dropIfExists('residentials');
    }
}
