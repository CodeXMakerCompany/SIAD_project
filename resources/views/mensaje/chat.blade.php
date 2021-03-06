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
            	<div class="card-header">{{ __('Chat') }} {{ $docente->nombre }}</div>

					<div class="card-body row">

						<div class="col-md-6 chat-container">
							@if ($mensajes)
								
								@foreach ($mensajes as $mensaje)
								
								<div align="right">
									@if ($mensaje->alumno_id === $id)
										
										@if ($mensaje->destinatarioDocente_id === $docente->id)
										Yo:
											<div class="col-md-12 alert alert-success">
												<div>
													{{ $mensaje->contenido }}
												</div>
											
											<small>{{ $mensaje->created_at }}</small> 
										</div>
										@endif
										
								@endif
								</div>	
								@endforeach
							@endif

						</div>
						<div class="col-md-6 chat-container">
							@if ($mensajeDocente)
								<div align="right">
									@foreach ($mensajeDocente as $mensajeDoc)

										@if ($mensajeDoc->docente_id === $docente->id)
										@if ($mensajeDoc->destinatarioAlumno_id === $id)
											<div class="col-md-12 alert alert-primary">
												<div>
													{{ $mensajeDoc->contenido }}
												</div>
											
											<small>{{ $mensajeDoc->created_at }}</small> 
										</div>
										@endif
											
										@endif
										
									@endforeach
								</div>
							@endif
						</div>
	
					</div>

					<div class="card-footer">

						<form action="{{ route('mensaje.save') }}" method="POST">

							{{ csrf_field() }}

						  <div class="form-group">

						  	<div class="form-group" style="display: none">
						    <label for="docente">Docente:</label>
						    <select name="docente" id="" class="form-control" id="docente">
								
									<option value="{{ $docente->id }}">{{ $docente->id }}</option>
						
							</select>
						  </div>

						    <label for="contenido">Mensaje:</label>
						    <textarea id="contenido" type="text" class="form-control{{ $errors->has('contenido') ? ' is-invalid' : '' }}" name="contenido" value="{{ old('contenido') }}" required autofocus></textarea>
						  </div>
						  
						  <button type="submit" class="btn btn-primary">Enviar</button>
						</form>

					</div>

					
					
				</div>
			</div>	
		</div>
	</div>	
@endsection