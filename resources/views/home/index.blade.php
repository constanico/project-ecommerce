@extends('master')

@section('css')
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid bg-light">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/home" class="nav-link px-2 link-dark fw-bold">MAIBOUTIQUE</a></li>
                <li><a href="/home" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Search</a></li>
                @if (auth()->user()->role=="user")
                <li><a href="/cart" class="nav-link px-2 link-dark">Cart</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">History</a></li>
                @endif
                <li><a href="#" class="nav-link px-2 link-dark">Profile</a></li>
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

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Find Your Best Clothes Here!</h1>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @foreach ($item as $i)
            <div class="col-2 d-flex justify-content-center mb-3 mt-2">
                <div class="card" style="width: 14rem; height: 32rem;">
                    <img src="{{ Storage::url($i->image) }}" class="card-img-top" alt="..." style="height:18rem; width:auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $i->name }}</h5>
                        <p class="card-text">{{ $i->price }}</p>
                        <a href="" class="btn btn-primary">More Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
