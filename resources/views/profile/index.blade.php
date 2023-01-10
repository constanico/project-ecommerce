@extends('master')

@section('content')
    <div class="container-fluid bg-light">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/home" class="nav-link px-2 link-dark fw-bold">MAIBOUTIQUE</a></li>
                <li><a href="/home" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="/search" class="nav-link px-2 link-dark">Search</a></li>
                @if (auth()->user()->role=="user")
                <li><a href="/cart" class="nav-link px-2 link-dark">Cart</a></li>
                <li><a href="/history" class="nav-link px-2 link-dark">History</a></li>
                @endif
                <li><a href="/profile" class="nav-link px-2 link-secondary">Profile</a></li>
            </ul>

            <div class="d-flex justify-content-end col-md-3 text-end">
                @if (auth()->user()->role=="admin")
                <div class="add-item-btn">
                    <a href="/additem">
                        <button type="button" class="btn btn-outline-primary me-2">Add Item</button>
                    </a>
                </div>
                @endif
                <div class="sign-out-btn">
                    <a href="/signout">
                        <button type="button" class="btn btn-outline-primary">Sign Out</button>
                    </a>
                </div>
            </div>
        </header>
    </div>

    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">My Profile</h1>
        <div class="col-lg-6 mx-auto">
            <button type="button" class="btn btn-secondary mt-2">{{ $user->role }}</button>
            <h5 class="card-title mt-2">username : {{ $user->username }}</h5>
            <p class="card-text m-0">{{ $user->email }}</p>
            <p class="card-text m-0">Address: {{ $user->address }}</p>
            <p class="card-text mb-2">Phone: {{ $user->phone }}</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                @if (auth()->user()->role=="user")
                <a href="{{ route('editprofile') }}">
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Edit Profile</button>
                </a>
                @endif
                <a href="{{ route('editpassword') }}">
                    <button type="button" class="btn btn-outline-primary btn-lg px-4">Edit Password</button>
                </a>
            </div>
        </div>
    </div>
@endsection
