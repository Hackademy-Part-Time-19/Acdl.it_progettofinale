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
                                            <img src="{{!$ad->images()->get()->isEmpty() ? Storage::url($ad->images()->first()->path): 'https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3'  }}" 
                                            class="card-img-top rounded" alt="...">
                                            <div style="overflow: hidden; text-overflow: ellipsis" class="card-body">
                                                <h5 class="card-title">{{ $ad->title }}</h5>
                                                <p class="card-text">{{ $ad->description }}</p>
                                                <p class="card-text">€ {{ $ad->price }}</p>
                                                <a href="{{ route('ads.show', compact('ad')) }}"class="btn btn-secondary">{{ __('messages.VisualizzaDettagli') }}</a>
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
                            <p class="h3">{{ __('messages.NoAdCategoria') }}</p>
                            <br>
                            <a href="{{ route('ads.create') }}" class= "btn-ads">{{ __('messages.InserisciAnnuncio') }}</a>
                            </br>
                        </div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>

</x-layout>
