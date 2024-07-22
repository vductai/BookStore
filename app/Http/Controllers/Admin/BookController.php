<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
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
                "img" => 'required|mimes:png,jpg',
                "desc" => 'required|min:10',
                "price" => 'required|min:4',
                "category" => 'required',
            ],
            [
                "name.required" => "Không được để trống",
                "name.regex" => "Tên sách không được chứa kí tự đặc biệt",
                "name.min" => "Tối thiểu :min kí tự",
                "img.required" => "Vui lòng nhập ảnh",
                "img.mimes" => "Định dạng ảnh không hợp lệ",
                "desc.required" => "Không được để trống",
                "desc.min" => "Tối thiểu :min kí tự",
                "price.required" => "Không được để trống",
                //"price.regex" => "Vui lòng nhập đúng định dạng",
                "price.min" => "Tối thiểu :min chữ số",
                "category.required" => "Chưa chọn danh mục",
            ]
        );

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/'), $imageName);
            $request->merge(['image'=>$imageName]);
        } else {
            return back()->with('error', 'Có lỗi xảy ra trong quá trình upload ảnh');
        }


        $data = [
            'book_name' => $request['name'],
            'price' => $request['price'],
            'image' => $imageName,
            'desc' => $request['desc'],
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
                "img" => 'required|mimes:png,jpg',
                "desc" => 'required|min:10',
                "price" => 'required|numeric|min:4',
                "category" => 'required',
            ],
            [
                "name.required" => "Không được để trống",
                "name.regex" => "Tên sách không được chứa kí tự đặc biệt",
                "name.min" => "Tối thiểu :min kí tự",
                "img.required" => "Vui lòng nhập ảnh",
                "img.mimes" => "Định dạng ảnh không hợp lệ",
                "desc.required" => "Không được để trống",
                "desc.min" => "Tối thiểu :min kí tự",
                "price.required" => "Không được để trống",
                "price.numeric" => "Vui lòng nhập đúng định dạng",
                "price.min" => "Tối thiểu :min chữ số",
                "category.required" => "Chưa chọn danh mục",
            ]
        );

        $book = book::findOrFail($id_book);


        if ($request->hasFile('img')) {
            if (File::exists(public_path('upload/'. $book->image))){
                File::delete(public_path('upload/'. $book->image));
            }
            $file = $request->file('img');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload'), $imageName);
            $request->merge(['image'=>$imageName]);

        }
        $data = [
            'book_name' => $request['name'],
            'price' => $request['price'],
            'image'=> $imageName,
            'desc' => $request['desc'],
            'category_id' => $request['category']
        ];

        book::query()
            ->where('id_book', '=', $id_book)
            ->update($data);

        return redirect()->route('admin.book.list');
    }

}
