@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card" align="center">
                <div class="card-header">Login de administrador</div>
                <div  align="center">
                    <div class="col-md-10">
                    <img class="img-fluid resize_logo" alt="Responsive image" src="{{ asset('img/logoSIAD.png') }}">
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <h4>Introduce tus datos de acceso</h4>
                        <div class="form-group row">
                            
                            <div class="col-md-1 col-sm-2">
                                <i class="fas fa-envelope icons"></i>
                            </div>
                            <div class="col-md-11 col-sm-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Introduce tu email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            
                            <div class="col-md-1 col-sm-2">
                                <i class="fas fa-lock icons"></i>
                            </div>

                            <div class="col-md-11 col-sm-10">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Introduce tu contraseña">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <center>           
                            <p class="admin_txt">
                                Ingrese con sus credenciales de administrador.
                            </p>                       
                        </center> 

                        <div class="form-group row col-md-12">
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Entrar') }}
                                </button>                                                         
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <button type="exit" class="btn btn-danger" onclick="window.history.back();">
                                    {{ __('Salir') }}
                                </button>                                                         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
