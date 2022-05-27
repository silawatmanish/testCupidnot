<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('google_id')->nullable();
            $table->boolean('is_admin')->nullable();
            
            $table->date('date_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('annual_income')->nullable();
            $table->enum('occupation', ['Private Job', 'Government Job', 'Business'])->nullable();
            $table->enum('family_type', ['Joint family', 'Nuclear family'])->nullable();
            $table->enum('Manglik', ['Yes', 'No'])->nullable();
            $table->float('preference_expected_income_min', 8, 2)->nullable();
            $table->float('preference_expected_income_max', 8, 2)->nullable();

            $table->string('preference_occupation')->nullable();
            $table->string('preference_family_type')->nullable();

            $table->enum('preference_manglik', ['Yes', 'No', 'Both'])->nullable();


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
