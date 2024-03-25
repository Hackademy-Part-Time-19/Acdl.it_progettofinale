<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAd()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated();
        Ad::create(['author' => auth()->user()->name, 'title' => $validated['title'], 'description' => $validated['description'], 'price' => $validated['price']]);
        return redirect()->back()->with(['success' => 'Annuncio inserito con successo']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function show1(ad $ad)
    {
        return view('ads.show', compact('ad'));
    }
}


