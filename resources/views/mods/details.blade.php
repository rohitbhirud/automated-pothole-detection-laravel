@extends('layouts.master')

@section('content')
{{ $complaint->mobile }}
<div class="row details">
  
  <div class="col-md-4 left-col">
     <div>Complainer Name : </div>
     <div>Complainer Mobile : </div>
     <div>Complaint Title : </div>
     <div>Complaint Type : </div>
     <div>Longitude : </div>
     <div>Latitude : </div>
     <div>Image : </div>
  </div>

  <div class="col-md-8 right-col">
    <div><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $complaint->user->fullname }}</div>
    <div><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> {{ $complaint->user->mobile }}</div>
    <div><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> {{ $complaint->title }}</div>
    <div><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> {{ $complaint->type }}</div>
    <div><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <span id="longitude">{{ $complaint->longitude }}</span></div>
    <div><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <span id="latitude">{{ $complaint->latitude }}</span></div>
    <div>
    
      <span class='glyphicon glyphicon-camera' aria-hidden='true'></span>
      @if ($complaint->imagename == "")
           No Image Uploaded
      @else
          <a type="button" data-toggle="modal" data-target="#myModal">View Image</a>
      @endif

    </div>

      <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 

        <form action="{{ action('ModsController@update', ['id' => $complaint->id]) }}" method="post">

          {{ csrf_field() }}

            <select name="status" class="form-control">
              <option value="">----</option>
              <option value="open">Open</option>
              <option value="working">Working</option>
              <option value="closed">Closed</option>
            </select>

            {{ 'Current Status : ' . ( ($complaint->status == '') ? 'Not Defined' : $complaint->status ) }}

            <div class="form-group">
                <textarea class="form-control" name="comment" placeholder="Enter Comment">{{ $complaint->comment }}</textarea>
            </div>
                  
            <input class="btn btn-primary" type="submit" value="Update" />

        </form>



</div>

<div id="map"></div>

<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <img class="center-block" width="100%" src="{{ Storage::url( $complaint->imagename ) }}" />
        </div>
      </div>
    </div>
  </div>

  <script>
    var displayLat = +document.getElementById('latitude').innerHTML;
    var displayLong = +document.getElementById('longitude').innerHTML;

    console.log(displayLong, displayLat);
        
      function initMap() {
        var uluru = {lat: displayLat, lng: displayLong};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru,
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
  </script>

@endsection