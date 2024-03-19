 <x-layout>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <form class="mt-5" action={{ route('ads.store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1>Inserisci un libro</h1>
                        <div class="mb-3">
                            <label for="title" class="form-label" style="color: white">Titolo</label>
                            <input name="title" type="text" class="form-control" id="title">
                        </div>
                        @error('title')
                            <p>{{ $message }}</p>
                        @enderror
                        <div class="mb-3">
                            <label for="price" class="form-label" style="color: white">Prezzo</label>
                            <input name="price" type="decimal" class="form-control" id="price">
                        </div>
                        @error('price')
                            <p>{{ $message }}</p>
                        @enderror
                        <div class="mb-3">
                            <label for="description" class="form-label" style="color: white">Descrizione</label>
                            <input name="description" type="text" class="form-control" id="description">
                        </div>
                        @error('description')
                            <p>{{ $message }}</p>
                        @enderror
                        <div class="mb-3">
                            <label for="image" class="form-label" style="color: white">Immagine</label>
                            <input name="image" type="file" class="form-control" id="image">
                        </div>
                        @error('image')
                        <p>{{ $message }}</p>
                    @enderror
                        <button type="submit" class="btn btn-success">Salva</button>
                    </form>
                </div>
            </div>
        </div>

</x-layout>
