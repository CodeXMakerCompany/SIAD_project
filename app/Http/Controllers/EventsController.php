<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;

class EventsController extends Controller
{
    
    public function get_events() {

    	$eventos = Evento::select("id", "title as title", "start as start", "end as end")->get()->toArray();


    	return response()->json($eventos);

    }
}
