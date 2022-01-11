<?php
/*
* File Name:  CreateDateabilitydeetsTable.php
* Created on 1/11/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateabilitydeetsTable extends Migration
{
    public function up()
    {
        Schema::create('dateabilitydeets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dateabilitydeets');
    }
}
