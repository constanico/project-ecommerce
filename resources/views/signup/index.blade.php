<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>MaiBoutique</title>
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

        .form-signup {
        max-width: 330px;
        padding: 15px;
        }

        .form-signup .form-floating:focus-within {
        z-index: 2;
        }

        .form-signup input[name="username"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signup input[name="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

        .form-signup input[name="password"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

        .form-signup input[name="number"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

        .form-signup input[name="address"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

    </style>
</head>

<body class="text-center">
    <main class="form-signup w-100 m-auto">
    <form>
        @csrf
        <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

        <div class="form-floating">
        <input type="text" name="username" class="form-control" id="username" placeholder="(5-20 letters)">
        <label for="username">Username</label>
        </div>
        <div class="form-floating">
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        <label for="email">Email</label>
        </div>
        <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="(5-20 letters)">
        <label for="password">Password</label>
        </div>
        <div class="form-floating">
        <input type="number" name="number" class="form-control" id="number" placeholder="(10-13 numbers)">
        <label for="number">Phone Number</label>
        </div>
        <div class="form-floating">
        <input type="text" name="address" class="form-control" id="address" placeholder="(min 5 letters)">
        <label for="address">Address</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
    </form>
    <small class="d-block text-center mt-3 text-decoration-none">
        Already Registered? <a href="/signin">Sign In here</a>
    </small>
    </main>
</body>

</html>
