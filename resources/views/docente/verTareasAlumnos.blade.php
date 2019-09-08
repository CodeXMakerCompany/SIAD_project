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
	<h3>Tareas</h3>
	
	 <hr>
        <div class="row">
            <!-- Team member -->
            <div class="col-md-12 row">
		
	<table class="table table-dark table-striped">
	    <thead>
	      <tr>
	      	<th>Asignatura</th>
	        <th>Descripción</th>
	        <th>Entregada el</th>
	        <th>Revisar</th>
	        <th>Evaluar</th>
	      </tr>
	    </thead>
	    <tbody>

	      
	        @foreach ($tareas as $tarea)
	        	<tr>
	        		<td>{{ $tarea->asignatura->NombreAsignatura }}</td>
		        	<td>{{ $tarea->descripcion }}</td>
		        	<td>{{ $tarea->created_at }}</td>
		        	<td>
		        		<a href="{{ url('/tarea/'.$tarea->archivo) }}">
		        			<i class="fas fa-cloud-download-alt"></i>
		        		</a>
		        	</td>
		        	<td>
		        		<a href="
                                    {{ route('evaluacion.alumno', ['id' => $tarea->estudiante_id,'id_tarea' => $tarea->id]) }}" 
                                    class="btn btn-warning btn-sm" 
                                    data-toggle="tooltip" data-placement="top" title="Evaluar">
                                    <i class="fas fa-pencil-alt"></i>
                          </i></a>
		        	</td>

 			</tr>
			@endforeach


	     
	      
	    </tbody>
	  </table>
                
            </div>
            <div align="center">
            	
            </div>
            
            <!-- ./Team member -->
        </div>
    </div>
@endsection