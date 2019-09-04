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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<div class="card-header">{{ __('Subir tarea') }}</div>
					<div class="card-body">
						
	 <form action="{{ route('user.guardarTarea') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			<div class="row justify-content-center">
	        <div class="col-md-8">
			<input type="hidden" id="id" value="{{ $id }}">

			  <div class="form-group row">
			    <label for="asignatura" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione su asignatura:') }}</label>
				<div class="col-md-8">
				    <select name="asignatura" id="" class="form-control" id="asignatura">
						@foreach ($asignaturas as $asignatura)
							<option value="{{ $asignatura->id }}">{{ $asignatura->NombreAsignatura }}</option>
						@endforeach
					</select>
  				</div>
			  </div>

			  <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción:') }}</label>

                            <div class="col-md-8">
                                
								<textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus></textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

			  <div class="form-group row">
					<label for="tarea" class="col-md-4 col-form-label text-md-right">{{ __('Cargar tarea:') }}</label>

					<div class="col-md-8">
						<input id="tarea" type="file" class="form-control{{ $errors->has('tarea') ? ' is-invalid' : '' }}" name="tarea" value="{{ old('tarea') }}" required autofocus>
					</div>
					
				</div>

			  
			  
		<div class="text-right">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		  

		</form>
	</div>
</div>
</div>
</div>
</div>		

@endsection