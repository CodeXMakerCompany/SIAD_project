<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MaterialDidactico extends Model
{
   protected $table = "material_didactico";

   //relacion de una modelo a una tabla que lo contiene relacionado
    public function docente(){
    	return $this->belongsTo('App\Docente');
    }


}
