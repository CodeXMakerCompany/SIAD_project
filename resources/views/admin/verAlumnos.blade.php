@extends('layouts.dashboardAdmin')

@section('content')
	<div class="container">
	  <h2>Alumnos del sistema</h2>            
	  <table class="table table-dark table-striped">
	    <thead>
	      <tr>
	        <th>Nombre</th>
	        <th>Lastname</th>
	        <th>Email</th>
	        <th>Carnet</th>
	        <th>Cedula</th>
	        <th>Celular</th>
	      </tr>
	    </thead>
	    <tbody>

	      
	        @foreach ($alumnos as $alumno)
	        <tr>
	        	<td>{{ $alumno->nombre }}</td>
				<td>{{ $alumno->apellidos }}</td>
				<td>{{ $alumno->email }}</td>
				<td>{{ $alumno->carnetEs }}</td>
				<td>{{ $alumno->cedulaEs }}</td>
				<td>{{ $alumno->celularEs }}</td>
 			</tr>
			@endforeach
	     
	      
	    </tbody>
	  </table>
	</div>
	
	
@endsection
