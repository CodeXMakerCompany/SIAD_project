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

	

	<form action="{{ route('store.evaluacion') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			<div class="row justify-content-center">
	        <div class="col-md-12" align="center">
	        	<h2>Agregar evaluación</h2> 

	        	<div class="form-grpup row">
	        		<input type="hidden" name="id_alumno" value="{{ $id }}">
	        	</div>

			  	<div class="form-grpup row">
	        		<input type="hidden" name="id_tarea" value="{{ $id_tarea }}">
	        	</div>


			<div class="form-group row">
		    <label for="asignatura" class="col-md-2">Seleccione su asignatura:</label>
		    <div class="col-md-8">
			    <select name="asignatura" id="" class="form-control" id="asignatura">	
			    	
			    		@foreach ($asignaturas as $asignatura)
			    		
						<option value="{{ $asignatura->id }}">{{ $asignatura->NombreAsignatura }}</option>
						
					@endforeach
			    	
				</select>
			</div>
		  </div>

		  <div class="form-group row">
		  	<div class="col-md-2">
		  		<label for="unidad">Unidad:</label>
		  	</div>
		  	<div class="col-md-8">
		  		<input type="number" name="unidad"> 
		  	</div>
		  </div>

            <div class="form-group row">
            	<div class="col-md-2">
            		<label for="descripcion"> Comentarios.</label>
            	</div>
            	<div class="col-md-8">
            	 <textarea name="descripcion" id="" cols="50" rows="1"></textarea>	
            	</div>
            	
            </div>

            <div class="form-group row">
		  	<div class="col-md-2">
		  		<label for="puntaje">Puntaje:</label>
		  	</div>
		  	<div class="col-md-8">
		  		<input type="number" name="puntaje"> 
		  	</div>
		  </div>
			  
			  
		<div class="text-center">
			<button type="submit" class="btn btn-success">Subir</button>
		</div>
		  

		</form>

		<hr>
@endsection