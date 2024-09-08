@extends('layouts.app')

@section('content')
    <section class="user-index py-3">
        <div class="container">
            <div class="head">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="fw-bold">All Users ({{ $users->count() }})</h3>
                    </div>
                    <div class="col-sm-6 d-flex column-gap-3 justify-content-end">
                        <div class="search">
                            <input class="form-control" type="search" placeholder="Search" style="max-width: 200px;">
                        </div>
                        <a href="{{ route('register') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add User</a>
                    </div>
                </div>
            </div>
            <div class="body mt-4 py-2">
                @if(session('message'))
                    <div class="alert alert-primary alert-dismissible fade show mb-4" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="list-group shadow">
                    <div class="list-group-item active">
                        <div class="row">
                            <div class="col-md-4">Name</div>
                            <div class="col-md-2">Role</div>
                            <div class="col-md-3">Phone Number</div>
                            <div class="col-md-3">Actions</div>
                        </div>
                    </div>

                    @foreach ($users as $user)
                        <div class="list-group-item py-3 ps-4">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="d-flex column-gap-4 align-items-center">
                                        @if($user->avatar)
                                            <img src="{{ '/avatars/'.$user->avatar }}" class="avatar shadow">
                                        @else
                                            <img src="/avatars/user.png" class="avatar shadow">
                                        @endif

                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $user->name }}</h6>
                                            <div class="opacity-75">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h5><span class="badge text-bg-primary"> Manager </span></h5>
                                    
                                </div>
                                <div class="col-md-3">
                                    @if ($user->phone)
                                        {{ $user->phone }}
                                    @else
                                        -
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-success btn-sm" title="View"><i class="bi bi-eye"></i> View</a>
                                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-outline-primary btn-sm ms-2" title="Edit"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <button class="btn btn-danger btn-sm ms-2" title="Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash3"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>

                <div class="mt-4">{{ $users->links() }}</div>
            </div>
        </div>
    </section>
@endsection
