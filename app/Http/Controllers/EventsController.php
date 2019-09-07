<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Evento;

class EventsController extends Controller
{   
    //filtro y recuperar la variable de usuario autentificado
    function __construct(){

        $this->middleware('auth:administrativos', ['only' => ['show_events','delete_event','edit_event','update_event']]);

    }
    
    public function get_events() {

    	$eventos = Evento::select("id", "title as title", "start as start", "end as end", "color as color", "textColor as textColor", "horario as horario")->get()->toArray();


    	return response()->json($eventos);

    }

    public function create_event(Request $request) {


    	$titulo = $request->input('titular');
    	$descripcion = $request->descripcion;
    	$color = $request->input('color');
    	$hora = $request->input('hora');
    	$fecha_inicio = $request->input('fecha_inicio');
    	$fecha_final = $request->input('fecha_final');

    	$evento = new Evento();

    	$evento->title = $titulo;
    	$evento->description = $descripcion;
    	$evento->color = $color;
    	$evento->textColor = '#fff'; 
    	$evento->horario = $hora;
    	$evento->start = $fecha_inicio;
    	$evento->end = $fecha_final;

    	$evento->save();

    	return redirect()->route('administrativos.area')
                     ->with(['message'=>'Evento registrado correctamente.']);

    }

    public function show_events() {
    	
        $eventos = Evento::orderBy('id','DESC')->paginate(10);
    	
    	return view('administrativo.verEventos')->with('eventos', $eventos);

    }

    public function delete_event($id) {

        $evento = Evento::find($id);


        $evento->delete();


        return redirect()->route('show.events')
                     ->with(['message'=>'Evento eliminado correctamente.']);
    }

    public function edit_event($id){

        $evento = Evento::find($id);

        return view('administrativo.editarEvento')->with('evento', $evento);
    }

    public function update_event(Request $request, $id){

        $evento = Evento::find($id);

        $titulo = $request->input('title');
        $descripcion = $request->input('description');
        $fecha_inicio = $request->input('start');
        $fecha_final = $request->input('end');


        $evento->title = $titulo;
        $evento->description = $descripcion;
        $evento->start = $fecha_inicio;
        $evento->end = $fecha_final;


        $evento->save();

        return redirect()->route('edit.event', $id)
                     ->with(['message'=>'Evento actualizado.']);
    }
}
