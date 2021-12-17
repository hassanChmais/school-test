<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\TeacherSection;
use App\Models\Teacher;
use App\Models\Section;

class TeacherSectionController extends Controller
{
    public function index(){
$sections = Section::with('Classes')->get();
$teachers = Teacher::all();

return view('pages.sections_teachers.index',compact('sections','teachers'));
    }

    public function add_teacher_section(Request $r){
        $ts = TeacherSection::where([
['special_id','=',$r->section_id],
['teacher_id','=',$r->teacher_id],
])->count();
        if($ts >= 1){
return Redirect::back()->withErrors('This teacher allready had this section!');
        }else{
        if($ts < 1){}
        $a = new TeacherSection();
        $a->special_id = $r->section_id;
        $a->teacher_id = $r->teacher_id;
        $a->save();
        return Redirect::back()->with('success','New Section added to a Teacher !');
    }
    }
}
