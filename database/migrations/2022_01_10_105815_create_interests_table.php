<?php
/*
* File Name:  CreateInterestsTable.php
* Created on 1/10/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interests');
    }
}
