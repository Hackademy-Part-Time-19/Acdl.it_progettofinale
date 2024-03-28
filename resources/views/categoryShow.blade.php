<x-layout>
    <div class="box-category p-5 mb-4">
        <div class="row">
            <div class="col-12 p-5">
                <h1 style="color: #1E3A3A">Esplora la categoria {{ $category->name }}<h1>
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
                                    <a href="{{ route('ads.show', compact('ad')) }}"class="btn btn-detail ">Visualizza
                                        dettagli</a>

                                    <p class='card-footer my-2'>Pubblicato il {{ $ad->created_at->format('d/m/Y H:i') }}

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="h3">Non sono presenti annunci per questa categoria!</p>
                            <br>
                            <a href="{{ route('ads.create') }}" class= "btn-ads">Inserisci un nuovo annuncio</a>
                            </br>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>

</x-layout>
