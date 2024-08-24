@extends('admin.index')
@section('conten_admin')
    <div class="container">
        <div class="container mt-5 d-flex justify-content-center ">
            <form class="my-5 w-50 bg-white p-5 rounded " method="post" action="{{route('admin.user.create')}}">
                <h3 class="text-success mb-5 text-center">Đăng kí</h3>
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                    @error('username')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
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
                    <button type="submit" class="form-control btn btn-success">Đăng kí</button>
                </div>
            </form>
        </div>
    </div>
@endsection
