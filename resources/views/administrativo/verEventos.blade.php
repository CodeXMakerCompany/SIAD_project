@extends('layouts.dashboardAdministrativos')

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
	  <h2>Actividades</h2>            
	  <table class="table table-dark table-striped">
	    <thead>
	      <tr>
	        <th>Titulo</th>
	        <th>Descripción</th>
	        <th>Horario</th>
	        <th>Fecha de inicio</th>
	        <th>Fecha de finalización</th>
	        <th>Dia de creacion</th>
	        <th>Fecha de actualizacón</th>
	        <th>Acciones</th>
	      </tr>
	    </thead>
	    <tbody>

	      
	        @foreach ($eventos as $evento)
	        <tr>
	        	<td>{{ $evento->title }}</td>
				<td>{{ $evento->description }}</td>
				<td>{{ $evento->start }}</td>
				<td>{{ $evento->start }}</td>
				<td>{{ $evento->end }}</td>
				<td>{{ $evento->created_at }}</td>
				<td>{{ $evento->updated_at }}</td>
				<td>
					<div class="row text-center">
						<a href="{{ url('/evento/editar/'.$evento->id) }}">
							<div class="btn_opciones">
							<i class="fas fa-user-edit"></i>
						</div>
						</a>
						<a href="{{ url('/evento/eliminar/'.$evento->id) }}">
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

	  	{{ $eventos->links() }}
	</div>
	
	
@endsection