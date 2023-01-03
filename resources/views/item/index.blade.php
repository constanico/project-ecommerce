@extends('master')

@section('css')
<style>
    .form-add-item {
    max-width: 330px;
    padding: 15px;
    }

    .form-add-item .form-floating:focus-within {
    z-index: 2;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid bg-light">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/home" class="nav-link px-2 link-dark fw-bold">MAIBOUTIQUE</a></li>
                <li><a href="/home" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="/search" class="nav-link px-2 link-dark">Search</a></li>
                @if (auth()->user()->role=="user")
                <li><a href="/cart" class="nav-link px-2 link-dark">Cart</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">History</a></li>
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

    <main class="form-add-item w-100 m-auto mt-4">
        <form action="{{ route('additem') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Add Item</h1>
            <div class="form-group mb-3">
                <label for="clothesimage">Clothes Image</label>
                <input name="image" type="file" class="form-control-file @error('image') is-invalid
                @enderror" id="exampleFormControlFile1">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="clothesname">Clothes Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid
                @enderror" id="clothesname" placeholder="(5-20 letters)" required autofocus value ="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="clothesdesc">Clothes Desc</label>
                <input name="desc" type="text" class="form-control @error('name') is-invalid
                @enderror" id="clothesdesc" placeholder="(min 5 letters)" required value ="{{ old('desc') }}">
                @error('desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="clothesprice">Clothes Price</label>
                <input name="price" type="number" class="form-control @error('name') is-invalid
                @enderror" id="clothesprice" placeholder=">= 1000" required value ="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="clothesstock">Clothes Stock</label>
                <input name="stock" type="number" class="form-control @error('name') is-invalid
                @enderror" id="clothesstock" placeholder=">= 1" required value ="{{ old('stock') }}">
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-danger" type="submit">Add</button>
        </form>
    </main>
@endsection

