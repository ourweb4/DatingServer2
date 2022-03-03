<?php
/*
* File Name:  CreateMessagesTable.php
* Created on 3/3/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('to_user_id')->nullable();
            $table->integer('from_user_id')->nullable();
            $table->multiLineString('message')->nullable();
            $table->string('subject')->nullable();
            $table->integer('next_id')->nullable();
            $table->integer('prev_id')->nullable();
            $table->boolean('read')->default(false);

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
