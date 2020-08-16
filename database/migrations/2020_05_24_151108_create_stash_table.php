<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stashes', function (Blueprint $table) {
            $table->increments('stash_id');
            $table->integer('thread_id')->references('id')->on('threads');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('skein')->nullable(false);
            $table->integer('bobbin')->nullable(false);
            $table->integer('partial')->nullable(false);
            $table->integer('need')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stashes');
    }
}
