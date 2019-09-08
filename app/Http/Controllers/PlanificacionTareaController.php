<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Planificacion_Tarea;
use App\Entrega_tarea;
use App\Asignatura;
use App\User;
use App\Evaluacion;

class PlanificacionTareaController extends Controller
{
    
	use AuthenticatesUsers;

    //filtro para que solo la sesion de admin pueda ingresara las urls
    function __construct(){

        $this->middleware('auth:docentes');

    }

    public function showTareas() {


    	$asignaturas = Asignatura::all();

    	$tareas = Planificacion_Tarea::orderBy('id','DESC')->paginate(10);

    	return view('docente.verTareas')->with('tareas', $tareas)
    									->with('asignaturas', $asignaturas);

    }

    public function storeTarea(Request $request) {

    	//instancio objeto
    	$tarea = new Planificacion_Tarea();
    	//obtener valores
    	$id = auth('docentes')->user()->id;
    	$asignatura = $request->get('asignatura');
    	$unidad = $request->input('unidad');
    	$descripcion = $request->descripcion;
    	$descripcionUnidad = $request->input('nombreUn');
    	$titulo = $request->input('nombre');


    	$min = 1000;
    	$max = 9999;

    	$tarea->docente_id = $id;
    	$tarea->asignatura_id = $asignatura;
    	$tarea->Unidad = $unidad;
    	$tarea->DescripcionUnidad = $descripcionUnidad;
    	$tarea->Tarea = $titulo;
    	$tarea->DescripcionTarea = $descripcion;
    	$tarea->CodigoTarea = rand( (int) $min, (int) $max);

    	$tarea->save();

    	return redirect()->route('show.tareas')->with(['message'=>'Tarea enviada!.']);
    }

    public function getTareasAlumno($id) {

    	$tareas = Entrega_tarea::where('estudiante_id', $id)
    							->orderBy('id','DESC');


    	$tareas = $tareas->paginate(10);

    	return view('docente.verTareasAlumnos')->with('tareas', $tareas);

    }

    public function getHomework($filename){
    	$path = storage_path('app/tareas');
    	$file = $path.'/'.$filename;
   			return Response::download($file);
	}

	public function setEvaluacion($id, $id_tarea){

		$asignaturas = Asignatura::all();
		$id_tarea = (int)$id_tarea;

		return view('docente.evaluacion')->with('id', $id)
										 ->with('id_tarea', $id_tarea)
										 ->with('asignaturas', $asignaturas);
	}

	public function storeEvaluacion(Request $request){

		$evaluacion = new Evaluacion();

		$alumno_id = $request->input('id_alumno');
		$alumno_id = (int)$alumno_id;

		$id_docente = auth('docentes')->user()->id;

		$asignatura_id = $request->get('asignatura');
		$asignatura_id = (int)$asignatura_id;

		$id_tarea = $request->input('id_tarea');
		$id_tarea = (int)$id_tarea;

		$unidad = $request->input('unidad');
		$descripcion = $request->descripcion;
		$puntaje = $request->input('puntaje');

		$evaluacion->alumno_id = $alumno_id;
		$evaluacion->docente_id = $id_docente;
		$evaluacion->asignatura_id = $asignatura_id;
		$evaluacion->tarea_id = $id_tarea;
		$evaluacion->descripcion = $descripcion;
		$evaluacion->unidad = $unidad;
		$evaluacion->puntaje = $puntaje;

		$evaluacion->save();

		return redirect()->route('ver.todaslastareas', $alumno_id)->with(['message'=>'Calificado!!.']);
	}


}
