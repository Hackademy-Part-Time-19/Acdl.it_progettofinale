<x-layout>
    <h1>Ecco i nostri annunci</h1>
    <div style="margin-left:10px; margin-right:10px">
        <div class="row" style="display: flex; justify-ontent:space-between;">

            @foreach ($ads as $ad)
                <div class="col-12 col-md-3 ">
                    <img src="..." class="card-img-top p-3 rounded" alt="...">
                    <div style="overflow: hidden; text-overflow: ellipsis;margin-right:10px;" class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <p class="card-text">{{ $ad->description }}</p>
                        <p class="card-text">{{ $ad->price }}</p>
                        <a href="{{ route('ads.show', compact('ad')) }}"class="btn btn-primary shadow">Visualizza
                            dettagli</a>
                        <a href="{{ route('categoryShow', ['category' => $ad->category]) }}"
                            class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria:
                            {{ $ad->category->name }}</a>
                        <p class='card-footer'>Pubblicato il {{ $ad->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</x-layout>
