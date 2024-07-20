@extends('layout.client.index')
@section('content_client')
    <div class="container mt-5 d-flex justify-content-center ">

        <form class="my-5 w-50 bg-white p-5 rounded ">
            <h3 class="text-success mb-5 text-center">Đăng nhập</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
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
                        <a href="{{route('client.account.register')}}" class="text-decoration-none">
                            Đăng kí
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection

