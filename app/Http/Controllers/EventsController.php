<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Evento;

class EventsController extends Controller
{
    
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

    public function edit_event(Request $request) {

    	$input = $request->all();

    	
    	var_dump($input);
    	die();
    }
}
