<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Fatherinformation
            $table->string('Name_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->bigInteger('Blood_Type_Father_id')->unsigned();
            $table->string('Address_Father');

            //Mother information
            $table->string('Name_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');
            $table->bigInteger('Blood_Type_Mother_id')->unsigned();
            $table->string('Address_Mother');

            $table->foreign('Blood_Type_Father_id')->references('id')->on('type_bloods');
           
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type_bloods');
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
        Schema::dropIfExists('my_parents');
    }
}
