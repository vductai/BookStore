@extends('layout.client.index')
@section('content_client')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-4">
                <div class="container">
                    <div class="list-group">
                        <h3 class="list-group-item list-group-item-action active" aria-current="true">
                            Danh mục
                        </h3>
                        @foreach($listCate as $item)
                            <a href="{{route('client.page.bookbycate', $item->id)}}"
                               class="list-group-item list-group-item-action">{{$item->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="ms-5 container">
                    <div class="mb-3">
                        <img src="{{asset('img/banner3.png')}}" width="830px" alt="">
                    </div>
                    @yield('BookByCate')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
