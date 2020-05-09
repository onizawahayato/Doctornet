<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class net extends Model
{
     protected $guarded = array('id');

    public static $rules = array(
        'Symptom name' => 'required',
        'gender' => 'required',
        'body' => 'required',
     );
    public function histories()
    {
      return $this->hasMany('App\History');

    }
}
