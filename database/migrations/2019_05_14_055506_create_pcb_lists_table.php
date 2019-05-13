<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcbListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcb_lists', function (Blueprint $table) {
            $table->increments('id');

            $table->string('board_name')->unique();

            $table->integer('top_num')->nullable();

            $table->integer('bot_num')->nullable();

            $table->string('unit')->nullable();

            $table->string('note')->nullable();

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
        Schema::dropIfExists('pcb_lists');
    }
}
