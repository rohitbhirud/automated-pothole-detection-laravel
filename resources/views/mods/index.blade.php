@extends('layouts.master')

@section('content')

	<table class="table table-bordered">

		<thead>
		    <tr>
				<th class="text-center">Title</th>

				<th class="text-center">Reported By</th>

				<th class="text-center">Type</th>

				<th class="text-center">Latitude</th>

				<th class="text-center">Longitude</th>

				<th class="text-center">Status</th>

				<th class="text-center">Create Date</th>

				<th class="text-center">Detail</th>
		    </tr>
		</thead>

		<tbody>


		@foreach ( $complaints as $complaint )

		    <tr class="text-center">

				<td>{{ $complaint->title }}</td>

				<td>{{ $complaint->user->fullname }}</td>

				<td>{{ $complaint->type }}</td>

				<td>{{ $complaint->latitude }}</td>
				
				<td>{{ $complaint->longitude }}</td>

				<td>{{ $complaint->status }}</td>

				<td>{{ $complaint->created_at }}</td>

				<td>
					<a href="{{ action('ModsController@details', ['complaint' => $complaint]) }}" class="btn btn-sm btn-info">
						Detail
					</a>
				</td>

		    </tr>

		@endforeach

		</tbody>

	</table>

@endsection