<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FormModel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('streetAddress');
            $table->string('stateRegion');
            $table->string('zip');
            $table->string('country');
            $table->string('contactPhone');
            $table->string('age');
            $table->string('gender');
            $table->string('email');
            $table->string('height');
            $table->string('weight');
            $table->string('passportNumber');
            $table->string('passportExpiry');
            $table->string('passportFileName');
            $table->string('idCardFileName');
            $table->string('toeicFileName');
            $table->string('toeicScore');
            $table->string('universityName');
            $table->string('cvFileName');
            $table->text('coverLetter');
            $table->integer('user_id'); 
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
        Schema::dropIfExists('FormModel');
    }
}
