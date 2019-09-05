@extends('layouts.dashboardDocente')
	
@section('content')
	<h1>Bienvenido</h1>
	<h3>Identificado como: {{ auth('docentes')->user()->nombre }}  {{ auth('docentes')->user()->apellidos }}</h3> 
@endsection
