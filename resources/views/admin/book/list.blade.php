@extends('admin.index')
@section('conten_admin')
    <div class="container mt-5">
        <div class="">
            <h3 class="text-success">Danh sách danh mục</h3>
        </div>
        <table class="table mt-3 text-center">
            <thead class="table-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Giá</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody >
            @foreach($listBook as $item)
                <tr >
                    <th scope="row">{{$item->id_book}}</th>
                    <td><img src="{{asset('upload/'. $item->image)}}" width="50" height="50" alt=""></td>
                    <td>{{$item->book_name}}</td>
                    <td>{{$item->price}} đ</td>
                    <td>{{$item->category_name}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('admin.book.updateview', $item->id_book)}}" class="btn btn-success me-3">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form  action="{{route('admin.book.delete', $item->id_book)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn xoá không ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
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
