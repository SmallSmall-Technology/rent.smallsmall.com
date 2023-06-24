<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('gross_annual_income')->nullable();
            $table->string('birth_place')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('marital_status')->nullable();
            $table->longText('present_address')->nullable();
            $table->foreignId('present_country')->nullable();
            $table->string('duration_present_address')->nullable();
            $table->enum('current_renting_status', ['No', 'Yes'])->default('No');
            $table->enum('disability', ['No', 'Yes'])->default('No');
            $table->enum('pets', ['No', 'Yes'])->default('No');
            $table->string('present_landlord')->nullable();
            $table->string('landlord_email')->nullable();
            $table->string('landlord_phone')->nullable();
            $table->string('landlord_address')->nullable();
            $table->string('reason_for_living')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('company_name')->nullable();
            $table->longText('company_address')->nullable();
            $table->string('hr_manager_name')->nullable();
            $table->string('hr_manager_email')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_email')->nullable();
            $table->string('guarantor_phone')->nullable();
            $table->string('guarantor_occupation')->nullable();
            $table->string('guarantor_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('gross_annual_income');
            $table->dropColumn('birth_place');
            $table->dropColumn('country_id');
            $table->dropColumn('dob');
            $table->dropColumn('marital_status');
            $table->dropColumn('present_address');
            $table->dropColumn('present_country');
            $table->dropColumn('duration_present_address');
            $table->dropColumn('current_renting_status');
            $table->dropColumn('disability');
            $table->dropColumn('pets');
            $table->dropColumn('present_landlord');
            $table->dropColumn('landlord_email');
            $table->dropColumn('landlord_phone');
            $table->dropColumn('landlord_address');
            $table->dropColumn('reason_for_living');
            $table->dropColumn('employment_status');
            $table->dropColumn('occupation');
            $table->dropColumn('company_name');
            $table->dropColumn('company_address');
            $table->dropColumn('hr_manager_name');
            $table->dropColumn('hr_manager_email');
            $table->dropColumn('office_phone');
            $table->dropColumn('guarantor_name');
            $table->dropColumn('guarantor_email');
            $table->dropColumn('guarantor_phone');
            $table->dropColumn('guarantor_occupation');
            $table->dropColumn('guarantor_address');
        });
    }
}
