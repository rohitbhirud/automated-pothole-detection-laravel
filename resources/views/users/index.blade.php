@extends('layouts.master')

@section('content')

	<table class="table table-bordered">

	<thead>
	    <tr>
			<th class="text-center">Username</th>

			<th class="text-center">Full Name</th>

			<th class="text-center">Email</th>

			<th class="text-center">Mobile</th>

			<th class="text-center">Adhar No.</th>

			<th class="text-center">Registered On</th>

			<th class="text-center">Reported Complaints</th>

			<th class="text-center">Delete User</th>
	    </tr>
	</thead>

	<tbody>

	@foreach ( $users as $user )

	    <tr class="text-center">

			<td>{{ $user->username }}</td>

			<td>{{ $user->fullname }}</td>

			<td>{{ $user->email }}</td>

			<td>{{ $user->mobile }}</td>
			
			<td>{{ $user->adharno }}</td>

			<td>{{ $user->created_at }}</td>

			<td>
				<a href="{{ route('userComplaints', ['user' => $user]) }}" class="btn btn-sm btn-info">
					Complaints
				</a>
			</td>

			<td>
				<form action="{{ route('userDelete', $user) }}" method="POST">
				    {{ method_field('DELETE') }}
				    {{ csrf_field() }}
				    <button class="btn btn-sm btn-danger">Delete User</button>
				</form>
			</td>

	    </tr>

	@endforeach

	</tbody>

</table>

@endsection