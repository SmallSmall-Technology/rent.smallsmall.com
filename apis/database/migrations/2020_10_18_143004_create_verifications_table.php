<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
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
            $table->string('validID_path')->nullable();
            $table->string('bank_statement_1')->nullable();
            $table->string('bank_statement_2')->nullable();
            $table->string('bank_statement_3')->nullable();
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
        Schema::dropIfExists('verifications');
    }
}
