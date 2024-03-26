<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                @if (count($ads)>0)
                <h1 class="display-2">Esplora la categoria {{ $ads[0]->category->name }}<h1>
                    @else
                    <h1>Non ci sono annunci per la tua ricerca</h1>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">


                    @forelse ($ads as $ad)
                        <div class="col-12 col-md-4 my-2">
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
                    @empty
                        <div class="col-12">
                            <p class="h1">Non sono presenti annunci per questa categoria!</p>
                            <p class="h2">Pubblica un tuo annuncio:<a
                                    href="{{ route('ads.create') }}"class="btn btn-success shadow">Nuovo
                                    annuncio</a>
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>

</x-layout>
