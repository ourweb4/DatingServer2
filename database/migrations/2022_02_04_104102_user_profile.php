<?php
/*
* File Name:  UserProfile.php
* Created on 2/4/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserProfile extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            //

            $table->string('instagram_utl')->nullable();
            $table->string('facebook_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user_profile', function (Blueprint $table) {
            //
        });
    }
}
