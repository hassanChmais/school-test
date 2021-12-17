<?php 

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Http\Requests\StoreClass;
use Illuminate\Http\Request;

use paginate;
use Validator;
use Redirect;

class ClassroomController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
    $classes = Classroom::join('Grades','Classrooms.grade_id','Grades.id')->
    select('Classrooms.*','Grades.Name')->get();
$grades = Grade::all();

    return view('pages.classes.index',compact('classes','grades'));

  }

  public function add_class(StoreClass $r){
    $validated =$r->validated();
$names = $r->input('name');
$names_ar = $r->input('name_ar');
$grades = $r->input('grade_id');

$r_name=array();
$r_name_ar=array();
$grade_id = array();
foreach ($names as $name ) {
  $r_name[] = $name ;
}
foreach ($names_ar as $name_ar ) {
  $r_name_ar[] = $name_ar ;
}
foreach($grades as $grade){
$grade_id[] = $grade ;
}
for($i=0;$i<count($r_name);$i++){
$en= $r_name[$i] ;
$ar = $r_name_ar[$i];
$n = ['en' => $en, 'ar' =>$ar];
    $class = new Classroom();
    $class->Name_class= $n;
    $class->Grade_id = $grade_id[$i];
    $class->save();
  
}

return Redirect::back()->with('success' , trans('main_trans.Class_was_added'));
}
public function delete_class(Request $r){

  $class = Classroom::findOrFail($r->id);
  $class->delete();
  return Redirect::back()->with('success' , trans('main_trans.Class_was_deleted'));
}
public function update_class(StoreClass $r){
  $validated = $r->validated();
  $id = $r->id ; 

  $name = ['en'=>$r->name,'ar'=>$r->name_ar];
  $grade_id = $r->grade_id;
    $class = Classroom::findOrFail($id);
    $class->Name_class= $name;
    $class->Grade_id = $grade_id;
    $class->save();
  return Redirect::back()->with('success' , trans('main_trans.Class_was_updated'));
}
public function delete_all(Request $r){
  $all_id = explode(",", $r->id);
Classroom::whereIn('id',$all_id)->delete();
return Redirect::back()->with('success' , trans('main_trans.Class_was_deleted'));
  }
}
