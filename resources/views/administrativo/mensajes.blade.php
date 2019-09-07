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

	<form action="{{ route('store.mensajeAdministrativo') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			<div class="row justify-content-center">
	        <div class="col-md-8">
	        	<h2>Nuevo mensaje</h2> 
				<br>
			  <div class="form-group row">
                            <label for="titular" class="col-md-2 col-form-label text-md-right">{{ __('Titulo:') }}</label>

                            <div class="col-md-8">
                                
								<input id="titular" type="text" class="form-control{{ $errors->has('titular') ? ' is-invalid' : '' }}" name="titular" value="{{ old('titular') }}" required autofocus>

                                @if ($errors->has('titular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titular') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="contenido" class="col-md-2 col-form-label text-md-right">{{ __('Contenido:') }}</label>

                            <div class="col-md-8">
                                
								<textarea id="contenido" type="text" class="form-control{{ $errors->has('contenido') ? ' is-invalid' : '' }}" name="contenido" value="{{ old('contenido') }}" required autofocus></textarea> 

                                @if ($errors->has('contenido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contenido') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

			  <div class="form-group row">

					<label for="imagen" class="col-md-2 col-form-label text-md-right">{{ __('Cargar imagen:') }}</label>

					<div class="col-md-8">
						<input id="imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen" value="{{ old('imagen') }}" required autofocus>
					</div>
					
				</div>

			  
			  
		<div align="center">
			<button type="submit" class="btn btn-primary">Subir</button>
		</div>
		  

		</form>

<hr>

<div class="container" align="center">
    @foreach ($publicaciones as $mensaje)
        <div class="card col-md-12" align="center">
            <div class="ajusteImagenMensage" align="center">
                @if ($mensaje->imagen)
                <img src="{{ url('/admin/postImage/'.$mensaje->imagen) }}" class="card-img-top" alt="...">
                @endif
            </div>
            
          
          <div class="card-body">
            <h5 class="card-title">{{ $mensaje->titulo }}</h5>
            <small>Enviado por admin: {{ $mensaje->administrativo_id }}</small>
            <p class="card-text">{{ $mensaje->contenido }}</p>
            <a href="{{ url('/administrativo/delete/mensaje/'.$mensaje->id) }}" class="btn btn-danger">Eliminar</a>
          </div>
        </div>
    @endforeach
</div>

@endsection