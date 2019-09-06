<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grupo_id', 'horario_id', 'carrera_id', 'role', 'nombre', 'apellidos' ,'carnetEs', 'cedulaEs', 'celularEs', 'direccionEs', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //cada alumno contara con multiples evaluaciones
    public function evaluaciones(){
        return $this->hasMany('App\Evaluacion');
    }

    //cada alumno contara con multiples tareas entregadas
    public function tareas_entregadas(){
        return $this->hasMany('App\Entrega_tarea', 'estudiante_id');
    }

    public function mensajes_enviados(){
        return $this->hasMany('App\Mensaje', 'alumno_id');
    }
}