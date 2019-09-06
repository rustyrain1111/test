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
                        <form method="POST">
{{--                        <form action="{{ $announcement ? route('new.announcement', ['id' => $user->id]) : route('announcement.store') }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            @if($user)--}}
{{--                                @method('PUT')--}}
{{--                            @endif--}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="name" id="name" value="{{''}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="announcement" id="announcement" class="form-control" rows="20"></textarea>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
