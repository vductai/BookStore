@extends('admin.index')
@section('conten_admin')
    <div class="container mt-5">
        <div class="">
            <h3 class="text-success">Danh sách user</h3>
        </div>
        @if(session('successCreate'))
            <div class="alert alert-danger" role="alert">{{session('successCreate')}}</div>
        @endif
        @if(session('successUpdate'))
            <div class="alert alert-danger" role="alert">{{session('successUpdate')}}</div>
        @endif
        @if(session('successDelete'))
            <div class="alert alert-danger" role="alert">{{session('successDelete')}}</div>
        @endif
        <table class="table mt-3 text-center">
            <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">vai trò</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listUser as $item)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$item->username}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->role->name_role}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{route('admin.user.update-view', $item->id_user)}}" class="btn btn-success me-3">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <div>

                            <!-- Form with Modal -->
                            <form id="deleteForm-{{ $item->id_user }}" action="{{route('admin.user.delete', $item->id_user)}}" method="post">
                            @method('DELETE')
                            @csrf
                            @if(auth()->user()->id_user == $item->id_user)
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger d-none" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $item->id_user }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                            @else
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $item->id_user }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                            @endif
                            <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $item->id_user }}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel-{{ $item->id_user }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel-{{ $item->id_user }}">Xác
                                                    nhận xoá</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn xoá không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Thoát
                                                </button>
                                                <button type="submit" class="btn btn-danger">Xoá</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
