@extends ('layouts.admin')

@section ('content')
	<h2 class="card-title">Count of users – {{ $count }}</h2>

	<div class="table-responsive">
	<table class="table table-hover">
		<caption>List of users</caption>
		<thead class="thead-dark">
			<th scope="col">nr.</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Role</th>
			<th scope="col">Edit</th>
			<th scope="col">Delete</th>
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
					<i class="fas fa-edit"></i>
				</td>
				<td>
			@if ($user->deleted_at != null)
				<form action="{{ route('admin.restore.user', $user->id) }}"
						method="post">
					<button class="btn btn-dark"
							onclick="return confirm('Restore this user?')">
						<i class="fas fa-trash-restore"></i>
					</button>
					@method ('patch')
					@csrf
				</form>
			@else
				<form action="{{ route('admin.delete.user', $user->id) }}"
						method="post">
					<button class="btn btn-danger"
							onclick="return confirm('You realy want to kill this user?')">
						<i class="fas fa-trash"></i>
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

	{{ $users->links() }}
	</div>
@endsection
