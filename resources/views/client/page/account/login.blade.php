@extends('layout.client.index')
@section('content_client')
    <div class="container mt-5 d-flex justify-content-center ">
        <form class="my-5 w-50 bg-white p-5 rounded " action="{{route('client.account.login')}}" method="post">
            <h3 class="text-success mb-5 text-center">Đăng nhập</h3>
            @if(session('errorLogin'))
                <div class="alert alert-danger" role="alert">
                    {{session('errorLogin')}}
                </div>
            @endif
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" >
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name="password" >
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="form-control btn btn-success">Đăng nhập</button>
                <div>
                    <p class="mt-3 text-center border-bottom border-dark-subtle pb-2">
                        <a href="{{route('client.account.forgotpassword')}}" class="text-decoration-none">
                            Quên mật khẩu?
                        </a>
                    </p>
                    <p class="mt-3 text-center">
                        Bạn chưa có tài khoản?
                        <a href="{{route('client.account.register-view')}}" class="text-decoration-none">
                            Đăng kí
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection

