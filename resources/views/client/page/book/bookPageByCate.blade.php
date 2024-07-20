@extends('client.page.book.bookpage')
@section('BookByCate')
    @foreach($listCateId as $itembook)
        <h2>{{$itembook->category_name}}</h2>
    @endforeach

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($listBookByCate as $itemBook)
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('img/book/book2.png')}}"
                         class="card-img-top w-75 container mt-4 bookimg"
                         alt="...">
                    <div class="card-body mt-4">
                        <a href="" class="card-title fs-5 text-decoration-none">{{$itemBook->book_name}}</a>
                        <p class="card-text mt-3 fs-5"><b>{{$itemBook->price}}</b></p>
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
@endsection
