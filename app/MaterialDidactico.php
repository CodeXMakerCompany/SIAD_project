<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialDidactico extends Model
{
   protected $table = "material_didactico";

    public function docente(){
    	return $this->hasOne('App\Docente');
    }
}
