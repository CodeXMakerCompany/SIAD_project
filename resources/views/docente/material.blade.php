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

	<form action="{{ route('store.material') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}
			
			<div class="row justify-content-center">
	        <div class="col-md-8">
	        	<h2>Agregar nuevo material</h2>
	        	<hr>


			  <div class="form-group row">
                            <label for="descripcion" class="col-md-2 col-form-label text-md-right">{{ __('Descripción:') }}</label>

                            <div class="col-md-8">
                                
								<input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

			  <div class="form-group row">

					<label for="material" class="col-md-2 col-form-label text-md-right">{{ __('Cargar material:') }}</label>

					<div class="col-md-8">
						<input id="material" type="file" class="form-control{{ $errors->has('material') ? ' is-invalid' : '' }}" name="material" value="{{ old('material') }}" required autofocus>
					</div>
					
				</div>

			  
			  
		<div class="text-center">
			<button type="submit" class="btn btn-primary">Subir</button>
		</div>
		  
		<hr>
		</form>

	<div class="container">
 <h2>Material didactico</h2>            
	  <table class="table table-dark table-striped">
	    <thead>
	      <tr>
	        <th>Usuario que subió</th>
	        <th>Descripción</th>
	        <th>Código</th>
	        <th>Archivo</th>
	        <th>Fecha de creacion</th>
	        <th>Acciones</th>
	      </tr>
	    </thead>
	    <tbody>

	      
	        @foreach ($materialesDidacticos as $material)
	        <tr>
	        	<td>{{ $material->docente->nombre }}</td>
				<td>{{ $material->Descripcion }}</td>
				<td>{{ $material->CodigoMaterial }}</td>
				<td>{{ $material->Archivo }}</td>
				<td>{{ $material->created_at }}</td>
				<td>
					<div class="row text-center">
						<a href="{{ url('/material/descargar/'.$material->Archivo) }}">
							<div class="btn_opciones">
							<i class="fas fa-download"></i>
						</div>
						</a>
						<a href="{{ url('/material/eliminar/'.$material->id) }}">
							<div class="btn_opciones">
							<i class="fas fa-trash-alt"></i>
						</div>
						</a>						
					</div>

				</td>
 			</tr>
			@endforeach
	     
	      
	    </tbody>
	  </table>

	  	{{ $materialesDidacticos->links() }}
	</div>
@endsection