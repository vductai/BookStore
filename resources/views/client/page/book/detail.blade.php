@extends('layout.client.index')
@section('content_client')
    @foreach($detailBook as $item)
        <div class="container mt-3">
            <div class="row">
                <div class="col-4 bg-white border-end rounded-start-2 d-flex justify-content-center py-3">
                    <div class="w-75 h-auto">
                        <img src="{{asset('upload/'. $item->image)}}" height="330" alt="">
                    </div>
                </div>
                <div class="col-8 bg-white rounded-end-2">
                    <div class="row ps-5">
                        <div class="col-8">
                            <div class="py-3">
                                <h2>{{$item->book_name}}</h2>
                                <div class="d-flex justify-content-start">
                                    <p class="me-3 ">Mã sản phẩm:</p>
                                    <p class="text-success pe-3 border-end">{{$item->id_book}}</p>
                                    <p class="mx-3">Thương hiệu:</p>
                                    <p class="text-success">XYZ</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <p class="me-5">Giá:</p>
                                <h2>{{$item->price}}</h2>
                            </div>
                            <div class="mt-3 d-flex justify-content-start align-content-center">
                                <p class="me-5">Số lượng:</p>
                                <div class="" style="width: 170px; height: 34px">
                                    <button class="border border-1 bg-white" id="tru">
                                        <i class="fa-solid fa-minus p-2"></i>
                                    </button>
                                    <input type="text" name="" class="w-50 text-center border-0 bg-white" id="soluong">
                                    <button class="border border-1 bg-white" id="cong">
                                        <i class="fa-solid fa-plus p-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-5 d-flex justify-content-start align-content-center">
                                <a href="#" class="btn btn-success ms-5 py-3 px-5">
                                    Mua ngay
                                </a>
                            </div>
                            <div class="mt-5 d-flex justify-content-start align-center-center">
                                <p class="me-3">Chia sẻ:</p>
                                <div class="">
                                    <i class="fs-3 fa-brands fa-facebook" style="color: #2d31b9;"></i>
                                    <i class="fs-3 mx-2 fa-brands fa-facebook-messenger" style="color: #2d31b9;"></i>
                                    <i class="fs-3 fa-brands fa-twitter" style="color: #74C0FC;"></i>
                                    <i class="fs-3 mx-2 fa-brands fa-tiktok"></i>
                                    <i class="fs-3 fa-brands fa-telegram" style="color: #74C0FC;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <div class="border">
                                <div class="p-3">
                                    <p class="fs-6 text-success">Chính sách bảo hành</p>
                                    <ul class="list-unstyled">
                                        <li class="fw-light"><i class=" fs-5 fa-solid fa-box"></i> Đảm bảo chất lượng
                                        </li>
                                        <li class="fw-light"><i class=" fs-5 my-3 fa-solid fa-truck-fast"></i> Miễn phí
                                            giao hàng
                                        </li>
                                        <li class="fw-light"><i class=" fs-5 fa-solid fa-phone"></i> Đổi trả 7 ngày</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3 bg-white ">
            <h3 class="border-bottom pt-3 ps-2">Mô tả sản phẩm</h3>
            <pre class="fs-6" style="word-wrap: break-word; white-space: pre-wrap">{!!  $item->desc !!}</pre>
        </div>
    @endforeach
    <div class="container bg-white mb-3 pb-2">
        <div class="my-5">
            <div class="container">
                <h2 class="pt-3">Sản phẩm liên quan</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('img/book/book2.png')}}" class="card-img-top w-75 container mt-4 bookimg"
                                 alt="...">
                            <div class="card-body mt-4">
                                <a href="" class="card-title fs-5 text-decoration-none">Date A Line 5</a>
                                <p class="card-text mt-3 fs-5"><b>50.000đ</b></p>
                                <a class="icon-link icon-link-hover"
                                   style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); text-decoration: none; font-size: 30px"
                                   href="#">
                                    <i class="fa-solid fa-cart-shopping bi"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('img/book/book2.png')}}" class="card-img-top w-75 container mt-4 bookimg"
                                 alt="...">
                            <div class="card-body mt-4">
                                <a href="" class="card-title fs-5 text-decoration-none">Date A Line 5</a>
                                <p class="card-text mt-3 fs-5"><b>50.000đ</b></p>
                                <a class="icon-link icon-link-hover"
                                   style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); text-decoration: none; font-size: 30px"
                                   href="#">
                                    <i class="fa-solid fa-cart-shopping bi"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('img/book/book2.png')}}" class="card-img-top w-75 container mt-4 bookimg"
                                 alt="...">
                            <div class="card-body mt-4">
                                <a href="" class="card-title fs-5 text-decoration-none">Date A Line 5</a>
                                <p class="card-text mt-3 fs-5"><b>50.000đ</b></p>
                                <a class="icon-link icon-link-hover"
                                   style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); text-decoration: none; font-size: 30px"
                                   href="#">
                                    <i class="fa-solid fa-cart-shopping bi"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('img/book/book2.png')}}" class="card-img-top w-75 container mt-4 bookimg"
                                 alt="...">
                            <div class="card-body mt-4">
                                <a href="" class="card-title fs-5 text-decoration-none">Date A Line 5</a>
                                <p class="card-text mt-3 fs-5"><b>50.000đ</b></p>
                                <a class="icon-link icon-link-hover"
                                   style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); text-decoration: none; font-size: 30px"
                                   href="#">
                                    <i class="fa-solid fa-cart-shopping bi"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
