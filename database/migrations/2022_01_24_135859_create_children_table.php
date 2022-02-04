<?php
/*
* File Name:  CreateChildrenTable.php
* Created on 1/24/2022
* (c) 2022 Bill Banks
*/


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('children');
    }
}
