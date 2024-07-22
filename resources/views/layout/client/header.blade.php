<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('css/layout.client.css')}}">
    <script src="{{asset('js/layout.client.js')}}"></script>
    <title>Document</title>
</head>
<body class="bg-body-secondary">

<header class="d-flex justify-content-center align-items-center bg-warning-subtle text-center p-2">
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/Remove-logo.png')}}" width="30" height="24">
            </a>
        </div>
    </nav>
    <ul class="nav justify-content-center mx-5">
        <li class="nav-item">
            <a class="nav-link fs-5" href="{{route('client.page.home')}}">Trang chủ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fs-5" href="{{route('client.page.bookbycate', 1)}}">Sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fs-5" href="{{route('admin.index')}}">Giới thiệu</a>
        </li>
    </ul>
    <nav class="navbar mx-5">
        <div class="container-fluid">
            <form class="d-flex border bg-white rounded" role="search">
                <input class="form-control me-2 border-0" type="search" placeholder="Search" aria-label="Search">
                <button type="submit" class="border-0 bg-white mx-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </nav>
    <ul class="nav justify-content-center mx-5">
        <li class="nav-item">
            <a class="nav-link fs-5" href="{{route('client.account.login')}}">Đăng nhập</a>
        </li>
    </ul>
</header>



