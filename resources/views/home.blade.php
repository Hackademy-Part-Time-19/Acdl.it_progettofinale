<x-layout>
    @if (session('access.denied'))
        <div class="alert alert-danger">
            {{ session('access.denied') }}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @guest
        <div style="position:relative;">

            <div style="position: absolute; top: 120px; left: 50px;z-index: 500;width:30%;">
                <h2 style="font-weight:600;color:white;">{{ __('messages.Introduzione') }} </h2>
                <div style="margin-top: 30px">
                    <a class="btn-image" href="{{ route('register') }}">{{ __('messages.Registrazione') }}
                    </a>
                </div>
            </div>
            <img class="boxImg" src="{{ asset('storage/ImgHome.jpeg') }}" alt="HomeImage" srcset=""
                style="object-fit:cover;height:70vh;width:100%">
        </div>
    @endguest

    @auth

        <div style="position:relative;margin-top:50px">

            <div style="position: absolute; top: 120px; left: 50px;z-index: 500;width:30%;">
                <h2 style="font-weight:600;color:white;">{{ __('messages.Introduzione2') }} </h2>
                <div style="margin-top: 30px">
                    <div>
                        <a class="btn-image" href="{{ route('ads.create') }}">{{ __('messages.InserisciAnnuncio') }}
                        </a>
                    </div>
                </div>
            </div>
            <img class="boxImg" src="{{ asset('storage/ImgHome.jpeg') }}" alt="HomeImage" srcset=""
                style="object-fit:cover;height:70vh;width:100%">

        </div>
    @endauth


    <p class="fw-bolder fs-2" style="text-align:center; margin-top:20px; color:#1E3A3A">
        {{ __('messages.AnnunciHome') }}</p>
    <div class="row justify-content-md-center" style="margin-top: 20px">
        @foreach ($ads as $ad)
            <div class="col-12 col-md-3 my-4" style="border-radius:10%; margin:10px">
                <div class="cardAds">
                    <img class="cardImg"
                        src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(300, 300) : 'storage/public/LogoPresto.png' }}"
                        alt="...">
                    <div style="overflow: hidden;text-overflow:ellipsis;margin-right:10px; margin-left:15px;margin-top:10px"
                        class="card-body">
                        <h5 class="card-title" style="text-weight:800">{{ $ad->title }}</h5>
                        <p class="card-text fw-light" >{{Str::limit($ad->description,40)}}</p>
                        <p class="card-text" style="font-size: 16px">€ {{ $ad->price }}</p>
                    </div>
                    <div style="margin: 20px">
                        <a href="{{ route('ads.show', compact('ad')) }}"
                            class="btnDetail">{{ __('messages.Dettagli') }}<a>

                                    <a href ="{{ route('categoryShow', ['category' => $ad->category]) }}"
                                        class="btnCategory">
                                        {{ __('messages.categoria_' . $ad->category->id) }} </a>

                                <p style="padding-bottom: 20px; padding-top:10px" class='card-footer'>
                                    {{ __('messages.Pubblicato') }}:
                                    {{ $ad->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</x-layout>
