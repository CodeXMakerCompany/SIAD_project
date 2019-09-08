@extends('layouts.dashboardDocente')

@section('content')

	<center>
		<div class="col-md-10">
		@if (session('message'))
	 		<div class="alert alert-success">
	                    {{ session('message') }}
	         </div>
	 	@endif
		</div>
	</center>

	 <h3>Alumnos</h3>
	{{-- IMPORTANTE EL JS DE EL BUSCADOR ESTA EN EL FILE NAVBAR.JS --}}
	 <form action="{{ route('mostrar.alumnos') }}" method="GET" id="buscador">
	 	<div class="row">
	 		<div class="col-md-8">
	 	<input type="text" id="search" name="search" class="form-control">	
	 	</div>
	 	<div class="col-md-4">
	 		<input type="submit" value="Buscar" class="btn btn-success">
	 	</div>
	 	</div> 	
	 </form>
	 <hr>
        <div class="row">
            <!-- Team member -->
            <div class="col-md-12 row">
				
				@foreach ($alumnos as $alumno)
					<div class="image-flip col-md-6">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    
                                    <h4 class="card-title">{{ $alumno->nombre }}
                                    	{{ $alumno->apellidos }}</h4>
                                    	<h5>{{ $alumno->email }}</h5>
                                    	<hr>
                                    <div class="row">
                                    	<div class="col-md-4">
                                            <h6>Grupo</h6>
                                    		<span>{{ $alumno->grupo->nombre }}</span>
                                    	</div>
                                    	<div class="col-md-4">
                                            <h6>Horario</h6>
                                    		<span>{{ $alumno->horario->NombreHorario }}</span>
                                    	</div>
                                    	<div class="col-md-4">
                                            <h6>Carrera</h6>
                                    		<span>
                                    			{{ $alumno->carrera->NombreCarrera }}
                                    		</span>
                                    	</div>
                                    </div>
                                    <hr>
                                    <a href="{{ route('mensaje.docente', ['id' => $alumno->id]) }}" class="btn btn-primary btn-sm"
                                        data-toggle="tooltip" data-placement="top" title="Chatear"><i class="fas fa-comment-dots"></i></a>

                                    <a href="
                                    {{ route('ver.todaslastareas', ['id' => $alumno->id]) }}" 
                                    class="btn btn-success btn-sm" 
                                    data-toggle="tooltip" data-placement="top" title="Ver tareas"><i class="fas fa-file"></i></a>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				@endforeach
                
            </div>
            <div align="center">
            	{{ $alumnos->links() }}
            </div>
            
            <!-- ./Team member -->
        </div>
    </div>

@endsection