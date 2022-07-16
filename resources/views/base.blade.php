<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta')">

    <title>Homepage</title>
    <link rel="shortcut icon" href="images/book-logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @yield('style')

</head>
<body style="background-image: linear-gradient(to right, #d8f5fd , #99c3ca);">

    <div class="mb-4">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand mx-3" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" width="60" height="60" alt="homepage logo" style="object-fit: cover; border-radius: 50%;">
            </a>
            <a href="/nova" type="button" class="text-end btn btn-dark mx-3">Dashboard</a>
        </nav>
    </div>

    @yield('main')


    <div class="text-light bg-dark">
        <div class="container">
            <div class="row">            
                <div class="col-sm-5 col-md-4 col-lg-3 my-3">
                    <p class="my-0">contact info:</p>
                    <p class="my-0">Email: test@test.com</p>
                    <p class="my-0">Phone: +963 963 991 198</p>
                </div>
                <div class="col-sm-2 col-md-4 col-lg-6"></div>
                <div class="col-sm-5 col-md-4 col-lg-3 my-3">
                    <p class="my-0">Address:</p>
                    <p class="my-0">Test road, City, Country</p>
                </div>
            </div>
            <div class="row justify-content-center">
                2022 All rights reserved
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>