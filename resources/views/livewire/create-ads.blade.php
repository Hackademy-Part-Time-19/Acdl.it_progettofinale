<div>
    <h1>Inserisci un annuncio</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <form wire:submit.prevent="store">
                    @csrf


                    <div class="mb-3">
                        <label for="title" class="form-label" style="color: black">Titolo</label>
                        <input wire:model="title" type="text" class="form-control" id="title">
                    </div>
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="price" class="form-label" style="color: black">Prezzo</label>
                        <input wire:model="price" type="decimal" class="form-control" id="price">
                    </div>
                    @error('price')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label" style="color: black">Descrizione</label>
                        <input wire:model="description" type="text" class="form-control" id="description">
                    </div>
                    @error('description')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label" style="color: black">Immagine</label>
                        <input wire:model="image" type="file" class="form-control" id="image">
                    </div>
                    @error('image')
                    <p>{{ $message }}</p>
                @enderror

                @if (session()->has ('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif



                    <button type="submit" class="btn btn-success">Salva</button>

                </form>
            </div>
        </div>
    </div>
</div>
