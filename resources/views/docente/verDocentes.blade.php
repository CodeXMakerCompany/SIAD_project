@extends('layouts.dashboardAdmin')

@section('content')
	<div class="container">
		<center>
	<div class="col-md-10">
	@if (session('message'))
 		<div class="alert alert-success">
                    {{ session('message') }}
         </div>
 	@endif
</div>
</center>
	  <h2>Docentes del sistema</h2>            
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

	      
	        @foreach ($docentes as $docente)
	        <tr>
	        	<td>{{ $docente->nombre }}</td>
				<td>{{ $docente->apellidos }}</td>
				<td>{{ $docente->email }}</td>
				<td>{{ $docente->carnetEs }}</td>
				<td>{{ $docente->cedulaEs }}</td>
				<td>{{ $docente->celularEs }}</td>
				<td>
					<div class="row text-center">
						<a href="{{ url('/editar/docente/'.$docente->id) }}">
							<div class="btn_opciones">
							<i class="fas fa-user-edit"></i>
						</div>
						</a>
						<a href="{{ url('/eliminar/docente/'.$docente->id) }}">
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

	  	{{ $docentes->links() }}
	</div>
	
	
@endsection