<?php

namespace App\Http\Controllers;

use app\Models\Category;
use App\Models\Ad;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $ads = Ad::take(10)->get()->sortByDesc('created_at');
        return view('home', compact('ads'));
    }

    public function categoryshow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }
}
