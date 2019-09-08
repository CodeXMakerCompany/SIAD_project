@extends('layouts.app')

@section('content')
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
            <div class="col-xs-12 ">
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
                                <div class="ajusteImagenMensage" align="center">
                                    @if ($mensaje->imagen)
                                    <img src="{{ url('/admin/postImage/'.$mensaje->imagen) }}" class="card-img-top" alt="...">
                                    @endif
                                </div>
                                
                              
                              <div class="card-body">
                                <h5 class="card-title">{{ $mensaje->titulo }}</h5>
                                <small>Enviado por admin: {{ $mensaje->id }}</small>
                                <p class="card-text">{{ $mensaje->contenido }}</p>
                                
                              </div>
                            </div>

                    </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @foreach ($mensajesAdministracion as $mensaje)
                            <div class="container" align="center">

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
                                
                              </div>
                            </div>

                    </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @foreach ($tareas as $mensaje)
                            <div class="container" align="center">

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
                                
                              </div>
                            </div>

                    </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        @foreach ($materialDidactico as $mensaje)
                            <div class="container" align="center">

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
                                
                              </div>
                            </div>

                    </div>
                        @endforeach
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</section>

</div>
@endsection