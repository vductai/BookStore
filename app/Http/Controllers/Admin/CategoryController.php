<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
//        $request->validate(
//            [
//                'category_name' => 'required|regex:/^[\pL\s\d]+$/u'
//            ],
//            [
//                "category_name.required" => "Không được để trống",
//                "category_name.regex" => "Không được chứa kí tự đặc biệt"
//            ]
//        );
        $data = [
            'category_name' => $request['category_name']
        ];
        category::query()->insert($data);
        return redirect()->route('admin.category.list');
    }

    public function listCategory()
    {
        $listCategory = category::all();
        return view('admin.category.list', compact('listCategory'));
    }

    public function deleteCategory($id)
    {
        category::query()
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('admin.category.list');
    }

    public function updateView($id)
    {
        $categoryById = category::query()
            ->where('id', '=', $id)
            ->get();
        return view('admin.category.update', compact('categoryById'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate(
            [
                'category_name' => 'required|regex:/^[\pL\s\d]+$/u'
            ],
            [
                "category_name.required" => "Không được để trống",
                "category_name.regex" => "Không được chứa kí tự đặc biệt"
            ]
        );
        $data = [
            'category_name' => $request['category_name']
        ];

        category::query()
            ->where('id', '=', $id)
            ->update($data);

        return redirect()->route('admin.category.list');
    }
}
