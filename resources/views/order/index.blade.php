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
                <li><a href="/history" class="nav-link px-2 link-secondary">History</a></li>
                @endif
                <li><a href="/profile" class="nav-link px-2 link-dark">Profile</a></li>
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

    <section class="py-2 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Check What You've Bought!</h1>
            </div>
        </div>
    </section>

    @foreach ($orders as $orders)
    <main class="container mb-4">
        <div class="bg-secondary text-white p-5 rounded">
            <p class="mb-2 fs-4 fw-semibold">{{ ($orders->created_at)->format('Y M d') }}</p>
            <p class="m-0 fs-4 fw-semibold">Total Price Rp {{ $orders->totalPrice }}</p>
        </div>
    </main>
    @endforeach
    @foreach ($detail as $detail)
    <div class="container">
        <div class="row align-items-start">
            <div class="col-3">
                <p class="mb-2">• {{ $detail->quantity }}pc(s) {{ $detail->name }}</p>
            </div>
            <div class="col">
                <p>Rp {{ $detail->price }}</p>
            </div>
        </div>
    </div>
    @endforeach

@endsection
