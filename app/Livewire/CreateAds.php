<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use Faker\Provider\ar_EG\Address;

class CreateAds extends Component
{
    public $title;
    public $description;
    public $price;

    public function store ()
    {
Ad::create ([ 'title'=>$this->title,
'description'=>$this->description,
'price'=>$this->price,

    ]);

    session()->flash('message',"L'annuncio è stato inserito con successo");
$this->cleanForm();
}

public function cleanForm()
    {
        $this->title='';
        $this->description='';
        $this->price='';
    }
    public function render()
    {
        return view('livewire.create-ads');
    }
}


