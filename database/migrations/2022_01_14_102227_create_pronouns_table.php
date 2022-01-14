<?php
/*
* File Name:  CreatePronounsTable.php
* Created on 1/14/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronounsTable extends Migration
{
    public function up()
    {
        Schema::create('pronouns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pronouns');
    }
}
