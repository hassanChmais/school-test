<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Section;

class TeacherSection extends Model
{
    protected $table = 'Teacher_sections';
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id')->select('id','name_teacher');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id')->select('id','section_name');
    }
}
