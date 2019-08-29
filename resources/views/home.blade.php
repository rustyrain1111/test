@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Date of registration</th>
                                <th>Access rights</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="user">
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email  }}</td>
                                    <td>{{ $user->created_at }}</td>
                            @if ($user->is_admin == 1 )
                                    <td>Admin</td>
                            @else
                                    <td>User</td>        
                            @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <div class="btn btn-primary">Go back</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
