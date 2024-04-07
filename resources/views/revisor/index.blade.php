<x-layout>
    <div>
        <div class="container-fluid p-5 bg-gradient bg-succes p-5 shadow mb-4">
            <div class="row">
                <div class="col-12 text-light p-5">
                    <h6 class="display-5" style="color: rgb(36, 22, 49);">
                        {{ $ad_to_check ? __('messages.AnnuncioRevisione') : __('messages.NoAnnunciRevisione') }}
                    </h6>
                </div>
            </div>
        </div>
        @if ($ad_to_check)
            <div class="container" style="margin-top: 50px">
                <div class="row">
                    <div class="col-12">
                        <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                            @if ($ad_to_check->images)
                                <div class="carousel-inner">
                                    @foreach ($ad_to_check->images as $image)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{ Storage::url($image->path) }}" class="img-fluid p-3 rounded"
                                                alt="...">
                                        </div>
                                    @endforeach

                                </div>
                            @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="storage/LogoPresto.png" 
                                        class="card-img-top rounded" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3" class="img-fluid p-3 rounded"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3" class="img-fluid p-3 rounded"
                                            alt="...">
                                    </div>
                                </div>
                            @endif

                            <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div>
                        <h5 class="card-title"> {{ __('messages.TitoloAnnuncio') }}: {{ $ad_to_check->title }}</h5>
                        <p class="card-text">{{ __('messages.Descrizione') }}: {{ $ad_to_check->description }}</p>
                        <p class="card-footer">{{ __('messages.Pubblicato') }}:
                            {{ $ad_to_check->created_at->format('d/m/y H:i') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="{{ route('revisor.accept_ad', ['ad' => $ad_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-succes shadow">{{ __('messages.Accetta') }}</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-6 text-end">
                        <form action="{{ route('revisor.reject_ad', ['ad' => $ad_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger shadow">{{ __('messages.Rifiuta') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div style="height: 80px">

    </div>

</x-layout>
