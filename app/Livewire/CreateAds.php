<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Ad;
use Livewire\Component;
use Faker\Provider\ar_EG\Address;

class CreateAds extends Component
{
    public $title;
    public $description;
    public $price;
    public $category;


    protected $rules = [
        'title' => 'required',
        'description' => 'required|min:10',
        'price' => 'required|numeric',
        'category' => 'required',

    ];

    protected $messages = [
        'required' => 'il campo :attribute è vuoto',
        'min' => 'il campo :attribute è corto',
        'numeric' => 'il campo :attribute dev\'essere un numero',
    ];

    public function store()
    {
        $this->validate();
        $category = Category::find($this->category);
        $ad = $category->ads()->create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        Auth::user()->ads()->save($ad);

        session()->flash('message', "L'annuncio è stato inserito con successo");
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
    }
    public function render()
    {
        return view('livewire.create-ads');
    }
}
