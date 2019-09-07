@extends('layouts.dashboardAdministrativos')

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
	<form action="{{ route('update.event',$evento->id) }}" method="POST">
		
		{{ csrf_field() }}
		
		<div class="row justify-content-center">
        <div class="col-md-8">
		<input type="hidden" id="id" value="">
		<h3>Actualizar Evento</h3>

		  

		  <div class="form-group row">
					<label for="title" class="col-md-2 col-form-label">{{ __('Titulo:') }}</label>

					<div class="col-md-10">
						<input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $evento->title }}" required autofocus>

					</div>		
			</div>

			<div class="form-group row">
					<label for="description" class="col-md-2 col-form-label">{{ __('Descripcion:') }}</label>

					<div class="col-md-10">
						<input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $evento->description }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="start" class="col-md-2 col-form-label">{{ __('Fecha inicio:') }}</label>

					<div class="col-md-10">
						<input id="start" type="text" class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}" name="start" value="{{ $evento->start }}" required autofocus>
					</div>		
			</div>

			<div class="form-group row">
					<label for="end" class="col-md-2 col-form-label">{{ __('Fecha finalización:') }}</label>

					<div class="col-md-10">
						<input id="end" type="end" class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}" name="end" value="{{ $evento->end }}" required autofocus>
					</div>		
			</div>
			
	  <button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

@endsection