<?php
/*
* File Name:  CreateDateabilitydeetsListsTable.php
* Created on 1/11/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateabilitydeetsListsTable extends Migration
{
    public function up()
    {
        Schema::create('dateabilitydeets_lists', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('dateabilitydeets_id');
            $table->bigInteger('user_id');
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dateabilitydeets_lists');
    }
}
