@extends('layouts.app')

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
                        <div  align="center">
                    <div class="col-md-12">
                        <img class="img-fluid" alt="Responsive image" src="{{ asset('img/banerEst.png') }}" style="height: 100px; width: 500px; ">
    </div>
   </div>
    </div>
   </div>
  </div>
  <div class="col-md-4">
    <center>
  <div class="card" style="width: 18rem;">
  <div class="card-header">
    Alumno
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <div class="row">
        <div class="col-md-3">
          <i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green;"></i>
        </div>
        <div class="col-md-8 text-left">
         <b>Online: </b>
          {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}
        </div>
      </div>
      
      </li>
    <li class="list-group-item">
        @if (Auth::user()->foto)
                    
                <div class="col-md-8">
                    <img src="{{ url('/user/avatar/'.Auth::user()->foto) }}" class="card-img-top" alt="..." class="img-rounded">
                </div>
            
            @endif
    </li>


    <li class="list-group-item">Carrera:  {{ Auth::user()->carrera->NombreCarrera }}</li>
    <li class="list-group-item">Horario:  {{ Auth::user()->horario->NombreHorario }}</li>
    <li class="list-group-item">Grupo:  {{ Auth::user()->grupo->nombre }}</li>
    <li class="list-group-item">Rol: {{ Auth::user()->role }}</li>
    <li class="list-group-item">Carnet: {{ Auth::user()->carnetEs }}</li>
    <li class="list-group-item">Cedula: {{ Auth::user()->cedulaEs }}</li>  
    <li class="list-group-item">Correo: {{ Auth::user()->email }}</li>
    <li class="list-group-item">Registrado el : {{ Auth::user()->created_at }}</li>
  </ul>
     </div>
    <center/>
  </div>
</div>

<center>
     <div class="col-md-12">
        <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
      </ol>
    </nav>
    </div>   
</center>

<div class="col-md-12 row">
  <div class="col-md-3">
    <div class="col-md-12">
     <center>

        <div class="card">
          <div class="card-header">
            Catálogo Alumno
          </div>
          <ul class="list-group list-group-flush content-colorB">
            <li class="list-group-item">
              
             <a class="list-group-item" href="{{ route('user.tarea') }}">
                                            <i class="fas fa-folder-open"></i> Entrega tareas
                                        </a>
              
              </li>
            <li class="list-group-item">
              <a class="nav-link" href="#nav-about-tab">
                                            <i class="fas fa-file"></i> 
                                            Material didáctico
                                        </a>
            </li>
            <li class="list-group-item">
              <a class="nav-link" href="#nav-contact-tab">
                                            <i class="fas fa-pencil-alt"></i> 
                                            Tareas asignadas
                                        </a>
            </li>
            <li class="list-group-item">
                                        <a class="nav-link" href="{{ route('mensaje.contactos') }}">
                                            <i class="fas fa-clipboard-list"></i>
                                            Enviar mensaje
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
                Mi perfil
              </div>
              <ul class="list-group list-group-flush content-colorB">
                <li class="list-group-item">
                  
                 <a class="list-group-item" href="{{ route('user.profile') }}">
                                                <i class="fas fa-chevron-right"></i> Subir foto
                                            </a>
                  
                  </li>
                <li class="list-group-item">
                  <a class="nav-link" href="{{ route('user.profile') }}">
                                                <i class="fas fa-chevron-right"></i> 
                                                Gestionar
                                            </a>
                </li>
              </ul>
            </div>
            <center/>       
    </div>

 </div>

 <div class="col-md-9 col-sm-12">
    <h5>Alumno conectado: {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</h5>
    <hr>
    
    <div class="container">
    @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
    @endif
    
    <section id="tabs">
    <div class="container">
        <h6 class="section-title h1">Bienvenido</h6>
        <div class="row">
            <div class="col-xs-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mensajes Globales</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Mensajes Administración</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tareas</a>
                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Material Didáctico</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                        @foreach ($mensajesGlobales as $mensaje)
                            <div class="container" align="center">

                            <div class="card col-md-10" align="center">
                                <div class="ajusteImagenMensage" align="center" style="padding-top: 20px;">
                                    @if ($mensaje->imagen)
                                    <img src="{{ url('/admin/postImage/'.$mensaje->imagen) }}" class="card-img-top" alt="...">
                                    @endif
                                </div>
                                
                              
                              <div class="card-body"  style="color: black">
                                <h5 class="card-title">{{ $mensaje->titulo }}</h5>
                            
                                <p class="card-text">{{ $mensaje->contenido }}</p>

                                <small class="card-text">
                                    {{ $mensaje->created_at }}
                                </small>
                                
                              </div>
                            </div>

                        
                    </div>
                        @endforeach

                        
                    </div>


                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        
                        @foreach ($mensajesAdministracion as $mensaje)
                            <div class="container" align="center">

                            <div class="card col-md-10" align="center">
                                <div class="ajusteImagenMensage" align="center" style="padding-top: 20px;">
                                    @if ($mensaje->imagen)
                                    <img src="{{ url('/admin/postImage/'.$mensaje->imagen) }}" class="card-img-top" alt="...">
                                    @endif
                                </div>
                                
                              
                              <div class="card-body"  style="color: black">
                                <h5 class="card-title">{{ $mensaje->titulo }}</h5>
                                
                                <p class="card-text">{{ $mensaje->contenido }}</p>

                                <small class="card-text">
                                    {{ $mensaje->created_at }}
                                </small>
                                
                              </div>
                            </div>

                    </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @foreach ($tareas as $tarea)
                            <div class="container" align="center">

                            <div class="card col-md-10" align="center">
                                <div class="ajusteImagenMensage" align="center">
                                    @if ($tarea->imagen)
                                    <img src="{{ url('/admin/postImage/'.$tarea->imagen) }}" class="card-img-top" alt="...">
                                    @endif
                                </div>
                                
                              
                              <div class="card-body" style="color: black">
                                <h5 class="card-title">Tarea: {{ $tarea->Tarea }}</h5>
                                <strong>Enviada por el profesor: {{ $tarea->docente->nombre }}</strong>
                                <br>
                                <strong>Asignatura: {{ $tarea->asignatura->NombreAsignatura }}</strong>
                                <div style="border-color: #277BB3; border-style: groove; border-radius: 6px">
                                     <p class="card-text">Intrucciones: {{ $tarea->DescripcionTarea }}</p>
                                </div>
                               
                                
                              </div>
                            </div>

                    </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        @foreach ($materialDidactico as $material)
                            <div class="container" align="center">

                            <div class="card col-md-10" align="center">
                                
                              
                              <div class="card-body" style="color: black">
                                <h5 class="card-title">{{ $material->Descripcion }}</h5>
                                <p class="card-text">Codigo material: {{ $material->CodigoMaterial }}</p>
                                <small>Enviado por el docente: {{ $material->docente->nombre }}</small>
                                <a href="{{ url('/material/descargar/'.$material->Archivo) }}">
                            <div class="btn_opciones">
                            <i class="fas fa-download"></i>
                        </div>
                        </a>

                                
                              </div>
                            </div>

                    </div>
                        @endforeach
                    </div>

                    {{ $materialDidactico->links() }}
                </div>
            
            </div>
        </div>
    </div>
</section>

</div>

</div>

</div>



@endsection