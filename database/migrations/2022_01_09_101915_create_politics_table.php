<?php
/*
* File Name:  CreatePoliticsTable.php
* Created on 1/9/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliticsTable extends Migration
{
    public function up()
    {
        Schema::create('politics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('politics');
    }
}
