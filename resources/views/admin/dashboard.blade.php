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


	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="col-md-12" align="center">



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
                        <img class="img-fluid" alt="Responsive image" src="{{ asset('img/banerAdmin.png') }}" style="height: 100px; width: 500px; ">
    </div>
   </div>
  </div>
  <div class="col-md-4">
    <center>
  <div class="card" style="width: 18rem;">
  <div class="card-header">
    Bienvenido Administrador
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <div class="row">
        <div class="col-md-3">
          <i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green;"></i>
        </div>
        <div class="col-md-8 text-left">
         <b>Online: </b>
          {{ auth('admins')->user()->email }}
        </div>
      </div>
      
      </li>
    <li class="list-group-item">Correo: {{ auth('admins')->user()->email }}</li>
    <li class="list-group-item">Registrado el : {{ auth('admins')->user()->created_at }}</li>
  </ul>
</div>
<center/>
  </div>
      


    <br>
    </div>
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Panel de control</li>
              </ol>
    </nav>

    <div class="col-md-12 row">
        <div class="col-md-3">
            <div class="col-md-12">
             <center>
                <div class="card">
  <div class="card-header">
    Catálogo administrador
  </div>
  <ul class="list-group list-group-flush content-colorB">
    <li class="list-group-item">
      
     <a class="list-group-item" href="{{ route('ver.alumnos') }}">
                                    <i class="fas fa-users"></i> 
                                    Ver y editar alumnos.
                                </a>
      
      </li>
    <li class="list-group-item">
      <a class="nav-link" href="{{ route('ver.docentes') }}">
                                    <i class="fas fa-user-tie"></i> 
                                    Ver y editar docentes.
                                </a>
    </li>
    <li class="list-group-item">
      <a class="nav-link" href="{{ route('ver.administrativos') }}">
                                    <i class="fas fa-user-edit"></i> 
                                    Ver y editar administrativos.
                                </a>
    </li>
    <li class="list-group-item">
                                <a class="nav-link" href="{{ route('ver.coordinador') }}">
                                    <i class="fas fa-user-clock"></i>
                                    Ver y editar coordinadores de carrera.
                                </a>

    </li>
    <li class="list-group-item">
                                <a class="nav-link" href="{{ route('crear.mensaje') }}">
                                <i class="fas fa-comments"></i>
                             Enviar mensaje global</a>
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
     <a class="list-group-item" href="{{ route('ver.administrativos') }}">
                                    <i class="fas fa-chevron-right"></i> Administradores
                                </a>
    </li>

    <li class="list-group-item">
      <a class="nav-link" href="{{ route('ver.alumnos') }}">
                                    <i class="fas fa-chevron-right"></i> 
                                    Alumnos
                                </a>
    </li>

    <li class="list-group-item">
      <a class="nav-link" href="{{ route('ver.coordinador') }}">
                                    <i class="fas fa-chevron-right"></i>
                                    Coordinadores
                                </a>
    </li>

    <li class="list-group-item">
                                <a class="nav-link" href="{{ route('ver.docentes') }}">
                                    <i class="fas fa-chevron-right"></i>
                                   Docentes
                                </a>
    </li>


  </ul>
</div>
<center/>       
</div>

 </div>

    <div class="col-md-9 col-sm-12">
        <h5>Docente conectado: </h5>
        <hr>

        <div class="row col-sm-12">

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Alumnos</h6>
                                <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>{{ $users }}</span></h2>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Docentes</h6>
                                <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>{{ $docentes }}</span></h2>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Administrativos</h6>
                                <h2 class="text-right"><i class="fas fa-users-cog f-left"></i><span>{{ $administrativos }}</span></h2>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Coordinadores</h6>
                                <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>{{ $coordinadores }}</span></h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="container" align="center">
            @foreach ($mensajes as $mensaje)
                <div class="card col-md-10" align="center">
                    <div class="ajusteImagenMensage" align="center">
                        @if ($mensaje->imagen)
                        <img src="{{ url('/admin/postImage/'.$mensaje->imagen) }}" class="card-img-top" alt="...">
                        @endif
                    </div>
                    
                  
                  <div class="card-body">
                    <h5 class="card-title">{{ $mensaje->titulo }}</h5>
                    <small>Enviado por admin: {{ $mensaje->id }}</small>
                    <p class="card-text">{{ $mensaje->contenido }}</p>
                    <a href="{{ url('/admin/mensaje/delete/'.$mensaje->id) }}" class="btn btn-danger">Eliminar</a>
                  </div>
                </div>
            @endforeach
        </div>

        </div>
    </div>

    </div>
	
@endsection

