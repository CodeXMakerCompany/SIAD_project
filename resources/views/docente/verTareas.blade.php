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

	<form action="{{ route('store.newTarea') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			<div class="row justify-content-center">
	        <div class="col-md-12" align="center">
	        	<h2>Agregar nueva tarea</h2> 

			  <div class="form-group row">
                            <label for="nombre" class="col-md-2 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-8">
                                
								<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                            <label for="nombreUn" class="col-md-2 col-form-label text-md-right">{{ __('Nombre Unidad:') }}</label>

                            <div class="col-md-8">
                                
								<input id="nombreUn" type="text" class="form-control{{ $errors->has('nombreUn') ? ' is-invalid' : '' }}" name="nombreUn" value="{{ old('nombreUn') }}" required autofocus>

                                @if ($errors->has('nombreUn'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreUn') }}</strong>
                                    </span>
                                @endif
                            </div>
            </div>

            <div class="form-group">
            	<div class="col-md-6">
            		<label for="descripcion"> Descripción</label>
            	</div>
            	<div class="col-md-10">
            	 <textarea name="descripcion" id="" cols="50" rows="1"></textarea>	
            	</div>
            	
            </div>
			  
			  
		<div class="text-center">
			<button type="submit" class="btn btn-success">Subir</button>
		</div>
		  

		</form>

		<hr>

	 <h3>Tareas</h3>
	
	 <hr>
        <div class="row">
            <!-- Team member -->
            <div class="col-md-12 row">
		
	<table class="table table-dark table-striped">
	    <thead>
	      <tr>
	        <th>Docente</th>
	        <th>Asignatura</th>
	        <th>Unidad</th>
	        <th>Nombre Unidad</th>
	        <th>Nombre Tarea</th>
	        <th>Descripción tarea</th>
	      </tr>
	    </thead>
	    <tbody>

	      
	        @foreach ($tareas as $tarea)
	        	<tr>
		        	<td>{{ $tarea->docente->nombre }}</td>
					<td>{{ $tarea->asignatura->NombreAsignatura }}</td>
					<td>{{ $tarea->Unidad }}</td>
					<td>{{ $tarea->DescripcionUnidad }}</td>
					<td>{{ $tarea->Tarea }}</td>
					<td>{{ $tarea->DescripcionTarea }}</td>
 			</tr>
			@endforeach


	     
	      
	    </tbody>
	  </table>
                
            </div>
            <div align="center">
            	{{ $tareas->links() }}
            </div>
            
            <!-- ./Team member -->
        </div>
    </div>

@endsection