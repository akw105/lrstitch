<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Userprojects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprojects', function (Blueprint $table) {
            $table->integer('userid');
            $table->integer('projectid');
            $table->string('status');
            $table->dateTime('datestart')->nullable();
            $table->dateTime('dateend')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userprojects');

    }
}
