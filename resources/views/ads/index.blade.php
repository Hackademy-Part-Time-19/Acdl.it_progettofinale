<x-layout>
    <div class="container">
        <div class="container-fluid p-5 shadow mb-2" style="margin-bottom: 0">
        
            <div class="row">
                <h1 class="display-5" style="color:#1E3A3A; text-align:center"> {{ __('messages.EsploraAnnunci') }}</h1>
            </div>
        
    </div>
        <div class="row">
            <div class="col-12">
                <div class="row" style="margin-top: 100px;">
                    @forelse ($ads as $ad)
                        <div class="col-md-3" style="margin-bottom: 70px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col" style="width:100%; display:flex;flex-direction:row;">
                                        <div class="card shadow" style="width: 30rem;">
                                            <img src="data:image/jpeg;base64,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"" class="card-img-top p-3 rounded" alt="...">
                                            <div style="overflow: hidden; text-overflow: ellipsis" class="card-body">
                                                <h5 class="card-title">{{ $ad->title }}</h5>
                                                <p class="card-text">{{ $ad->description }}</p>
                                                <p class="card-text">€ {{ $ad->price }}</p>
                                                <a
                                                    href="{{ route('ads.show', compact('ad')) }}"class="btn btn-secondary">{{ __('messages.VisualizzaDettagli') }}</a>

                                                <p class='card-footer my-2'>{{ __('messages.Pubblicato') }}
                                                    {{ $ad->created_at->format('d/m/Y H:i') }}
                                                </p>

                                            </div>
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
            </div>
        </div>
    </div>

</x-layout>
