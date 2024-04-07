<div style="margin-top:100px;">
    <h1>{{ __('messages.InserisciAnnuncio') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <form wire:submit.prevent="store">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label"
                            style="color: black">{{ __('messages.TitoloAnnuncio') }}</label>
                        <input wire:model.live="title" type="text"
                            class="form-control @error('title')is-invalid @enderror">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label"
                            style="color: black">{{ __('messages.Prezzo') }}</label>
                        <input wire:model.live="price" type="decimal"
                            class="form-control  @error('price')is-invalid @enderror">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"
                            style="color: black">{{ __('messages.Descrizione') }}</label>
                        <input wire:model.live="description" type="text"
                            class="form-control  @error('description')is-invalid @enderror">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label"
                            style="color: black">{{ __('messages.Immagine') }}</label>
                        <input wire:model="image" type="file" class="form-control" id="image">
                    </div>
                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="category" class="form-label"
                            style="color: black">{{ __('messages.InserimentoCategoria') }}</label>
                        <select wire:model.defer="category" class="form-control  @error('category')is-invalid @enderror"
                            id="category">
                            <option value="">{{ __('messages.SelezionaCategoria') }}</option>
                            @foreach ($categories as $category)                               
                                <option value="{{ $category->id }}">{{ __('messages.categoria_' . $category->id) }}
                                </option>
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
                    <button style="border-radius:2px" type="submit" class="submit">{{ __('messages.Salva') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>