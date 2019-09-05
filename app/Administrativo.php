<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//Se extiende esta libreria para volverlo identificable
use Illuminate\Foundation\Auth\User as Authenticatable;


//extiende la libreria de autentificacion
class Administrativo extends Authenticatable
{
    public $table = "administrativos";
}
