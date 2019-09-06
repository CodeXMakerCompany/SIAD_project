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
	


	<form action="{{ route('actualizar.docente',$docente->id) }}" method="POST">
		
		{{ csrf_field() }}
		
		<div class="row justify-content-center">
        <div class="col-md-8">
		<input type="hidden" id="id" value="">
		<h3>Actualizar Docente</h3>

		  

		  <div class="form-group row">
					<label for="nombre" class="col-md-2 col-form-label">{{ __('Nombre:') }}</label>

					<div class="col-md-10">
						<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $docente->nombre }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="apellidos" class="col-md-2 col-form-label">{{ __('Apellidos:') }}</label>

					<div class="col-md-10">
						<input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ $docente->apellidos }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="cedulaEs" class="col-md-2 col-form-label">{{ __('Cedula:') }}</label>

					<div class="col-md-10">
						<input id="cedulaEs" type="text" class="form-control{{ $errors->has('cedulaEs') ? ' is-invalid' : '' }}" name="cedulaEs" value="{{ $docente->cedula }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="email" class="col-md-2 col-form-label">{{ __('Email:') }}</label>

					<div class="col-md-10">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $docente->email }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="celular" class="col-md-2 col-form-label">{{ __('Celular:') }}</label>

					<div class="col-md-10">
						<input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ $docente->celular }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="direccion" class="col-md-2 col-form-label">{{ __('Direccion:') }}</label>

					<div class="col-md-10">
						<input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ $docente->direccion }}" required autofocus>
					</div>		
			</div>

			
	  <button type="submit" class="btn btn-primary">Submit</button>

	</form>

@endsection