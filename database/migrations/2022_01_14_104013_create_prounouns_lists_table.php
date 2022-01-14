<?php
/*
* File Name:  CreateProunounsListsTable.php
* Created on 1/14/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProunounsListsTable extends Migration
{
    public function up()
    {
        Schema::create('prounouns_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pronouns_id');
            $table->bigInteger('user_id');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prounouns_lists');
    }
}
