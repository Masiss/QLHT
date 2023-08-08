<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Educationmanagenment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Cabin Sketch">
    <link rel="stylesheet" href="{{asset('css/site.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    @vite('resources/css/app.css')

</head>
<style>
    body {
        font-family: 'Cabin Sketch', cursive;
    }

    .nav-item {
        color: black;
    }
</style>
<body>
<header>
    <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">Education Management</a>
            <div class="flex d-sm-inline-flex w-100">
                @auth('guardian')
                    @include('layout.sm_nav_guardian')
                @endauth
                @auth('child')
                    @include('layout.sm_nav_child')
                @endauth
                @guest('guardian')
                    @guest('child')
                        <a class="align-self-center" href="{{route('login')}}">Đăng nhập</a>
                    @endguest
                @endguest
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <main role="main" class="pb-3">
        @yield('content')
    </main>
</div>

<footer class="border-top footer text-muted">
    <div class="container">
        &copy; 2023 - Educationmanagenment
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"
        integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
@stack('js')
</body>
</html>
