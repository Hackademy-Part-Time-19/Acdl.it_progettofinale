<?php

namespace App\Livewire;


use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Ad;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Faker\Provider\ar_EG\Address;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateAds extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $ad;
    public $price;
    public $photos = [];

    public function save()
    {
        foreach ($this->photos as $photo) {
            $photo->store(path: 'photos');
        }
    }

    protected $rules = [
        'title' => 'required',
        'description' => 'required|min:10',
        'price' => 'required|numeric',
        'category' => 'required',
        'images' => 'required',

    ];


    public function updatedTemporaryImages()
    {

        $validated = $this->validate([
            'temporary_images.*' => 'mimes:jpg,jpeg,png|max:1024|required',
        ]);
        if ($validated) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {


        $this->validate();


        $this->ad = Category::find($this->category)->ads()->create($this->validate());
        if (count($this->images)) {
            $newFileName = "ad/{$this->ad->id}";

            foreach ($this->images as $image) {
                //$this->ad->images()->create(['path' => $image->store('images', 'public')]);
                $newImage = $this->ad->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 300 , 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
                
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        /*
         $category = Category::find($this->category);
         $ad = $category->ads()->create([
             'title' => $this->title,
             'description' => $this->description,
             'price' => $this->price,
             'images' => $this->images
         ]);

         Auth::user()->ads()->save($ad); */


        session()->flash('message', __('messages.AnnuncioSuccesso'));
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
        $this->images = [];
        $this->temporary_images = [];
    }
    public function render()
    {
        return view('livewire.create-ads');
    }

    protected $messages = [
        'required' => 'il campo :attribute è vuoto',
        'min' => 'il campo :attribute è corto',
        'numeric' => 'il campo :attribute dev\'essere un numero',
        'temporary_images.required' => 'l\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 1MB',
        'temporary_images.*' => 'L\'estensione non è supportata',
        'images.image' => 'L\'immagine dev\'essere un\'immagine',
        'images.max' => 'L\'immagine dev\'essere massimo di 1MB',
    ];
}
