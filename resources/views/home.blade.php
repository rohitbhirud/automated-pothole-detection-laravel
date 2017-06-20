@extends('layouts.master')

@section('content')
<div class="row counter">
  <div class="col-md-3 single_counter text-center">
    <span class="count_top">
      <span class="glyphicon glyphicon-import" aria-hidden="true"></span>
      Total Potholes

    </span>
    <div class="count">323</div>
  </div>
  <div class="col-md-3 single_counter text-center">
    <span class="count_top">
      <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
      Total Traffic
    </span>
    <div class="count">3434</div>
  </div>
  <div class="col-md-3 single_counter text-center">
    <span class="count_top">
      <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
      Total Accident
    </span>
    <div class="count">45</div>
  </div>
  <div class="col-md-3 single_counter text-center">
    <span class="count_top">
      <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      Total Users
    </span>
    <div class="count green">66</div>
  </div>
</div>

<div class="row">
  <div class="col-md-8 dashboard_map">
    <div class="map_header text-center">Recent Complaints</div>
    <div id="map"></div>
  </div>
  
  <div class="col-md-4">
    
    <div class="attr text-center">
      <h4>Project By</h4>
      <ul class="list-group">
        <li class="list-group-item">Ankush Jangle</li>
        <li class="list-group-item">Rohit Bhirud</li>
        <li class="list-group-item">Gunavant Kapade</li>
        <li class="list-group-item">Tushar Shinde</li>
        <li class="list-group-item">Swapnil Patil</li>
      </ul>  
    </div>    
  
  </div>
</div>
@endsection
