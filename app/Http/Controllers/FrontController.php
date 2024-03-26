<?php

namespace App\Http\Controllers;

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
        $adscategory = Ad::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')->where('is_accepted', true)->take(10)
            ->get();

        return view('categoryShow', compact('category', 'adscategory'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));


        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;

            case 'revisor':
                $user->is_revisor = NULL;
                break;

            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();
        return redirect(route('home'))->with('message', 'Grazie per averci contattato!');
    }
}
