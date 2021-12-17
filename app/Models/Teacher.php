<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
use HasTranslations;
public $translatable = ['name_teacher'];
protected $table = 'teachers';
protected $fillable=['Email','Password','name_teacher','Specialization_id','Joining_Date','Address'];
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }
            public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
