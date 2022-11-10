<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>MaiBoutique</title>

    <style>
        #intro {
            background-image: url('{{ asset('images/cover.jpg') }}');
            height: 100%;
            background-size: cover;
        }
    </style>

</head>
<body>
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

</body>
</html>
