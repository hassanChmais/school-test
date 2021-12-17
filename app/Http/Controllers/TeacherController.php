<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TeacherRepository ;
use App\Models\Specialization ;
use App\Http\Requests\StoreTeacher;
use Redirect;

class TeacherController extends Controller
{
    //
    private $teacherRepository ; 

    public function __construct(TeacherRepository $teacherRepository){
        $this->teacherRepository = $teacherRepository ;
    }
    public function index(){
        $teachers = $this->teacherRepository->getAllTeachers();
        return view('pages.teachers.index',compact('teachers'));
    }
    public function add_teacher(){
        $specializations = Specialization::all();
        return view('pages.teachers.create',compact('specializations'));
    }
    public function insert_teacher(StoreTeacher $r){
$this->teacherRepository->addTeacher($r);
return Redirect::back()->with('success','New Teacher added!');
    }
    public function edit_teacher($id){
        $specializations = Specialization::all();
        $teacher = $this->teacherRepository->edit_teacher($id);
        return view('pages.teachers.edit',compact('teacher','specializations'));
    }
    public function update_teacher(StoreTeacher $r,$id){
        $this->teacherRepository->update_teacher($r,$id);
        return Redirect::back()->with('success','Teacher Updated Successfully');
    }
    public function delete_teacher($id){
        $this->teacherRepository->delete_teacher($id);
        return Redirect::back()->with('success','Teacher Deleted Successfully');
    }
}
