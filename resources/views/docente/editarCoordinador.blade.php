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
	


	<form action="{{ route('actualizar.coordinador',$coordinador->id) }}" method="POST">
		
		{{ csrf_field() }}
		
		<div class="row justify-content-center">
        <div class="col-md-8">
		<input type="hidden" id="id" value="">
		<h3>Actualizar Coordinador</h3>

		<div class="form-group row">
		    <label for="carrera" class="col-md-2 col-form-label">Designar carrera:</label>
			<div class="col-md-10">
			    <select name="carrera" id="" class="form-control" id="carrera">
					@foreach ($carreras as $carrera)
						<option value="{{ $carrera->id }}">{{ $carrera->NombreCarrera }}</option>
					@endforeach
				</select>
			</div>
		  </div>

		  <div class="form-group row">
					<label for="nombre" class="col-md-2 col-form-label">{{ __('Nombre:') }}</label>

					<div class="col-md-10">
						<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $coordinador->nombre }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="apellidos" class="col-md-2 col-form-label">{{ __('Apellidos:') }}</label>

					<div class="col-md-10">
						<input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ $coordinador->apellidos }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="email" class="col-md-2 col-form-label">{{ __('Email:') }}</label>

					<div class="col-md-10">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $coordinador->email }}" required autofocus>
					</div>		
			</div>

			
	  <button type="submit" class="btn btn-primary">Submit</button>

	</form>

@endsection