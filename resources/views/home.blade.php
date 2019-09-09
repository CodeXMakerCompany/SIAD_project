@extends('layouts.app')

@section('content')
        
<div  align="center">
                    <div class="col-md-12">
                        <img style="height: 200px; width: 1200px;" class="img-fluid" alt="Responsive image" src="{{ asset('img/students.jpg') }}" alt="">
    </div>
</div>
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
@endsection