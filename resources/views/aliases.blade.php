@extends('layouts.app')
@section('content')
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th>
					ID
				</th>
				<th>
					Name
				</th>
				<th>
					Number
				</th>
				<th>
					Login
				</th>
			</tr>		
		</thead>
		<tbody>
			@foreach($modal as $item)
			<tr>
				<th>
					{{$item->id}}
				</th>
				<th>
					{{$item->name}}
				</th>
				<th>
					{{$item->number}}
				</th>
				<th>
					{{$item->Login}}
				</th>
			</tr>
			@endforeach
		</tbody>
	</table>




@endsection