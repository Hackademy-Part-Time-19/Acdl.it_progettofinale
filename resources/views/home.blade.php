<x-layout>
    <h1>Ecco i nostri annunci</h1>
    <div class ="row">

        @foreach ($ads as $ad)
            <div class="col-12 col-md-4 my-4" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div style="overflow: hidden; text-overflow: ellipsis" class="card-body">
                    <h5 class="card-title">{{ $ad->title }}</h5>
                    <h6 class="card-text">{{ $ad->description }}</h6>
                    <h6 class="card-text">{{ $ad->price }}</h6>
                    <button><a href="{{ route('ads.show') }}"class="btn btn-success shadow">Visualizza</a></button>
                    <button>{{ $ad->category->name }}</button>
                    <p class='card-footer'>Pubblicato il {{ $ad->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        @endforeach

    </div>


</x-layout>
