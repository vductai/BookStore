@extends('admin.index')
@section('conten_admin')
    <div class="d-flex justify-content-center align-items-center">
        <form action="{{route('admin.category.store')}}" method="post" class="my-5 w-25 bg-white p-5 rounded">
            @csrf
            <h3 class="text-success mb-5 text-center">Thêm danh mục</h3>
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="category_name">
            </div>
            @error('category_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="mb-3 d-flex justify-content-center">
                <a class="form-control me-2 btn btn-secondary" href="{{route('admin.category.list')}}">Danh mục</a>
                <button type="submit" class="form-control btn btn-success">Thêm</button>
            </div>
        </form>
    </div>
@endsection
