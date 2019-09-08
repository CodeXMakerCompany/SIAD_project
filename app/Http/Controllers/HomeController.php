<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\PublicacionAdm;
use App\PublicacionAdmini;
use App\Planificacion_Tarea;
use App\MaterialDidactico;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mensajesGlobales = PublicacionAdm::all();
        $mensajesAdministracion = PublicacionAdmini::all();
        $tareas = Planificacion_Tarea::all();
        $materialDidactico = MaterialDidactico::all();
        
        return view('home')->with('mensajesGlobales', $mensajesGlobales)
                            ->with('mensajesAdministracion', $mensajesAdministracion)
                            ->with('tareas', $tareas)
                            ->with('materialDidactico', $materialDidactico);

    }
}
