@extends('layouts.app')

@section('content')
    <section class="user-index py-3">
        <div class="container">
            <div class="head">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="fw-bold">All Users (125)</h3>
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
                <div class="list-group mb-4">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">Name</div>
                            <div class="col-md-2">Role</div>
                            <div class="col-md-3">Phone Number</div>
                            <div class="col-md-3">Actions</div>
                        </div>
                    </div>

                    @foreach ($users as $user)
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="d-flex column-gap-3">
                                        <div class="photo">Photo</div>
                                        <div>
                                            <h6 class="fw-bold">{{ $user->name }}</h6>
                                            <div class="opacity-75">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h5><span class="badge text-bg-primary"> Manager </span></h5>
                                    
                                </div>
                                <div class="col-md-3">
                                    09454239493, 093432433223
                                </div>
                                <div class="col-md-3 d-flex column-gap-2">
                                    <a href="#" class="btn btn-success btn-sm" title="View"><i class="bi bi-eye"></i> View</a>
                                    <a href="#" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash3"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </section>
@endsection
