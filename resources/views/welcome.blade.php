@extends('master')

@section('css')
    <style>
        #intro {
            background-image: url('{{ asset('images/cover.jpg') }}');
            height: 100%;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid bg-light d-block position-absolute">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-around py-3">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-dark fw-bold">MAIBOUTIQUE</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="/signin">
                    <button type="button" class="btn btn-outline-primary me-2">Sign In</button>
                </a>
            </div>
        </header>
    </div>

    <div id="intro">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="container d-flex flex-wrap align-items-center justify-content-center text-center p-3 mx-auto flex-column text-light mh-100" style="height: 100vh;">
                <main class="px-3">
                <h1>Welcome to MaiBoutique</h1>
                <p class="lead">Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</p>
                <p class="lead">
                    <a href="/signup">
                        <button type="button" class="btn btn-primary">Sign Up</button>
                    </a>
                </p>
                </main>
            </div>
        </div>
    </div>
@endsection
