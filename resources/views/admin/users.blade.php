@extends ('layouts.admin')

@section ('content')
	<h2 class="card-title">Count of users – {{ $users->count() }}</h2>

	<div class="table-responsive">
	<table class="table table-hover">
		<caption>List of users</caption>
		<thead class="thead-dark">
			<th scope="col">id</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Role</th>
			<th scope="col">Join at (Kyiv)</th>
			<th scope="col"></th>
		</thead>
		<tbody>

	@foreach ($users as $user)
		@if ($user->deleted_at != null)
			<tr class="table-danger">
		@else
			<tr>
		@endif
				<th scope="row">{{ $user->id }}</th>

				<td>{{ $user->name }}</td>	
				<td>{{ $user->email }}</td>	

				@if ($user->is_admin == 1)
					<td>Admin</td>	
				@else
					<td>User</td>
				@endif

				<td>
					{{ $user
						->created_at
						->setTimezone('Europe/Kiev')
						->format('d/m/Y, H:m')
					}}
				</td>	
				<td>
			@if ($user->deleted_at != null)
				<form action="{{ route('admin.restore.user', $user->id) }}"
						method="post">
					<button class="btn btn-dark">
						restore
					</button>
					@method ('patch')
					@csrf
				</form>
			@else
				<form action="{{ route('admin.delete.user', $user->id) }}"
						method="post">
					<button class="btn btn-danger" method="post">
						delete
					</button>
					@method ('delete')
					@csrf
				</form>
			@endif
				</td>
			</tr>
	@endforeach

		</tbody>
	</table>
	</div>
@endsection
