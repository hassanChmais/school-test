<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Specialization extends Model
{
    //
    use HasTranslations;
   protected $fillable = ['name_special'];
   protected $translatable = ['name_special'];
}
