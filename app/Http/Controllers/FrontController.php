<?php

namespace App\Http\Controllers;

use app\Models\Category;
use App\Models\Ad;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $ads = Ad::orderBy('created_at', 'desc')->where('is_accepted', true)->take(10)->get();
        return view('home', compact('ads'));
    }

    public function categoryShow(Category $category)
    {
        $adscategory = Ad::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')->where('is_accepted', true)->take(10)
            ->get();

        return view('categoryShow', compact('category', 'adscategory'));
    }

}
