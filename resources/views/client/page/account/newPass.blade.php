@extends('layout.client.index')
@section('content_client')
    <div class="container mt-5 d-flex justify-content-center ">
            <div class="mb-3">
                <div class="text-danger">
                    Mật khẩu mới là : {{$newPass}}
                </div>
                <div>
                    <p class="mt-3 text-center">
                        Quay lại
                        <a href="{{route('client.account.login')}}" class="text-decoration-none">
                            Đăng nhập
                        </a>
                    </p>
                </div>
            </div>
    </div>
@endsection
