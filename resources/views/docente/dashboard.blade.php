@extends('layouts.app')
	
@section('content')
	<h1>entreste jijiBienvenido al panel vacio ! yaaaaay fiestaaa!</h1>
	{{ auth('docentes')->user()->email }}
@endsection
