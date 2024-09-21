@extends('layouts.app')

@section('content')
    <section class="user-index py-3">
        <div class="container">
            <div class="head">
                <h5 class="fw-bold">User Roles</h3>
            </div>
            <div class="body mt-4 py-2" style="max-width: 500px;">
                <div class="list-group shadow">
                    <div class="list-group-item active">
                        <div class="row">
                            <div class="col-6 col-sm-4">ID</div>
                            <div class="col-6 col-sm-4">Name</div>  
                        </div>
                    </div>

                    @foreach ($roles as $role)
                        <div class="list-group-item py-3 ps-4">
                            <div class="row align-items-center">
                                <div class="col-6 col-sm-4">
                                    {{ $role->id }}
                                </div>
                                <div class="col-6 col-sm-4">
                                    {{ $role->name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </section>
@endsection
