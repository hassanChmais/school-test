<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    //
        use HasTranslations;

    protected $fillable = ['Name','Notes'];
        protected $table = 'Grades';
    public $timestamps = true;
    public $translatable = ['Name'];

/*    public function Classes(){
    return $this->hasMany(Classroom::class,'Grade_id');
}*/
   public function Sections(){
    return $this->hasManyThrough(Section::class , Classroom::class ,
        'Grade_id'/*foreignkey in classroom*/,
        'class_id'/*foreignkey in section */,
        'id','id');
}

}
