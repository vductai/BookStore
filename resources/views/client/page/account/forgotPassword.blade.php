@extends('layout.client.index')
@section('content_client')
<div class="container mt-5 d-flex justify-content-center ">

    <form class="my-5 w-50 bg-white p-5 rounded ">
        <h3 class="text-success mb-5 text-center">Quên mật khẩu</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <button type="submit" class="form-control btn btn-success">Gửi email</button>
            <div>
                <p class="mt-3 text-center">
                    Quay lại
                    <a href="{{route('client.account.login')}}" class="text-decoration-none">
                        Đăng nhập
                    </a>
                </p>
            </div>
        </div>
    </form>
</div>
@endsection