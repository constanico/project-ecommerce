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
                <li><a href="/home" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="/search" class="nav-link px-2 link-dark">Search</a></li>
                <li><a href="/cart" class="nav-link px-2 link-secondary">Cart</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">History</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Profile</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="/signin">
                    <button type="button" class="btn btn-outline-primary me-2">Sign Out</button>
                </a>
            </div>
        </header>
    </div>

    <section class="text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">My Cart</h1>
            </div>
        </div>
    </section>


    <div class="album py-1 bg-light">
        <div class="container">
            <div class="row">
                <?php $totalPrice = 0; ?>
                @foreach ($cart as $cart)
                <div class="col-3 d-flex justify-content-center mb-2 mt-2">
                    <div class="card" style="width: 14rem; height: auto;">
                        <img src="{{ Storage::url($cart->image) }}" class="card-img-top mt-3 ms-3 me-3" alt="..." style="height:12rem; width:12rem;">
                        <div class="card-body">
                            <p class="card-text fs-5 fw-bold m-0">{{ $cart->itemName }}</p>
                            <p class="card-text fs-6 m-0">{{ $cart->price }}</p>
                            <p class="card-text fs-6">Qty: {{ $cart->quantity }}</p>
                            <button type="button" class="btn btn-md btn-primary">Edit Cart</button>
                            <button type="button" class="btn btn-md btn-danger mt-2">Remove from Cart</button>
                        </div>
                    </div>
                </div>
                <?php $totalPrice = $totalPrice + $cart->price * $cart->quantity ?>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-end me-5 mb-5">
        <div class="p-2">
            <p class="card-text fs-5 fw-bold">Total Price: {{ $totalPrice }}</p>
        </div>
        <div class="p-2">
            <button type="button" class="btn btn-md btn-primary">Check Out</button>
        </div>
    </div>
@endsection
