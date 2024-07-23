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
                <th scope="col">Tên danh mục</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listCategory as $item)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$item->category_name}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{route('admin.category.updateview', $item->id)}}" class="btn btn-success me-3">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <div>
                            <!-- Form with Modal -->
                            <form id="deleteForm-{{ $item->id }}" action="{{ route('admin.category.delete', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel-{{ $item->id }}">Xác nhận xoá</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn xoá không?
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
