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

                    <div class="mb-3">

                        <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" {{-- id="image" --}} placeholder="Img"/>

                    @error('temporary_images.*')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Foto preview: </p>
                                <div class="row border-4 border-info rounded shadow py-4">  
                                    @foreach ($images as $key => $image)
                                      <div class="col my-3">
                                        <div class=" mx-auto shadow rounded " style="width: 500px; height: 500px; background-image: url({{$image->temporaryUrl()}}); background-size: cover" >
                                        </div>
                                        <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                                      </div>
                                      @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

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
