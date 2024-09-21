@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <div class="container">
            <h4>Manager Dashboard</h4>

            <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
            <a href="{{ url('/admin/roles') }}" class="btn btn-primary">Roles</a>
        </div>
    </div>
@endsection