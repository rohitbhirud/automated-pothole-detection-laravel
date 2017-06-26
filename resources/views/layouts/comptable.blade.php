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

			<th class="text-center">Delete Complaint</th>

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
				<form action="{{ route('compDelete', $complaint) }}" method="POST">
				    {{ method_field('DELETE') }}
				    {{ csrf_field() }}
				    <button class="btn btn-sm btn-danger">Delete Complaint</button>
				</form>
			</td>

			<td>
				<a href="{{ route('compDetails', ['complaint' => $complaint]) }}" class="btn btn-sm btn-info">
					Detail
				</a>
			</td>

	    </tr>

	@endforeach

	</tbody>

</table>