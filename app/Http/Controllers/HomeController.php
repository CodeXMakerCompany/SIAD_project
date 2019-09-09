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
        $mensajesGlobales = PublicacionAdm::orderBy('id', 'desc')->take(5)->get();
        $mensajesAdministracion = PublicacionAdmini::orderBy('id', 'desc')->take(5)->get();
        $tareas = Planificacion_Tarea::orderBy('id', 'desc')->take(15)->get();
        $materialDidactico = MaterialDidactico::orderBy('id', 'desc')->paginate(20);
        
        return view('home')->with('mensajesGlobales', $mensajesGlobales)
                            ->with('mensajesAdministracion', $mensajesAdministracion)
                            ->with('tareas', $tareas)
                            ->with('materialDidactico', $materialDidactico);

    }
}
