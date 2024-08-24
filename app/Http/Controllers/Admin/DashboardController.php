<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\User;
use App\Models\category;
use App\Models\Role;

class DashboardController extends Controller
{
    public function count()
    {
        $countBook = book::Query()->count();
        $countUser = User::count();
        $countCategory = category::count();
        $countByCategory = category::withCount('books')->get();
        $categoryName = $countByCategory->pluck('category_name');
        $bookCount = $countByCategory->pluck('books_count');
        return view('admin.page.dashboard',
            compact(
                [
                    'countBook',
                    'countCategory',
                    'countUser',
                    'categoryName',
                    'bookCount'
                ]
            )
        );
    }

}
