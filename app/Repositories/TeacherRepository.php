<?php

namespace App\Repositories;
use App\Models\Teacher;
use App\Models\Specialization;
use Redirect;


class TeacherRepository 
{
  public function getAllTeachers(){
      return Teacher::all();
  }
public function addTeacher($r){
	try{
		$name=['en' => $r->name_en, 'ar' => $r->name_ar];
$teacher = new Teacher();
$teacher->Email = $r->email;
$teacher->Password = bcrypt( $r->password);
$teacher->name_teacher = $name;
$teacher->Specialization_id = $r->special_id;
$teacher->Joining_Date = $r->date;
$teacher->Address =$r->address;
$teacher->save();

        }
        catch (Exception $e) {
            
        }
}
public function edit_teacher($id){
	$teachers=Teacher::findOrFail($id);
return $teachers ;
}
public function update_teacher($r,$id){
$name=['en' => $r->name_en, 'ar' => $r->name_ar];
$teacher = Teacher::findOrFail($id);
$teacher->Email = $r->email;
$teacher->Password = bcrypt( $r->password);
$teacher->name_teacher = $name;
$teacher->Specialization_id = $r->special_id;
$teacher->Joining_Date = $r->date;
$teacher->Address =$r->address;
$teacher->save();
}
public function delete_teacher($id){
	Teacher::findOrFail($id)->delete();
}
}