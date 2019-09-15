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

	<div class="col-md-12 row">

  <div class="col-md-4">
    <div  align="center">
                    <div class="col-md-10">
                    <img class="img-fluid resize_logo" alt="Responsive image" src="{{ asset('img/logoSIAD.png') }}">
                    </div>
                </div>
  </div>

  <div class="col-md-4">
    <div  align="center">
                    <div class="col-md-12">
                        <h3>Panel Administrativos</h3>
    </div>
   </div>
  </div>
  <div class="col-md-4">
    <center>
  <div class="card" style="width: 18rem;">
  <div class="card-header">
    Administrativo
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <div class="row">
        <div class="col-md-3">
          <i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green;"></i>
        </div>
        <div class="col-md-8 text-left">
         <b>Online: </b>
          {{ auth('administrativos')->user()->nombre }} {{ auth('administrativos')->user()->apellidos }}
        </div>
      </div>
      
      </li>
    <li class="list-group-item">Correo: {{ auth('administrativos')->user()->email }}</li>
    <li class="list-group-item">Registrado el : {{ auth('administrativos')->user()->created_at }}</li>
  </ul>
	 </div>
	<center/>
  </div>
</div>  

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Panel de control Administrativos</li>
  </ol>
</nav>


<div class="col-md-12 row">
  <div class="col-md-3">
    <div class="col-md-12">
     <center>

		<div class="card">
		  <div class="card-header">
		    Catálogo Administrativo
		  </div>
		  <ul class="list-group list-group-flush content-colorB">
		    <li class="list-group-item">
		      
		     <a class="list-group-item" href="{{ route('administrativos.area') }}">
		                                    <i class="fas fa-folder-open"></i> Nuevo evento
		                                </a>
		      
		      </li>
		    <li class="list-group-item">
		      <a class="nav-link" href="{{ route('show.events') }}">
		                                    <i class="fas fa-file"></i> 
		                                    Gestionar eventos
		                                </a>
		    </li>
		    <li class="list-group-item">
		      <a class="nav-link" href="{{ route('administrativos.posts') }}">
		                                    <i class="fas fa-pencil-alt"></i> 
		                                    Publicar
		                                </a>
		    </li>
		    <li class="list-group-item">
		                                <a class="nav-link" href="{{ route('administrativos.area') }}">
		                                    <i class="fas fa-clipboard-list"></i>
		                                    Agenda
		                                </a>

		    </li>
		  </ul>
		</div>

     </center>
    </div>

    <br>

    <div class="col-md-12">
          <center>
			  <div class="card">
			  <div class="card-header" style="background-color: #3F7543">
			    Reportes
			  </div>
			  <ul class="list-group list-group-flush content-colorB">
			    <li class="list-group-item">
			      
			     <a class="list-group-item" href="{{ route('show.events') }}">
			                                    <i class="fas fa-chevron-right"></i> Eventos
			                                </a>
			      
			      </li>
			    <li class="list-group-item">
			      <a class="nav-link" href="{{ route('administrativos.posts') }}">
			                                    <i class="fas fa-chevron-right"></i> 
			                                    Mensajes
			                                </a>
			    </li>
			  </ul>
			</div>
			<center/>       
    </div>
  </div>

  <div class="col-md-9 col-sm-12">
    <h5>Docente conectado: {{ auth('administrativos')->user()->nombre }} {{ auth('administrativos')->user()->apellidos }}</h5>
    <hr>
		
		<div style="background-color: #fff">

			<div class="container">	<center>	<h2>Agenda</h2></center>	</div>
			<div class="row">
			<div class="col"></div>
			<div class="col-10"><div id="CalendarioWeb"></div></div>
			<div class="col"></div>
			</div>
		</div>

  </div>
</div>

 	


@endsection
