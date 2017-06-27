@extends('layouts.master')

@section('content')

	<form action="{{ route('engineer.store') }}" method="POST" class="form-horizontal eng_form">

	{{ csrf_field() }}
      
	  <div class="form-group has-feedback">
	    <label for="username" class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-10">
	      <input name="username" type="text" class="form-control" id="eng_username" placeholder="Username" required>
	      
	      <i class="fa fa-user-circle form-control-feedback" aria-hidden="true"></i>
	    </div>
	  </div>

	  <div class="form-group has-feedback">
	    <label for="fullname" class="col-sm-2 control-label">Engineer Full Name</label>
	    <div class="col-sm-10">
	      <input name="fullname" type="text" class="form-control" id="eng_name" placeholder="Name" required>
	      
	      <i class="fa fa-user-circle form-control-feedback" aria-hidden="true"></i>
	    </div>
	  </div>

	  <div class="form-group has-feedback">
	    <label for="mobile" class="col-sm-2 control-label">Engineer Mobile</label>
	    <div class="col-sm-10">
	      <input name="mobile" type="text" class="form-control" id="eng_contact" placeholder="Mobile" required>
	      <i class="fa fa-mobile form-control-feedback" aria-hidden="true"></i>
	    </div>
	  </div>

	  <div class="form-group has-feedback">
	    <label for="email" class="col-sm-2 control-label">Engineer Email</label>
	    <div class="col-sm-10">
	      <input name="email" type="email" class="form-control" id="eng_email" placeholder="Email" required>
	      <i class="fa fa-envelope form-control-feedback" aria-hidden="true"></i>
	    </div>
	  </div>

	  <div class="form-group has-feedback">
	    <label for="password" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
	      <i class="fa fa-unlock form-control-feedback" aria-hidden="true"></i>
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Add Engineer</button>
	    </div>
	  </div>

	</form>

@endsection