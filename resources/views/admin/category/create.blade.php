@extends('admin.index')
@section('content_admin')
    <div class="d-flex justify-content-center align-items-center">
        <form action="" method="post" class="my-5 w-50 bg-white p-5 rounded">
            <h3 class="text-success mb-5 text-center">Thêm danh mục</h3>
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" >
            </div>
            <div class="mb-3">
                <button type="submit" class="form-control btn btn-success">Thêm</button>
            </div>
        </form>
    </div>
@endsection
