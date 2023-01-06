@extends('master')

@section('css')
    <style>
        .form-signup {
        max-width: 330px;
        padding: 15px;
        }

        .form-signup .form-floating:focus-within {
        z-index: 2;
        }

        .form-signup input[name="oldpassword"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signup input[name="newpassword"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid bg-light">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/home" class="nav-link px-2 link-dark fw-bold">MAIBOUTIQUE</a></li>
                <li><a href="/home" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="/search" class="nav-link px-2 link-dark">Search</a></li>
                @if (auth()->user()->role=="user")
                <li><a href="/cart" class="nav-link px-2 link-dark">Cart</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">History</a></li>
                @endif
                <li><a href="/profile" class="nav-link px-2 link-secondary">Profile</a></li>
            </ul>

            <div class="d-flex justify-content-end col-md-3 text-end">
                @if (auth()->user()->role=="admin")
                <div class="add-item-btn">
                    <a href="{{ route('additem') }}">
                        <button type="button" class="btn btn-outline-primary me-2">Add Item</button>
                    </a>
                </div>
                @endif
                <div class="sign-out-btn">
                    <a href="{{ route('signout') }}">
                        <button type="button" class="btn btn-outline-primary">Sign Out</button>
                    </a>
                </div>
            </div>
        </header>
    </div>

    <main class="form-signup w-100 m-auto mt-4">
        <form action="{{ route('editpassword') }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <h1 class="h3 mb-3 fw-normal">Update Password</h1>

            <div class="form-floating">
                <input type="password" name="oldpassword" class="form-control @error('oldpassword') is-invalid
                @enderror" id="oldpassword" placeholder="(5-20 letters)" required value="{{ old('oldpassword') }}">
                <label for="oldpassword">Old Password</label>
                @error('oldpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="newpassword" class="form-control @error('newpassword') is-invalid
                @enderror" id="newpassword" placeholder="(5-20 letters)" required value="{{ old('newpassword') }}">
                <label for="newpassword">New Password</label>
                @error('newpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Save Update</button>
        </form>
        <div class="col-2 pt-2">
            <a href="/home">
                <button type="button" class="btn btn-md btn-danger">Back</button>
            </a>
        </div>
    </main>
@endsection

