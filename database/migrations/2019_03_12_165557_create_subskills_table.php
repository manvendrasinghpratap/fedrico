<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubskillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subskills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skill_name','100');
            $table->integer('skill_id')->unsigned()->nullable();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
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
        Schema::dropIfExists('subskills');
    }
}
