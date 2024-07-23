<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index()
    {
        $listBook = book::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->get();
        return view('admin.book.list', compact('listBook'));
    }

    public function create()
    {
        $listCategory = category::all();
        return view('admin.book.create', compact('listCategory'));
    }


    public function store(Request $request)
    {
        // |regex:/^\d+$/
        $request->validate(
            [
                "name" => 'required|min:10|regex:/^[\pL\s\d]+$/u',
                "imgPost" => 'required|mimes:png,jpg',
                "price" => 'required|min:4',
                "category" => 'required',
            ],
            [
                "name.required" => "Không được để trống",
                "name.regex" => "Tên sách không được chứa kí tự đặc biệt",
                "name.min" => "Tối thiểu :min kí tự",
                "imgPost.required" => "Vui lòng nhập ảnh",
                "imgPost.mimes" => "Định dạng ảnh không hợp lệ",
                "price.required" => "Không được để trống",
                //"price.regex" => "Vui lòng nhập đúng định dạng",
                "price.min" => "Tối thiểu :min chữ số",
                "category.required" => "Chưa chọn danh mục",
            ]
        );

        if ($request->hasFile('imgPost')) {
            $file = $request->file('imgPost');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/'), $imageName);
            $request->merge(['image' => $imageName]);
        } else {
            return back()->with('error', 'Có lỗi xảy ra trong quá trình upload ảnh');
        }


        $desc = $request['desc'];
        $dom = new DOMDocument();
        $dom->loadHTML($desc, 9);

        $imageDesc = $dom->getElementsByTagName('img');
        foreach ($imageDesc as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $imageDescName = "/upload/" . time() . '.' . $key . 'png';
            file_put_contents(public_path() . $imageDescName, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $imageDescName);
        }

        $desc = $dom->saveHTML();


        $data = [
            'book_name' => $request['name'],
            'price' => $request['price'],
            'image' => $imageName,
            'desc' => $desc,
            'category_id' => $request['category']
        ];

        book::query()->insert($data);

        return redirect()->route('admin.book.list');

    }

    public function deleteBook($id)
    {
        book::query()
            ->where('id_book', '=', $id)
            ->delete();
        return redirect()->route('admin.book.list');
    }

    public function updateView($id)
    {
        $listCategory = category::all();
        $bookById = book::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->where('id_book', '=', $id)
            ->get();
        return view('admin.book.update', compact('bookById', 'listCategory'));
    }

    public function updateBook(Request $request, $id_book)
    {
        // regex:/^\d+$/
        $request->validate(
            [
                "name" => 'required|min:10|regex:/^[\pL\s\d]+$/u',
                "imgPost" => 'required|mimes:png,jpg',
                "price" => 'required|numeric|min:4',
                "category" => 'required',
            ],
            [
                "name.required" => "Không được để trống",
                "name.regex" => "Tên sách không được chứa kí tự đặc biệt",
                "name.min" => "Tối thiểu :min kí tự",
                "imgPost.required" => "Vui lòng nhập ảnh",
                "imgPost.mimes" => "Định dạng ảnh không hợp lệ",
                "price.required" => "Không được để trống",
                "price.numeric" => "Vui lòng nhập đúng định dạng",
                "price.min" => "Tối thiểu :min chữ số",
                "category.required" => "Chưa chọn danh mục",
            ]
        );

        $book = book::findOrFail($id_book);


        $desc = $request['desc'];
        $dom = new DOMDocument();
        $dom->loadHTML($desc, 9);

        $imageDesc = $dom->getElementsByTagName('img');
        foreach ($imageDesc as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') == 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $imageDescName = "/upload/" . time() . '.' . $key . 'png';
                file_put_contents(public_path() . $imageDescName, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $imageDescName);
            }

        }

        $desc = $dom->saveHTML();


        if ($request->hasFile('imgPost')) {
            if (File::exists(public_path('upload/' . $book->image))) {
                File::delete(public_path('upload/' . $book->image));
            }
            $file = $request->file('imgPost');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload'), $imageName);
            $request->merge(['image' => $imageName]);

        }
        $data = [
            'book_name' => $request['name'],
            'price' => $request['price'],
            'image' => $imageName,
            'desc' => $desc,
            'category_id' => $request['category']
        ];

        book::query()
            ->where('id_book', '=', $id_book)
            ->update($data);

        return redirect()->route('admin.book.list');
    }

}
