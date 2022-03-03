<?php
/*
* File Name:  UserProfiles.php
* Created on 2/6/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserProfiles extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            //

            $table->string('instagram_utl')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('email')->nullable();
            $table->boolean('sendmess')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            //
        });
    }
}
