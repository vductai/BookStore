@extends('admin.index')
@section('conten_admin')

    <div class="d-flex justify-content-center align-items-center">
        @foreach($bookById as $item)
            <form action="{{route('admin.book.update', $item->id_book)}}" method="post"
                  class="my-2 w-100 bg-white p-5 rounded" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3 class="text-success mb-5 text-center">Sửa sách</h3>
                <div class="d-flex justify-content-center">
                    <div class="w-75">
                        <div class="mb-3">
                            <label class="form-label">Tên sách</label>
                            <input type="text" class="form-control" name="name" placeholder="{{$item->book_name}}">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="desc" id="desc" style="resize: none" cols="100" rows="20">{{$item->desc}}</textarea>
                            {{--                            @error('desc')--}}
                            {{--                            <p class="text-danger">{{$message}}</p>--}}
                            {{--                            @enderror--}}
                        </div>
                        <script !src="">
                            $('#desc').summernote({
                                tabsize: 2,
                                height: 414,
                                minHeight:414,
                                maxHeight:414,
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['fontsize', ['fontsize']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['table', ['table']],
                                    ['insert', ['link', 'picture', 'video']],
                                    ['view', ['fullscreen', 'codeview', 'help', 'height']]
                                ]
                            })
                        </script>
                    </div>
                    <div class="mx-3">

                        <div class="mb-3">
                            <label class="form-label">Ảnh sách</label>
                            <input type="file" class="form-control" name="imgPost" placeholder="{{$item->image}}">
                            @error('img')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá sách</label>
                            <div class="d-flex justify-content-center border rounded">
                                <input type="text" id="format" class="form-control border-0" name="price">
                                <input type="text" class="w-25 bg-white form-control border-0" value="đ" disabled>
                            </div>
                            @error('price')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục</label>
                            <input type="text" class="form-control" value="{{$item->category_name}}" disabled>
                            <i class="fa-solid fa-down-long my-3" style="margin-left: 180px"></i>
                            <select class="form-select" name="category" size="5" aria-label="Size 5 select example">
                                @foreach($listCategory as $items)
                                    <option value="{{$items->id}}">{{$items->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mb-3 d-flex justify-content-center mt-5">
                    <a class="form-control me-2 btn btn-secondary" href="{{route('admin.book.list')}}">Quay lại</a>
                    <button type="submit" class="form-control btn btn-success">Sửa</button>
                </div>
            </form>
        @endforeach
    </div>

@endsection

