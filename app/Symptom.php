<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
     protected $guarded = array('id');

    public static $rules = array(
        'gender' => 'required',
        'body' => 'required',
        'age' => 'required',
       
     );
    public function diagnoses()
    {
      return $this->hasMany('App\Diagnosis');

    }
}