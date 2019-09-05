
@extends('layouts.dashboardAdmin')
@section('content')
	<h1>Bienvenido</h1>

	<h3>Administrador registrado con el correo: {{ auth('admins')->user()->email }}</h3>
	
@endsection

