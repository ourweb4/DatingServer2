<?php
/*
* File Name:  CreateInterestsListsTable.php
* Created on 1/10/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsListsTable extends Migration
{
    public function up()
    {
        Schema::create('interests_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('interests_id');
            $table->bigInteger('user_id');


            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interests_lists');
    }
}
