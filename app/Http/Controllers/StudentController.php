<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Type_blood;
use App\Models\My_parent;
use App\Models\Student;
use App\Http\Requests\StoreStudent;
use App\Repositories\StudentRepository ;
use Redirect;
class StudentController extends Controller
{
    //
    private $studentRepository ; 

    public function __construct(StudentRepository $studentRepository){
        $this->studentRepository = $studentRepository;
    }

    public function index(){
/*$sections = Section::where('grade_id',1)->with('Classes')->orderBy(Classroom::select('Name_class')->whereColumn('Classrooms.id','Sections.class_id')
)->get();
$grades=Grade::all();
$bloods=Type_blood::all();
$parents = My_parent::all();

return view('pages.students.index',compact('grades','bloods','parents'));*/

$test = Grade::with(array('Sections' => function ($query) {
        $query->Has('students')->with('students.blood')->withCount('students');
    }))->whereHas('Sections.students')->get();

/*   $test = Grade::whereHas('Sections')->with(array('Sections' => function ($query) {
        $query->Has('students')->with('students.blood');
    }))->get();*/

    return view('pages.students.test',compact('test')) ;
/*    foreach($test as $t){
foreach($t->Sections as $s){
foreach($s->students as $st){
    echo $st->blood->blood_name;
}
}
    }*/
    }
    public function student_ajax(Request $r){
        $id = $r->id;
        $sections = Section::where('grade_id',$id)->with('Classes')->orderBy(Classroom::select('Name_class')->whereColumn('Classrooms.id','Sections.class_id'))->get();
        return $sections;
    }
    public function add_student(StoreStudent $r){

        $this->studentRepository->addStudent($r);
        return Redirect::back()->with('success','New Student Added Successfully!!');
    }
    public function get_images(){
        $id = 15;
        //$student = dump(Classroom::FindOrFail(1)->with('Sections')->get());
$student = Image::findOrFail(15);
return $student;

        //return view('pages.students.getimages',compact('student'));
    }
public function show_all(){
$student = Student::all()->with();
}
public function show($id){

}
}
