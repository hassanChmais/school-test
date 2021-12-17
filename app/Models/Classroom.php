<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model 
{
 use HasTranslations;
    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    public $translatable = ['Name_class'];
    
        public function Sections(){
    return $this->hasMany(Section::class,'class_id'/*foreignkey*/);
}

}