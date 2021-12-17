<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('Sections', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->integer('status');
			$table->string('section_name');
			$table->bigInteger('grade_id')->unsigned();
			$table->bigInteger('class_id')->unsigned();
			$table->foreign('grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
			$table->foreign('class_id')->references('id')->on('Classrooms')
						->onDelete('cascade')
						->onUpdate('cascade');
		
		});
	}

	public function down()
	{
		Schema::drop('Sections');
	}
}