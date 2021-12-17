<?php
namespace App\Repositories;

use App\Models\Student;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class StudentRepository{

	public function addStudent($r){
		$name=['en' => $r->name_en, 'ar' => $r->name_ar];
		$student = new Student();
		$student->student_name = $name ;
		$student->email = $r->email ;
		$student->password = bcrypt($r->password);
		$student->blood_id = $r->blood_id;
		$student->date_birth = $r->date_birth;
		$student->grade_id = $r->grade_id;
		$student->section_id = $r->section_id;
		$student->parent_id=$r->parent_id;
		$student->academic_year=$r->year;
		$student->save();
		$files = $r->file('photos');
		 if($files[0] != ''){
		 	        $image_name = array();

                foreach($files as $file)
                {  
         $ran = mt_rand(111111,999999);
         $destinationPath = 'uploads/news';
         $filename = $file->getClientOriginalExtension();
         $filename_r =$ran.'.'.$filename;
         $file->move($destinationPath, $filename_r);

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$filename_r;
                    $images->imageable_id= $student->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit();
	}
}