@extends('admin.index')
@section('conten_admin')
    <div class="d-flex justify-content-center align-items-center">
        @foreach($categoryById as $item)
            <form action="{{route('admin.category.update', $item->id)}}" method="post" class="my-5 w-25 bg-white p-5 rounded">
                @csrf
                @method('PUT')
                <h3 class="text-success mb-5 text-center">Sửa danh mục</h3>
                <div class="mb-3">
                    <label class="form-label">Id danh mục</label>
                    <input type="text" class="form-control" value="{{$item->id}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="text" class="form-control" value="{{$item->category_name}}"disabled>
                        <i class="fa-solid fa-right-long mx-2"></i>
                        <input type="text" class="form-control" name="category_name">
                    </div>
                </div>
                @error('category_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="mb-3 d-flex justify-content-center">
                    <a class="form-control btn btn-secondary me-2" href="{{route('admin.category.list')}}">Quay lại</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Sửa
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    Bạn có chắc muốn thay đổi không ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                    <button type="submit" class="btn btn-success">Sửa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
