@extends('layouts.dashboardAdmin')

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
	<div class="container">
	  <h2>Administrativos del sistema</h2>            
	  <table class="table table-dark table-striped">
	    <thead>
	      <tr>
	        <th>Nombre</th>
	        <th>Apellidos</th>
	        <th>Email</th>
	        <th>Acciones</th>
	      </tr>
	    </thead>
	    <tbody>

	      
	        @foreach ($administrativosA as $administrativo)
	        <tr>
	        	<td>{{ $administrativo->nombre }}</td>
				<td>{{ $administrativo->apellidos }}</td>
				<td>{{ $administrativo->email }}</td>
				<td>
					<div class="row text-center">
						<a href="{{ url('/editar/administrativo/'.$administrativo->id) }}">
							<div class="btn_opciones">
							<i class="fas fa-user-edit"></i>
						</div>
						</a>
						<a href="{{ url('/eliminar/administrativo/'.$administrativo->id) }}">
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
	  {{ $administrativosA->links() }}
	</div>
	
	
@endsection
