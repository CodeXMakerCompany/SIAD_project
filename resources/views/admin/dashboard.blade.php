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
        <h1>Bienvenido</h1>
        <hr>
    <h3>Administrador registrado con el correo: {{ auth('admins')->user()->email }}</h3>
    <br>
    </div>
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
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>{{ $administrativos }}</span></h2>
                    
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
            <p class="card-text">{{ $mensaje->contenido }}</p>
            <a href="{{ url('/admin/mensaje/delete/'.$mensaje->id) }}" class="btn btn-danger">Eliminar</a>
          </div>
        </div>
    @endforeach
</div>
    

	
@endsection

