<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'profession' => 'required',
        'name' => 'required',
        'body' => 'required',
        'symptom_id' => 'required',
     );
    
}
