<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('student_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('blood_id')->constrained('type_bloods','id')->onDelete('cascade');
            $table->date('date_birth');
            $table->foreignId('grade_id')->constrained('Grades','id')->onDelete('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_id')->constrained('my_parents')->onDelete('cascade');
            $table->string('academic_year');
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
        Schema::dropIfExists('students');
    }
}
