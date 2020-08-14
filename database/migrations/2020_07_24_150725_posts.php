<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // blog table
      Schema::create('posts', function (Blueprint $table) {
        $table->id()->unsigned();
        $table->string('title')->unique();
        $table->text('body');
        $table->string('slug')->unique();
        $table->string('seotitle');
        $table->string('seodescription');
        $table->boolean('active');
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
        Schema::drop('posts');
    }
}
