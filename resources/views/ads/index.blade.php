<x-layout>
    @forelse ($ads as $ad)
        <div class="container">
            <div class="row">
                <div class="col"style="background-color: blueviolet;width:100%;display:flex;flex-direction:row;">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="..." class="card-img-top p-3 rounded" alt="...">
                        <div style="overflow: hidden; text-overflow: ellipsis" class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <p class="card-text">{{ $ad->description }}</p>
                            <p class="card-text">{{ $ad->price }}</p>
                            <a href="{{ route('ads.show', compact('ad')) }}"class="btn btn-primary shadow">Visualizza
                                dettagli</a>

                            <p class='card-footer my-2'>Pubblicato il {{ $ad->created_at->format('d/m/Y H:i') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <div class="col-12" style="margin-top:65px;">
            <p class="h3">Non sono presenti annunci per questa ricerca!</p>
            <br>
            <a href="{{ route('ads.create') }}" class= "btn-ads">Inserisci un nuovo annuncio</a>
            </br>
        </div>
    @endforelse

    </div>


</x-layout>
