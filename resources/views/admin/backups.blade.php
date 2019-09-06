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


	<form action="{{ route('store.backup') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			<div class="row justify-content-center">
	        <div class="col-md-8">
	        	<h2>Agregar nuevo backup</h2> 

			  <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-8">
                                
								<input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

			  <div class="form-group row">

					<label for="backup" class="col-md-4 col-form-label text-md-right">{{ __('Cargar backup:') }}</label>

					<div class="col-md-8">
						<input id="backup" type="file" class="form-control{{ $errors->has('tarea') ? ' is-invalid' : '' }}" name="backup" value="{{ old('backup') }}" required autofocus>
					</div>
					
				</div>

			  
			  
		<div class="text-right">
			<button type="submit" class="btn btn-primary">Subir</button>
		</div>
		  

		</form>
		<hr>
	<div class="container">
	  <h2>Backups</h2>            
	  <table class="table table-dark table-striped">
	    <thead>
	      <tr>
	        <th>Nombre</th>
	        <th>Fecha de subida</th>
	        <th>Acciones</th>
	      </tr>
	    </thead>
	    <tbody>

	      
	        @foreach ($backups as $backup)
	        <tr>
	        	<td>{{ $backup->nombre }}</td>
	        	<td>{{ $backup->created_at }}</td>
				<td>
					<div class="row text-center">
			
						<a href="{{ url('/backup/eliminar/'.$backup->id) }}">
							<div class="btn_opciones">
							<i class="fas fa-trash-alt"></i>
						</div>
						</a>

						<a href="{{ url('/backup/'.$backup->archivo) }}">
							<div class="btn_opciones">
									<i class="fas fa-download"></i>
							</div>
						</a>
						
					</div>

				</td>
 			</tr>
			@endforeach
	     
	      
	    </tbody>
	  </table>

	  	{{ $backups->links() }}
	</div>
@endsection