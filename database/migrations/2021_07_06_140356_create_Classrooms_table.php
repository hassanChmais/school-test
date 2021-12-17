<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomsTable extends Migration {

	public function up()
	{
		Schema::create('Classrooms', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('Name_class');
			$table->bigInteger('Grade_id')->unsigned();
			$table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('Classrooms');
	}
}