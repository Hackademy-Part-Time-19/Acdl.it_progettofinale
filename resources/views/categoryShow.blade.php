<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Esplora la categoria {{ $category->name }}<h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">



                    @forelse ($category->ads as $ad)
                        <div class="col-12 col-md-4 my-4" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div style="overflow: hidden; text-overflow: ellipsis" class="card-body">
                                <h5 class="card-title">{{ $ad->title }}</h5>
                                <h6 class="card-text">{{ $ad->description }}</h6>
                                <h6 class="card-text">{{ $ad->price }}</h6>
                                <button>Visualizza dettagli</button>
                                <button>{{ $ad->category->name }}</button>
                                <p class='card-footer'>Pubblicato il {{ $ad->created_at->format('d/m/Y') }} -
                                    author:{{ $ad->user->name ?? '' }}</p>

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
