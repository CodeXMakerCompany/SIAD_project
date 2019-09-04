@extends('layouts.app')

@section('content')

	<form action="{{ route('update.alumno') }}" method="POST">

		{{ csrf_field() }}
		
		<div class="row justify-content-center">
        <div class="col-md-8">
		<input type="hidden" id="id" value="{{ $id }}">

		  <div class="form-group">
		    <label for="grupo">Seleccione su grupo:</label>
		    <select name="grupo" id="" class="form-control" id="grupo">
				@foreach ($grupos as $grupo)
					<option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
				@endforeach
			</select>
		  </div>

		  <div class="form-group">
		    <label for="carrera">Seleccione su carrera:</label>
		    <select name="carrera" id="" class="form-control" id="carrera">
				@foreach ($carreras as $carrera)
					<option value="{{ $carrera->id }}">{{ $carrera->NombreCarrera }}</option>
				@endforeach
			</select>
		  </div>

		  <div class="form-group">
		    <label for="horario">Seleccione su horario:</label>
		    <select name="horario" id="" class="form-control" id="horario">
				@foreach ($horarios as $horario)
					<option value="{{ $horario->id }}">{{ $horario->NombreHorario }}</option>
				@endforeach
			</select>
		  </div>

		  

	  <button type="submit" class="btn btn-primary">Submit</button>

	</form>
</div>
</div>
	
@endsection

