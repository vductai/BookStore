<?php

namespace App\Http\Controllers;
use App\Models\book;
use App\Models\category;

class BookController extends Controller
{
    public function index()
    {
        $listBook = book::query()
            ->orderBy('id_book', 'asc')
            ->limit(4)
            ->get();
        // lay danh muc kinh doanh
        $listBookKinhDoanh = book::query()
            ->where('category_id', '=', 1)
            ->limit(4)
            ->get();
        $listcate = category::query()
            ->where('id', '=', 1)
            ->get();
        return view('client.homepage', compact('listBook', 'listcate', 'listBookKinhDoanh'));
    }

    public function detail($id){
        $detailBook = book::query()
            ->where('id_book', '=', $id)
            ->get();
        return view('client.page.book.detail', compact('detailBook'));
    }


    public function selBookByCate($id){
        $listCate = category::all();

        $listCateId = category::query()
            ->where('id', '=', $id)
            ->get();
        $listBookByCate = book::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('*')
            ->where('category_id', '=', $id)
            ->get();

        return view('client.page.book.bookPageByCate',
            compact('listBookByCate', 'listCate', 'listCateId'));
    }
}
