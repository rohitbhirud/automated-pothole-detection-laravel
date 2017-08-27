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
     <div>Complain Assigned To : </div>

    @if ( $complaint->isAssigned() )

      <div>Current Status</div>
      <div>Engineer Comments</div>

    @else
    
     <div>Assign Complain to Engineer : </div>

    @endif
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

    <div class="red">
      <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 

      @if ( ! $complaint->isAssigned() )
          Complain Not Assigned
      @else
          {{ $complaint->engineer->fullname }}
      @endif
    </div>

    @if ( $complaint->isAssigned() )

    <div><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
      {{ $complaint->status }}
    </div>

    <div><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
      {{ $complaint->comment }}
    </div>

    @else

      @if ( $engineers->count() == 0 )
        <div>No Engineers Available</div>

      @else

      <form action="{{ action('ComplaintsController@assign', ['complaint' => $complaint]) }}" method="post">

      {{ csrf_field() }}

        <div name="eng_id" class="eng_list">
          <select name="engineer_id" class="form-control" required>

          <option value="">Select Engineer</option>
          
            @foreach ( $engineers as $engineer )
              <option value="{{ $engineer->id }}">
                {{ $engineer->fullname . ' - ' . $engineer->email }}
              </option>
            @endforeach

          </select>

          <input class="btn btn-default" type="submit" value="Assign Now">
        </div>

      </form>

      @endif

    @endif

  </div>

</div>

<div id="map"></div>

<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <img class="center-block" width="100%" src="{{ Storage::url( $complaint->imagepath ) }}" />
        </div>
      </div>
    </div>
  </div>

@endsection

@section('master.js')

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

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-UDxV46NHre_8ys6K0dffqrmeCOLK6Rk&callback=initMap" async defer></script>

@endsection