@extends('layouts.app')

@section('content')
    <div class="container user-edit">
        <h4 class="fw-bold mb-5 pb-3 border-bottom">Edit User Profile</h4>
        <div class="row justify-content-center">
            <div class="col">
                <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <label for="avatar-edit" class="col-md-3 col-form-label">Profile Image</label>
                        <div class="col-md-7">
                            <div class="bg-white p-4 rounded-3 border-0 shadow-sm overflow-hidden d-flex align-items-center column-gap-4">
                                <input id="avatar-edit" type="file" class="form-control d-none" name="avatar">
                                @if($user->avatar)
                                    <img src="/avatars/{{ $user->avatar }}" class="img-fluid avatar shadow" id="preview-avatar">
                                @else
                                    <img src="/avatars/user.png" class="img-fluid avatar shadow" id="preview-avatar">
                                @endif
                                <div class="right">
                                    <h5><b>Upload a profile image</b></h5>
                                    <p class="opacity-75 small">SVG, PNG, JPG or GIF (square size. 1:1)</p>
                                    <button class="btn btn-primary mt-1" id="avatar-edit-btn" type="button">Choose Image</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="name" class="col-md-3 col-form-label">{{ __('Name') }}</label>

                        <div class="col-md-7">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white" id="addon-wrapping"><i class="bi bi-person-bounding-box"></i></span>
                                <input id="name" type="text" class="form-control bg-white @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}" required autofocus>
                            </div>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="email" class="col-md-3 col-form-label">{{ __('Email Address') }}</label>

                        <div class="col-md-7">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white" id="addon-wrapping"><i class="bi bi-envelope-at"></i></span>
                                <input id="email" type="email" class="form-control bg-white @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email">
                            </div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="phone" class="col-md-3 col-form-label">{{ __('Phone Number') }}</label>

                        <div class="col-md-7">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white" id="addon-wrapping"><i class="bi bi-telephone-plus"></i></span>
                                <input id="phone" type="text" class="form-control bg-white @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone ?? old('phone') }}" autocomplete="phone">
                            </div>
                            
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-success">
                                Update Profile 
                                {{-- <i class="bi bi-check-circle ms-1"></i> --}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection