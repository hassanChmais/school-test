<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use App\Http\Requests\StoreGrade;

use Illuminate\Http\Request;

use paginate;
use Validator;
use Redirect;

class GradeController extends Controller
{
      public function index()
  {
    
    $grades =cache()->remember('index',3600,function(){

      return Grade::orderBy('id','Desc')->get();
    });
    return view('pages.grades.index',compact('grades'));
  }

public function add_grade(StoreGrade $r){
/*    if(Grade::where('Name->ar',$r->grade_name_ar)->orWhere('Name->en',$r->grade_name)->exists()){
       return Redirect::Back()->withErrors('this field already exist !');
    }else{*/
      cache()->forget('index');
    

    $grade = new Grade();
    $grade->Name = ['en' => $r->grade_name, 'ar' =>$r->grade_name_ar];
    $grade->Notes = $r->notes;
    $grade->save();
    
             return Redirect::back()->with('success' , trans('main_trans.Grade_was_added'));
    


  }

  public function update_grade(StoreGrade $r){

    if(Grade::where('Name->ar',$r->grade_name_ar)->orWhere('Name->en',$r->grade_name)->exists()){
       return Redirect::Back()->withErrors('this field already exist !');
    }else{
      cache()->forget('index');
$validated = $r->validated();
$id = $r->id;
$Name = ['en' => $r->grade_name, 'ar' =>$r->grade_name_ar];
$Notes = $r->notes ;

$grade =Grade::findOrFail($id);
$grade->Name = $Name ;
$grade->Notes =$Notes ;
$grade->save();

return Redirect::back()->with('success' , trans('main_trans.Grade_was_updated'));}
  }

  public function delete_grade(Request $r){
    cache()->forget('index');
  $id = $r->id;  
$grade =Grade::findOrFail($id);
$grade->delete();

return Redirect::back()->with('success' , trans('main_trans.Grade_was_deleted'));

  }
    
}
