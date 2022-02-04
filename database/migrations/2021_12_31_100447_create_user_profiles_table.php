<?php
/*
* File Name:  CreateUserProfilesTable.php
* Created on 12/31/2021
* (c) 2021 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('profilepicture')->nullable();
            $table->string('school')->nullable();
            $table->string('occupation')->nullable();
            $table->string('height')->nullable();
            $table->string('about',500)->nullable();
            $table->date('dob');
            $table->integer('gender_id')->nullable();
            $table->integer('education_id')->nullable();
            $table->integer('politics_id')->nullable();
            $table->integer('children_id')->nullable();
            $table->integer('religion_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('vaccine')->nullable();
            $table->boolean('active')->nullable();


            //
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
