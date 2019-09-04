@extends('layouts.app')

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

	
 <div class="row justify-content-center">
    <div class="col-md-8">
	<div class="card" >
		<form action="{{ route('update.foto') }}" method="POST" enctype="multipart/form-data"> 
			{{ csrf_field() }}
		<center>
			@if (Auth::user()->foto)
					
				<div class="col-md-8">
					<img src="{{ url('/user/avatar/'.Auth::user()->foto) }}" class="card-img-top" alt="..." class="img-rounded">
				</div>
			
			@endif
			
			<div class="form-group">
				<div class="col-md-6">
				<label for="foto">Imagen de perfil:</label>
				</div>
				<div class="col-md-6">
					<input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required autofocus>
				</div>
				
			</div>
			
			
			  <div class="card-body">
			    <h5 class="card-title">{{ $user->nombre }} {{ $user->apellidos }}</h5>
			  </div>

			</center>


			  <ul class="list-group list-group-flush">
			    <li class="list-group-item">Permisos : {{ $user->role }}</li>
			    <li class="list-group-item">Carnet : {{ $user->carnetEs }}</li>
			    <li class="list-group-item">Cedula: {{ $user->cedulaEs }}</li>
			  </ul>
			  <div class="card-body">
			    <a href="#" class="card-link">Correo: {{ $user->email }}</a>
			    <a href="#" class="card-link">Se unio el: {{ $user->created_at }}</a>

			    <div class="text-right">
				<input type="submit" value="Guardar" class="btn btn-primary">
				</div>
			  </div>

			
				
			
			  

		</form>
	  



	</div>
 </div>
</div>	

@endsection