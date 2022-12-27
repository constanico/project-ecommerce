@extends('master')

@section('css')

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
                <li><a href="#" class="nav-link px-2 link-dark">Profile</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="/signin">
                    <button type="button" class="btn btn-outline-primary me-2">Sign Out</button>
                </a>
            </div>
        </header>
    </div>

    <div class="card my-5 mx-auto" style="max-width: 850px;">
        <div class="row g-0">
          <div class="col-md-4 p-4">
            <div class="card shadow-sm" style="width: auto; height: auto;">
                <img src="{{ Storage::url($item->image) }}" class="img-fluid rounded-start" alt="..." style="width:15rem; height: 15rem;">
            </div>
          </div>
          <div class="col-md-8 py-4 pe-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fs-2 fw-bold m-0">{{ $item->name }}</h5>
                    <p class="card-text fs-4">Rp {{ $item->price }}</p>
                    <p class="card-text fw-bold m-0">Product Detail</p>
                    <p class="card-text">{{ $item->desc }}</p>
                    @if (auth()->user()->role=="user")
                    <label for="quantity" class="form-label fw-bold m-0">Quantity :</label>
                    <form action="{{ url('cart') }}/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row py-2">
                                <div class="col p-0 pe-2">
                                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
                                </div>
                                <div class="col p-0">
                                    <button type="submit" class="btn btn-md btn-success">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                    <div class="container">
                        <div class="row py-2">
                            <div class="col-2 p-0">
                                <a href="/home">
                                    <button type="button" class="btn btn-md btn-danger">Back</button>
                                </a>
                            </div>
                            <div class="col p-0">
                                @if (auth()->user()->role=="admin")
                                <div class="col p-0">
                                    <form action="/{{ $item->id }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="button" class="btn btn-md btn-danger">Delete Item</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

@endsection
