@extends('admin.index')
@section('conten_admin')
    <div class="d-flex justify-content-center">
        @foreach($userId as $item)
            <form action="{{route('admin.user.update', $item->id_user)}}" method="post"
                  class="my-5 w-50 bg-white p-5 rounded">
                @csrf
                @method('PUT')
                <h3 class="text-success mb-5 text-center">Chỉnh sửa người dùng</h3>
                <div class="mb-3">
                    <label class="form-label">Id người dùng</label>
                    <input type="text" class="form-control" value="{{$item->id_user}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên người dùng</label>
                    <input type="text" class="form-control" name="username" placeholder="{{$item->username}}">
                    @error('username')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="{{$item->email}}">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Vai trò</label>
                    <input type="text" class="form-control" value="{{$item->role->name_role}}" disabled>
                    <i class="fa-solid fa-down-long my-3" style="margin-left: 180px"></i>
                    <select class="form-select" name="id_role" size="5" aria-label="Size 5 select example">
                        @foreach($listRole as $items)
                            <option value="{{$items->id_role}}">{{$items->name_role}}</option>
                        @endforeach
                    </select>
                    @error('id_role')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                @error('category_name')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="mb-3 d-flex justify-content-center">
                    <a class="form-control btn btn-secondary me-2" href="{{route('admin.user.list')}}">Quay lại</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="form-control btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        Sửa
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    Bạn có chắc muốn thay đổi không ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát
                                    </button>
                                    <button type="submit" class="btn btn-success">Sửa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- đổi mật khẩu--}}
            <div class="bg-white p-5 rounded my-5 w-50">

                <form action="{{route('admin.user.updatePass', $item->id_user)}}" method="post">
                    @method('PUT')
                    <h3 class="text-success mb-5 text-center">Đổi mật khẩu</h3>
                    @if(session('successPass'))
                        <div class="alert alert-danger" role="alert">{{session('successPass')}}</div>
                    @endif
                    @if(session('errorPass'))
                        <div class="alert alert-danger" role="alert">{{session('errorPass')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nhập mật khẩu củ</label>
                        <input type="password" class="form-control" name="passold">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập mật khẩu mới</label>
                        <input type="password" class="form-control" name="passnew">
                        @error('passnew')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Xác nhận lại mật khẩu</label>
                        <input type="password" class="form-control" name="confirmpassword">
                        @error('confirmpassword')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="form-control btn btn-success">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
@endsection
