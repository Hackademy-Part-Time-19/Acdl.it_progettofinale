<x-layout>
    <div class="box-category p-5 mb-4">
        <div class="row">
            <div class="col-12 p-5">
                <h1 style="color:white; font-weight:600">{{ __('messages.EsploraCategoria') }} {{ $category->name }}<h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col">
            <div class="row justify-content-center">


                @forelse ($ads as $ad)
                    <div class="col-12 col-md-3 my-4" style="border-radius:10%;">
                        <div class="cardAds">
                            <img class="cardImg"
                                src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(300, 300) : 'storage/public/LogoPresto.png' }}"
                                class="card-img-top rounded" alt="...">
                            <div style="overflow: hidden; text-overflow: ellipsis;margin-right:10px; margin-left:15px;margin-top:10px"
                                class="card-body">
                                <h5 class="card-title" style="text-weight:800">{{ $ad->title }}</h5>
                                <p class="card-text fw-light">{{ Str::limit($ad->description, 40) }}</p>
                                <p class="card-text" style="font-size: 16px"> € {{ $ad->price }}</p>
                                <a href="{{ route('ads.show', compact('ad')) }}"
                                    class="btnDetail ">{{ __('messages.VisualizzaDettagli') }}
                                </a>

                                <p style="padding-bottom: 20px; padding-top:10px" class='card-footer'>
                                    {{ __('messages.Pubblicato') }}:
                                    {{ $ad->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="h3">{{ __('messages.NoAnnunci') }}</p>
                        <br>
                        <a href="{{ route('ads.create') }}" class= "btn-ads">{{ __('messages.NuovoAnnuncio') }}</a>
                        </br>
                    </div>
                @endforelse

            </div>
        </div>

    </div>

</x-layout>
