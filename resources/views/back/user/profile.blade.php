@extends('layouts.app')

@section('content')
    <section class="user-profile py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xxl-3">
                    <div class="card text-bg-primary mb-3 px-1">
                        <div class="card-header text-center py-4">
                            @if($user->avatar)
                                <img src="{{ '/avatars/'.$user->avatar }}" class="img-fluid avatar shadow">
                            @else
                                <img src="/avatars/user.png" class="avatar shadow">
                            @endif
                            <h5 class="mt-3">{{ $user->name }}</h5>
                            <h6 class="opacity-75">Teacher</h6>
                        </div>
                        <div class="card-body">
                            <div class="info d-flex column-gap-2 mb-2">
                                <i class="bi bi-geo-alt"></i>
                                <div>No.123, Yangon, Myanmar.</div>
                            </div>
                            <div class="info d-flex column-gap-2 mb-2">
                                <i class="bi bi-envelope"></i>
                                <div>{{ $user->email }}</div>
                            </div>

                            @if($user->phone)
                            <div class="info d-flex column-gap-2 mb-2">
                                <i class="bi bi-telephone"></i>
                                <div>{{ $user->phone }} </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xxl-9">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum ex distinctio at? Numquam nisi voluptatem velit, quisquam architecto officia dicta consectetur quibusdam ipsa dolor laudantium debitis est at, libero consequuntur.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit soluta libero sit ex eius numquam sunt nihil architecto fugit ad, repudiandae, mollitia debitis doloremque aperiam! Totam exercitationem sint modi eos.
                </div>
            </div>
        </div>
    </section>
@endsection