<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Ad;
use app\Models\Category;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }

    public function home()
    {
        $ads = Ad::orderBy('created_at', 'desc')->where('is_accepted', true)->take(10)->get();
        return view('home', compact('ads'));
    }

    public function categoryShow(Category $category)
    {
        $ads = Ad::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')->where('is_accepted', true)->take(10)
            ->get();

        return view('categoryShow', compact('category', 'ads'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {
        $request->validate([


            'message' => 'required',
        ]);

        $user = Auth::user();

        $email = $request->email;
        $message = $request->message;

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('message')));




        $user->update();
        return redirect(route('home'))->with('message', 'Grazie per averci contattato!');
    }

    public function makeRevisor1(Request $request)
    {
        $user = $request->user();

        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }

    public function searchAds(Request $request)
    {
        $ads = Ad::search($request->searched)->where('is_accepted', true)->get();
        return view('ads.index', compact('ads'));
    }
}
