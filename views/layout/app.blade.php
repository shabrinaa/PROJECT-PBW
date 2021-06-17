<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Print Out</title>
    <style>
        .bg-main-color {
            background-color: #FFCE6D !important;
        }

        .text-custom {
            color: #FFAA01;
        }

        .btn-custom {
            background: #FFAA01;
            border-radius: 15px;
            color: white;
            font-size: 20px;
            filter: drop-shadow(0 0 0 rgba(0, 0, 0, 0.25));
            transition: .3s;
        }

        .btn-custom:hover {
            background: #E0EC95;
            color: white;
            filter: drop-shadow(10px 10px 10px rgba(0, 0, 0, 0.25));
        }

        .form-custom {
            background: #FFAA01;
            border-radius: 15px;
            height: 50px;
        }

        .form-custom:focus {
            background-color: #FFAA01;
        }

        .circle {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            background: white;
            background-size: cover;
        }

    </style>
</head>

<body style="height: 100vh; width: 100%; overflow: hidden">
    <nav class="navbar navbar-expand-lg navbar-light bg-main-color fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" style="color:#FFF6A5" href="/">PRINT-OUT</a>
            <span class="navbar-text me-auto">
                Simple, Easy and Efficient!
            </span>
            @auth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link">{{ auth()->user()->name }}</a>
                        </li>
                    </ul>
                </div>
                <div class="circle" style="background-image: url({{ asset('image/' . auth()->user()->profile_pics) }})">
                </div>
            @endauth
        </div>
    </nav>

    @yield('content')


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
