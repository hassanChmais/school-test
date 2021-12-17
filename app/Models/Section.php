<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Section extends Model 
{
 
  use HasTranslations;
    protected $table = 'Sections';
    public $timestamps = true;
    public $translatable = ['section_name','Name_class'];


    public function Classes()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
    public function students(){
      return $this->hasmany(Student::class , 'section_id');
    }
    

}