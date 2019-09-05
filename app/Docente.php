<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Docente extends Authenticatable
{
    protected $table = "docentes";

    public function MaterialDidactico(){
    	return $this->hasMany('App\MaterialDidactico');
    }

}
