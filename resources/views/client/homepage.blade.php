@extends('layout.client.index')
@section('content_client')
    <div class="mt-2 d-flex justify-content-center">
        <div id="carouselExampleAutoplaying" class="carousel slide w-75 h-25" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('img/banner4.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/banner2.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/banner4.png')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="my-5">
        <div class="container">
            <h2>Sản phẩm mới nhất</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
                @foreach($listBook as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('img/book/book2.png')}}" class="card-img-top w-75 container mt-4 bookimg"
                                 alt="...">
                            <div class="card-body mt-4">
                                <a href="{{route('client.page.detail', $item->id_book)}}" class="card-title fs-5 text-decoration-none">{{$item->book_name}}</a>
                                <p class="card-text mt-3 fs-5"><b>{{$item->price}}đ</b></p>
                                <a class="icon-link icon-link-hover"
                                   style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); text-decoration: none; font-size: 30px"
                                   href="#">
                                    <i class="fa-solid fa-cart-shopping bi"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="h-100 w-75 card container bg-white my-5"></div>
    <div class="my-5">
        <div class="container">
            <h2>Truyện tranh</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
                @foreach($listBookKinhDoanh as $kd)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('img/book/book2.png')}}" class="card-img-top w-75 container mt-4 bookimg"
                                 alt="...">
                            <div class="card-body mt-4">
                                <a href="{{route('client.page.detail', $kd->id_book)}}" class="card-title fs-5 text-decoration-none">{{$kd->book_name}}</a>
                                <p class="card-text mt-3 fs-5"><b>{{$kd->price}}</b></p>
                                <a class="icon-link icon-link-hover"
                                   style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); text-decoration: none; font-size: 30px"
                                   href="#">
                                    <i class="fa-solid fa-cart-shopping bi"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
