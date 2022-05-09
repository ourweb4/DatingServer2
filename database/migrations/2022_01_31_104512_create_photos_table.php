<?php
/*
* File Name:  CreatephotosTable.php
* Created on 1/31/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatephotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->string('filename');
            $table->string('title')->nullable();
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
