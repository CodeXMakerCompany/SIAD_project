@extends('layouts.dashboardDocente')

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
            	<div class="card-header">{{ __('Chat') }} {{ $alumno->nombre }}</div>

					<div class="card-body row">

						<div class="col-md-6 chat-container">
							@if ($mensajes)
								
								@foreach ($mensajes as $mensaje)
								
								<div align="left">
									@if ($mensaje->docente_id === $id)
										
										@if ($mensaje->destinatarioAlumno_id === $alumno->id)
											<span>Yo:</span>			
											<div class="col-md-10 alert alert-primary">
											{{ $mensaje->contenido }}
											<div>
													<small>{{ $mensaje->created_at }}
												</small>
												</div> 
										</div>
										@endif
										

									@else

										
								@endif
								</div>
									
								@endforeach
							@endif

							
						</div>
						
						<div class="col-md-6 chat-container">
							@if ($mensajeAlumno)

							<div align="right">
								@foreach ($mensajeAlumno as $mensajeAlm)
									@if ($mensajeAlm->alumno_id === $alumno->id)
										@if ($mensajeAlm->destinatarioDocente_id === $id)
											
											<div class="col-md-10 alert alert-success">
												<div>
													{{ $mensajeAlm->contenido }}
												</div>
												<div>
													<small>{{ $mensajeAlm->created_at }}
												</small>
												</div>
											</div>

											
											
										@endif
										

									@endif
											
								@endforeach
							</div>
								
							@endif
						</div>

					</div>

					<div class="card-footer">

						<form action="{{ route('mensajeDoc.save') }}" method="POST">

							{{ csrf_field() }}

						  <div class="form-group">

						  	<div class="form-group" style="display: none">
						    <label for="alumno">Alumno:</label>
						 

							<input type="text" value="{{ $alumno->id }}" name="id_alumno">
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