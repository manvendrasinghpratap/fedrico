<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMainSkillAndSubSkillRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employee_rating_mapping', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('empployee_id');
          $table->integer('skill_id');
          $table->integer('subskill_id');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
