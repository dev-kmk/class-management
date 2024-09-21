@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <div class="container">
            <h4>Teacher Dashboard</h4>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
        </div>
    </div>
@endsection