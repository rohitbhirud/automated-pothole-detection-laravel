@extends('layouts.master')

@section('content')

	<a class="add_eng btn btn-primary" href="{{ route('engineer.create') }}">Add Engineer</a>

	<table class="table table-bordered">

	<thead>
	    <tr>
			<th class="text-center">Engineer Name</th>

			<th class="text-center">Username</th>

			<th class="text-center">Email</th>

			<th class="text-center">Mobile No.</th>
			
			<th class="text-center">Joined Date</th>

			<th class="text-center">Assigned Complaints</th>

			<th class="text-center">Delete Engineer</th>
	    </tr>
	</thead>

	<tbody>

	@foreach ( $engineers as $engineer )

	    <tr class="text-center">

			<td>{{ $engineer->fullname }}</td>

			<td>{{ $engineer->username }}</td>

			<td>{{ $engineer->email }}</td>

			<td>{{ $engineer->mobile }}</td>
			
			<td>{{ $engineer->created_at }}</td>

			<td><a href="{{ action('EngineersController@complaints', ['engineer' => $engineer]) }}" class="btn btn-sm btn-info">Complaints</a></td>

			<td>
				<form action="{{ route('engineer.destroy', $engineer->id) }}" method="POST">
				    {{ method_field('DELETE') }}
				    {{ csrf_field() }}
				    <button class="btn btn-sm btn-danger">Delete Engineer</button>
				</form>
			</td>

	    </tr>

	@endforeach

	</tbody>

</table>

@endsection