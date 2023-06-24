<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewColumnsOnCoworkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coworkings', function (Blueprint $table) {
            $table->integer('space_type')->default(0);
            $table->integer('car_parking')->default(0);
            $table->integer('interest')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coworkings', function (Blueprint $table) {
            $table->dropColumn('space_type');
            $table->dropColumn('car_parking');
            $table->dropColumn('interest');
        });
    }
}
