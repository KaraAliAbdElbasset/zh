<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-LPvXVVAlyPoBSGkX8UddpctDks+1P4HG8MhT7/YwqHtJ40bstjzCqjj+VVVDhsCo" crossorigin="anonymous">

    <style>
        body {
            background: linear-gradient (rgba(255,255,255,.5),rgba(255,255,255,.5));
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        .login {
            height: 100vh;
        }
        input[type="email"]:-moz-placeholder {
            text-align: right;
        }
        input[type="email"]:-ms-input-placeholder {
            text-align: right;
        }
        input[type="email"]::-webkit-input-placeholder {
            text-align: right;
        }
    </style>

    <title>مرحبا بالعالم!</title>
</head>
<body>


<div class="login d-flex align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-0">
                    <div class="card-body px-4 py-5">
                        <div class="form-row justify-content-center">
                            <div class="col-12 text-center">
                                <img src="{{asset('assets/img/logo.jpeg')}}" alt="logo" height="120">
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->
</body>
</html>
