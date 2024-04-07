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
    <div class="box img " style="position:relative;">
        <div style="position: absolute; top: 150px; left: 30px;z-index: 500;width:30%;">
            <h2 style="font-weight:900;color:white;">{{ __('messages.Introduzione') }}
                </h1>
                <button type="button" class="btn-start">{{ __('messages.Registrazione') }}</button>
        </div>
        <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3"
            alt="HomeImage" srcset="" style="object-fit: cover;height:70vh;width:100%">
    </div>
    <h1 style="text-align:center">{{ __('messages.AnnunciHome') }}</h1>
    <div>
        <div class="row justify-content-md-center">
            @foreach ($ads as $ad)
                <div class="col-12 col-md-3 my-4" style="border: 1px solid #3F2E3E;border-radius:3%; margin:15px" >
                    <div class="card-shadow" >
                        <img src="{{!$ad->images()->get()->isEmpty() ? Storage::url($ad->images()->first()->path): 'storage/LogoPresto.png' }}" 
                        class="card-img-top rounded" alt="...">
                        <div style="overflow: hidden; text-overflow: ellipsis;margin-right:10px; margin-left:15px"
                            class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <p class="card-text">{{ $ad->description }}</p>
                            <p class="card-text">€ {{ $ad->price }}</p>
                        </div>
                        <div style="margin: 20px">
                            <a href="{{ route('ads.show', compact('ad')) }}"
                                class="btn-detail">{{ __('messages.Dettagli') }}<a>
                                    <a href="{{ route('categoryShow', ['category' => $ad->category]) }}"
                                        class="btn-detail">                                       
                                        {{ __('messages.categoria_' . $ad->category->id) }} </a>
                                    <p style="margin-top: 20px" class='card-footer'>{{ __('messages.Pubblicato') }}:
                                        {{ $ad->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>