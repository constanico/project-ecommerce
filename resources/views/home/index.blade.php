@extends('master')

@section('content')
    <div class="container-fluid bg-light">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/home" class="nav-link px-2 link-dark fw-bold">MAIBOUTIQUE</a></li>
                <li><a href="/home" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="/search" class="nav-link px-2 link-dark">Search</a></li>
                @if (auth()->user()->role=="user")
                <li><a href="/cart" class="nav-link px-2 link-dark">Cart</a></li>
                <li><a href="/history" class="nav-link px-2 link-dark">History</a></li>
                @endif
                <li><a href="/profile" class="nav-link px-2 link-dark">Profile</a></li>
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

    <section class="py-2 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Find Your Best Clothes Here!</h1>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @foreach ($item as $i)
            <div class="col-3 d-flex justify-content-center mb-3 mt-2">
                <div class="card" style="width: 14rem; height: auto;">
                    <img src="{{ Storage::url($i->image) }}" class="card-img-top mt-3 ms-3 me-3" alt="" style="height:12rem; width:12rem;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $i->name }}</h5>
                        <p class="card-text">Rp {{ $i->price }}</p>
                        <a href="/home/{{ $i->id }}" class="btn btn-primary mt-auto">More Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            {{ $item->links() }}
        </div>
    </div>
@endsection
