@extends('layouts.master')

@section('content')
	
	<ul class="list-group reports text-center center-block">
	  <a href="{{ route('reports', ['type' => 'pothole']) }}"><li class="list-group-item">
	    This Month's Potholes
	  </li></a>
	  <a href="{{ route('reports', ['type' => 'traffic']) }}"><li class="list-group-item">
	    This Month's Traffic
	  </li></a>
	  <a href="{{ route('reports', ['type' => 'accident']) }}"><li class="list-group-item">
	    This Month's Accidents
	  </li></a>
	</ul>

@endsection