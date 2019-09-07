@extends('layouts.dashboardAdministrativos')

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

 	<div style="background-color: #fff">

	<div class="container">	<center>	<h2>Agenda</h2></center>	</div>
	<div class="row">
	<div class="col"></div>
	<div class="col-10"><div id="CalendarioWeb"></div></div>
	<div class="col"></div>
	</div>
	</div>
@endsection
