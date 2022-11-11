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
                <li><a href="#" class="nav-link px-2 link-dark fw-bold">MAIBOUTIQUE</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Search</a></li>
                <li><a href="#" class="nav-link px-2 link-secondary">Cart</a></li>
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

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">My Cart</h1>
            </div>
        </div>
    </section>

    <div class="d-flex flex-row justify-content-end me-5">
        <div class="p-2">
            <p class="card-text fs-5 fw-bold">Total Price: </p>
        </div>
        <div class="p-2">
            <button type="button" class="btn btn-md btn-primary">Check Out</button>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card shadow-sm p-2">
                        <div class="card shadow-sm" style="height: 250px">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>

                        <div class="card-body">
                            <p class="card-text fs-5 fw-bold m-0">Nama Item</p>
                            <p class="card-text fs-6 m-0">Harga Item</p>
                            <p class="card-text fs-6">Qty: </p>
                            <button type="button" class="btn btn-md btn-primary">Edit Cart</button>
                            <button type="button" class="btn btn-md btn-danger">Remove from Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
