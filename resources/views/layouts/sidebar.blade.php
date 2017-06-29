<!-- Sidebar Start -->
<ul class="list-group text-center">

  <!-- Common Home Link -->
  <a href="{{ route('home') }}">
    <li class="list-group-item">
      <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
      Home
    </li>
  </a>
  
  @if ( Auth::user()->hasRole('engineer') )

    <a href="{{ action('ModsController@complaints') }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        View Assign Complains
      </li>
    </a>
    
    <a href="{{ action('ModsController@closed') }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-import" aria-hidden="true"></span>
        Close Complain
      </li>
    </a>
 
  @elseif ( Auth::user()->hasRole('admin') )
  
    <a href="{{ action('EngineersController@index') }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        Engineers
      </li>
    </a>
    <a href="{{ route('users') }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        Users
      </li>
    </a>
    <a href="{{ route('complaints', ['type' => 'pothole']) }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-import" aria-hidden="true"></span>
        View Potholes
      </li>
    </a>
    <a href="{{ route('complaints', ['type' => 'traffic']) }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
        View Traffic
      </li>
    </a>
    <a href="{{ route('complaints', ['type' => 'accident']) }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
        View Accidents
      </li>
    </a>
    <a href="{{ route('reports') }}">
      <li class="list-group-item">
        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
        Reports
      </li>
    </a>
  @endif

  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    
    <li class="list-group-item">
      <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
      Logout
    </li>

  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
</ul>