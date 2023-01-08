@extends('master')

@section('css')
    <style>
        html,
        body {
        height: 100%;
        }

        body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        max-width: 330px;
        padding: 15px;
        }

        .form-signin .form-floating:focus-within {
        z-index: 2;
        }

        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')
    <body class="text-center">
        <main class="form-signin w-100 m-auto">
        <form action="{{ route('postsignin') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Sign In</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid
                @enderror" id="floatingInput" placeholder="name@example.com" value="{{ Cookie::get('logincookie') !== null ? Cookie::get('logincookie') : "" }}"
                required value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid
                @enderror" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            @if (session()->has('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" id="remember" checked="{{ Cookie::get('logincookie') !== null }}"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
        <small class="d-block text-center mt-3 text-decoration-none">
            Not Registered yet? <a href="/signup">Register Now</a>
        </small>
        </main>
    </body>
@endsection
