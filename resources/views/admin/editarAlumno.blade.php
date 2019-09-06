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
	


	<form action="{{ route('actualizar.alumno',$usuario->id) }}" method="POST">
		
		{{ csrf_field() }}
		
		<div class="row justify-content-center">
        <div class="col-md-8">
		<input type="hidden" id="id" value="">
		<h3>Actualizar alumno</h3>

		  <div class="form-group">
		    <label for="grupo">Designar grupo:</label>
		    <select name="grupo" id="" class="form-control" id="grupo">
				@foreach ($grupos as $grupo)
					<option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
				@endforeach
			</select>
		  </div>

		  <div class="form-group">
		    <label for="carrera">Designar carrera:</label>
		    <select name="carrera" id="" class="form-control" id="carrera">
				@foreach ($carreras as $carrera)
					<option value="{{ $carrera->id }}">{{ $carrera->NombreCarrera }}</option>
				@endforeach
			</select>
		  </div>

		  <div class="form-group">
		    <label for="horario">Designar horario:</label>
		    <select name="horario" id="" class="form-control" id="horario">
				@foreach ($horarios as $horario)
				<option value="{{ $horario->id }}">{{ $horario->NombreHorario }}</option>
				@endforeach
			</select>
		  </div>

		  <div class="form-group row">
					<label for="nombre" class="col-md-2 col-form-label">{{ __('Nombre:') }}</label>

					<div class="col-md-10">
						<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $usuario->nombre }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="apellidos" class="col-md-2 col-form-label">{{ __('Apellidos:') }}</label>

					<div class="col-md-10">
						<input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ $usuario->apellidos }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="carnetEs" class="col-md-2 col-form-label">{{ __('Carnet:') }}</label>

					<div class="col-md-10">
						<input id="carnetEs" type="text" class="form-control{{ $errors->has('carnetEs') ? ' is-invalid' : '' }}" name="carnetEs" value="{{ $usuario->carnetEs }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="cedulaEs" class="col-md-2 col-form-label">{{ __('Cedula:') }}</label>

					<div class="col-md-10">
						<input id="cedulaEs" type="text" class="form-control{{ $errors->has('cedulaEs') ? ' is-invalid' : '' }}" name="cedulaEs" value="{{ $usuario->cedulaEs }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="email" class="col-md-2 col-form-label">{{ __('Email:') }}</label>

					<div class="col-md-10">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $usuario->email }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="celular" class="col-md-2 col-form-label">{{ __('Celular:') }}</label>

					<div class="col-md-10">
						<input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ $usuario->celularEs }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="direccion" class="col-md-2 col-form-label">{{ __('Direccion:') }}</label>

					<div class="col-md-10">
						<input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ $usuario->direccionEs }}" required autofocus>
					</div>		
			</div>

			
	  <button type="submit" class="btn btn-primary">Submit</button>

	</form>

@endsection