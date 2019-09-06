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
	        <th>Acciones</th>
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
				<td>
					<div class="row text-center">
						<a href="{{ url('/editar/alumno/'.$alumno->id) }}">
							<div class="btn_opciones">
							<i class="fas fa-user-edit"></i>
						</div>
						</a>
						<a href="{{ url('/eliminar/alumno/'.$alumno->id) }}">
							<div class="btn_opciones">
							<i class="fas fa-trash-alt"></i>
						</div>
						</a>
						
					</div>

				</td>
 			</tr>
			@endforeach
	     
	      
	    </tbody>
	  </table>

	  	{{ $alumnos->links() }}
	</div>
	
	
@endsection
