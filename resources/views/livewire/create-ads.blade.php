<div>
    <h1>Inserisci un annuncio</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <form wire:submit.prevent="store">
                    @csrf



                    <div class="mb-3">
                        <label for="title" class="form-label" style="color: black">Titolo</label>
                        <input wire:model.live="title" type="text"
                            class="form-control @error('title')is-invalid @enderror">

                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label" style="color: black">Prezzo</label>
                        <input wire:model.live="price" type="decimal"
                            class="form-control  @error('price')is-invalid @enderror">

                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label" style="color: black">Descrizione</label>
                        <input wire:model.live="description" type="text"
                            class="form-control  @error('description')is-invalid @enderror">

                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label" style="color: black">Immagine</label>
                        <input wire:model="image" type="file" class="form-control" id="image">
                    </div>
                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror

                    <div class="mb-3">
                        <label for="category" class="form-label" style="color: black">Categoria</label>
                        <select wire:model.defer="category" class="form-control  @error('category')is-invalid @enderror"
                            id="category">
                            <option value="">Seleziona la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }} </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p>{{ $message }}</p>
                        @enderror




                    </div>
                   
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <button style="border-radius:2px" type="submit" class="submit">Salva</button>


                </form>
            </div>
        </div>
    </div>
</div>
