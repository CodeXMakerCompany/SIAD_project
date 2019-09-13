@extends('layouts.dashboardDocente')
	
@section('content')

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
                        <img class="img-fluid" alt="Responsive image" src="{{ asset('img/banerDoc.png') }}" style="height: 100px; width: 500px; ">
    </div>
   </div>
  </div>
  <div class="col-md-4">
    <center>
  <div class="card" style="width: 18rem;">
  <div class="card-header">
    Bienvenido profesor
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <div class="row">
        <div class="col-md-3">
          <i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green;"></i>
        </div>
        <div class="col-md-8 text-left">
         <b>Online: </b>
          {{ auth('docentes')->user()->nombre }} {{ auth('docentes')->user()->apellidos }}
        </div>
      </div>
      
      </li>
    <li class="list-group-item">Correo: {{ auth('docentes')->user()->email }}</li>
    <li class="list-group-item">Cedula : {{ auth('docentes')->user()->cedula }}</li>
    <li class="list-group-item">Teléfono : {{ auth('docentes')->user()->celular }}</li>
    <li class="list-group-item">Registrado el : {{ auth('docentes')->user()->created_at }}</li>
  </ul>
</div>
<center/>
  </div>
</div>

	
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Docentes</li>
  </ol>
</nav>


<div class="col-md-12 row">
  <div class="col-md-3">
    <div class="col-md-12">
     <center>
  <div class="card">
  <div class="card-header" #3F7543>
    Catálogo docente
  </div>
  <ul class="list-group list-group-flush content-colorB">
    <li class="list-group-item">
      
     <a class="list-group-item" href="{{ route('docente.material') }}">
                                    <i class="fas fa-folder-open"></i> Material didáctico
                                </a>
      
      </li>
    <li class="list-group-item">
      <a class="nav-link" href="{{ route('show.tareas') }}">
                                    <i class="fas fa-file"></i> 
                                    Planificación de tareas
                                </a>
    </li>
    <li class="list-group-item">
      <a class="nav-link" href="{{ route('mostrar.alumnos') }}">
                                    <i class="fas fa-pencil-alt"></i> 
                                    Pantalla de evaluaciones
                                </a>
    </li>
    <li class="list-group-item">
                                <a class="nav-link" href="{{ route('mostrar.alumnos') }}">
                                    <i class="fas fa-clipboard-list"></i>
                                    Tareas alumnos
                                </a>

    </li>
    <li class="list-group-item">
                                <a class="nav-link" href="{{ route('mostrar.alumnos') }}">
                                <i class="fas fa-comments"></i>
                             Chat</a>
    </li>
  </ul>
</div>
<center/>
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
      
     <a class="list-group-item" href="{{ route('docente.material') }}">
                                    <i class="fas fa-chevron-right"></i> Asignaciones por docente
                                </a>
      
      </li>
    <li class="list-group-item">
      <a class="nav-link" href="{{ route('mostrar.alumnos') }}">
                                    <i class="fas fa-chevron-right"></i> 
                                    Estudiantes por asignatura
                                </a>
    </li>
    <li class="list-group-item">
      <a class="nav-link" href="{{ route('mostrar.alumnos') }}">
                                    <i class="fas fa-chevron-right"></i>
                                    Entrega de tareas
                                </a>
    </li>
    <li class="list-group-item">
                                <a class="nav-link" href="{{ route('docente.material') }}">
                                    <i class="fas fa-chevron-right"></i>
                                    Material aprendizaje
                                </a>

    </li>
    <li class="list-group-item">
                                <a class="nav-link" href="{{ route('show.tareas') }}">
                                <i class="fas fa-chevron-right"></i>
                            Crear tarea</a>
    </li>
  </ul>
</div>
<center/>       
    </div>
  </div>
  <div class="col-md-9 col-sm-12">
    <h5>Docente conectado: {{ auth('docentes')->user()->nombre }} {{ auth('docentes')->user()->apellidos }}</h5>
    <hr>
    <div class="row">
      <div class="col-md-3 col-sm-12">
        <div class="card" style="width: 12rem;">
          <div class="card-header" style="background-color: #F5F5F5">
             <img src="{{ asset('img/docente1.png') }}" class="img-fluid" alt="Responsive image" style="padding: 10px;">
          </div>
       
        <div class="card-body" align="center">
          <p class="card-text">Planificación de tareas.</p>
          <a href="{{ route('show.tareas') }}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-down"></i> Entrar</a>
        </div>
      </div>
      </div>
      

      <div class="col-md-3">
        <div class="card" style="width: 12rem;">
          <div class="card-header" style="background-color: #F5F5F5">
             <img src="{{ asset('img/docente2.png') }}" class="img-fluid" alt="Responsive image" style="padding: 10px;">
          </div>
       
        <div class="card-body" align="center">
          <p class="card-text">Material didáctico para estudiantes.</p>
          <a href="{{ route('docente.material') }}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-down"></i> Entrar</a>
        </div>
      </div>
      </div>

       <div class="col-md-3">
        <div class="card" style="width: 12rem;">
          <div class="card-header" style="background-color: #F5F5F5">
             <img src="{{ asset('img/tareas.png') }}" class="img-fluid" alt="Responsive image" style="padding: 10px;">
          </div>
       
        <div class="card-body" align="center">
          <p class="card-text">Tareas de estudiantes.</p>
          <a href="{{ route('mostrar.alumnos') }}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-down"></i> Entrar</a>
        </div>
      </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 12rem;">
          <div class="card-header" style="background-color: #F5F5F5">
             <img src="{{ asset('img/docente3.png') }}" class="img-fluid" alt="Responsive image" style="padding: 10px;">
          </div>
       
        <div class="card-body" align="center">
          <p class="card-text">Pantalla de evaluaciones.</p>
          <a href="{{ route('mostrar.alumnos') }}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-down"></i> Entrar</a>
        </div>
      </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 12rem;">
          <div class="card-header" style="background-color: #F5F5F5">
             <img src="{{ asset('img/docente4.png') }}" class="img-fluid" alt="Responsive image" style="padding: 10px;">
          </div>
       
        <div class="card-body" align="center">
          <p class="card-text">Pantalla de reportes.</p>
          <a href="{{ route('mostrar.alumnos') }}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-down"></i> Entrar</a>
        </div>
      </div>
      </div>

    </div>
    




  </div>
</div>

@endsection
