<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardnames', function (Blueprint $table) {
            $table->increments('id');

            $table->string('boardname')->unique();  #보드명

            $table->integer('top_num')->nullable();  #top부품수

            $table->integer('bot_num')->nullable();  #bot부품수     

            $table->string('method')->nullable();   #smt or dip

            $table->string('note')->nullable();     #메모

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boardnames');
    }
}
