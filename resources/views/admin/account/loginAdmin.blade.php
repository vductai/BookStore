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
    <title>Document</title>
</head>
<body class="bg-secondary">
<div class="container mt-5 d-flex justify-content-center ">
    <form class="my-5 w-50 bg-white p-5 rounded " action="{{route('login-admin')}}" method="post">
        <h3 class="text-success mb-5 text-center">Đăng nhập Admin</h3>
        @if(session('errorLogin'))
            <div class="alert alert-danger" role="alert">
                {{session('errorLogin')}}
            </div>
        @endif
        @if(session('errorLoginAdmin'))
            <div class="alert alert-danger" role="alert">
                {{session('errorLoginAdmin')}}
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
            @error('email')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password">
            @error('password')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="form-control btn btn-success">Đăng nhập</button>
            <div>
                <p class="mt-3 text-center border-bottom border-dark-subtle pb-2">
                    <a href="{{route('client.page.home')}}" class="text-decoration-none">
                        Quay lại
                    </a>
                </p>
{{--                <p class="mt-3 text-center border-bottom border-dark-subtle pb-2">--}}
{{--                    <a href="{{route('client.account.forgotpassword')}}" class="text-decoration-none">--}}
{{--                        Quên mật khẩu?--}}
{{--                    </a>--}}
{{--                </p>--}}
{{--                <p class="mt-3 text-center">--}}
{{--                    Bạn chưa có tài khoản?--}}
{{--                    <a href="{{route('client.account.register-view')}}" class="text-decoration-none">--}}
{{--                        Đăng kí--}}
{{--                    </a>--}}
{{--                </p>--}}
            </div>
        </div>
    </form>
</div>
</body>
</html>

