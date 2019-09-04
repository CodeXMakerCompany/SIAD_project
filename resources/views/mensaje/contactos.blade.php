@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	<div class="card-header">{{ __('Listado contactos') }}</div>
					<div class="card-body">
						<ul class="list-group list-group-flush">
						    @foreach ($docentes as $docente)
						    <div class="row">
						    	<div class="col-md-9">
						    		<li class="list-group-item text-center">
						    			{{ $docente->nombre }} {{ $docente->apellidos }}
						    		</li>
						    	</div>
						    	<div class="col-md-3">
						    		<a href="{{ url('/chat/'.$docente->id) }}">
						    			<i class="fas fa-comments"></i>
						    		</a>
						    		
						    	</div>
						    </div>
							@endforeach
						  </ul>
					</div>	
				</div>
			</div>	
		</div>
	</div>	
@endsection