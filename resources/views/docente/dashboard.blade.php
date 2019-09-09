@extends('layouts.dashboardDocente')
	
@section('content')

	<div  align="center">
                    <div class="col-md-12">
                        <img class="img-fluid" alt="Responsive image" src="{{ asset('img/baner2.jpg') }}" alt="">
    </div>
   </div>
<hr>
<center>
  <div class="card" style="width: 18rem;">
  <div class="card-header">
    Bienvenido profesor
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    	Identificado como: {{ auth('docentes')->user()->nombre }} {{ auth('docentes')->user()->apellidos }}</li>
    <li class="list-group-item">Correo: {{ auth('docentes')->user()->email }}</li>
    <li class="list-group-item">Cedula : {{ auth('docentes')->user()->cedula }}</li>
    <li class="list-group-item">Teléfono : {{ auth('docentes')->user()->celular }}</li>
    <li class="list-group-item">Registrado el : {{ auth('docentes')->user()->created_at }}</li>
  </ul>
</div>
<center/>
@endsection
