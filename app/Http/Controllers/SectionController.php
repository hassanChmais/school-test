<?php 

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;

use App\Http\Requests\StoreSection;
use Illuminate\Http\Request;

use paginate;
use Validator;
use Redirect;


class SectionController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    

    $grades =Grade::all();

/*    $ttt =cache()->remember('section',3600,function(){
      return Section::with('Grades')->with('Classes')->
orderBy(Classroom::select('Name_class')->whereColumn('Classrooms.id','Sections.class_id'))->
      get();
    });*/
      cache()->forget('grade');
  cache()->forget('section');
     $sections=Section::with('Classes')->with('Classes.Grades')->
orderBy(Classroom::select('Name_class')->whereColumn('Classrooms.id','Sections.class_id'))->
      get();
            
      //$grade = Grade::with('Sections')->get();
      //return $grade;

return view('pages.sections.index',compact('grades','sections'));
  }

public function add_section(StoreSection $r){
  cache()->forget('grade');
  cache()->forget('section');
$validated = $r->validated();
$Name = ['en' => $r->section_name, 'ar' =>$r->section_name_ar];

$section = new Section();
$section->status = 1 ;
$section->section_name = $Name ;
$section->grade_id = $r->grade_id;
$section->class_id = $r->class_id;
$section->save();
return Redirect::back()->with('success' , trans('main_trans.section_was_added'));

}

public function ajax(Request $r){

$class = Classroom::where('Grade_id',$r->id)->get();
/*$output= "" ;
foreach ($class as $c) {
  $output .= '<option value="'.$c->id.'">'.$c->Name_class.'</option>' ;
}*/
      $response = json_decode($class, true);
      
      return $response;
  }

  public function delete_section(Request $r){
      cache()->forget('grade');
  cache()->forget('section');

    $id=$r->id;
    $section = Section::findOrFail($id);
    $section->delete();
    return Redirect::back()->with('success' , trans('main_trans.section_was_deleted'));
  }
  public function update_section($id,StoreSection $r){
      cache()->forget('grade');
  cache()->forget('section');

$validated = $r->validated();
$Name = ['en' => $r->section_name, 'ar' =>$r->section_name_ar];

$section =Section::findOrFail($id);
$section->status = 1 ;
$section->section_name = $Name ;
$section->grade_id = $r->grade_id;
$section->class_id = $r->class_id;
$section->save();
return Redirect::back()->with('success' , trans('main_trans.section_was_updated'));
  }
    public function get_section($id){
    $grades = Grade::all();

        $section=Section::join('Classrooms','Sections.class_id','Classrooms.id')->select('Sections.*','Classrooms.Name_class')->where('Sections.id','=',$id)->get();
        
return view('pages.sections.update_Section',compact('section','grades'));
  }
}

