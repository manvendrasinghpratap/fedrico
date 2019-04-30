<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname','100')->nullable()->default('First Name');
            $table->string('lastname','100')->nullable()->default('Last Name');
            $table->string('email','111')->unique();
            $table->string('country','111')->nullable();
            $table->string('state','111')->nullable();
            $table->string('city','111')->nullable();
            $table->string('pro','111')->nullable();
            $table->string('versus','111')->nullable();
            $table->string('imagename','190')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=>active,2=>Inactive');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
