<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Student extends Model
{
    use HasTranslations;
    public $translatable = ['student_name'];
    protected $table = 'students';
    protected $fillable = ['student_name','email','password','blood_id','date_birth','grade_id','section_id','parent_id','academic_year'];
        public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function blood(){
    return $this->belongsTo(Type_blood::class,'blood_id'/*foreignkey*/);
    }
   public function section(){
    return $this->belongsTo(Section::class,'section_id'/*foreignkey*/);
    }

}
