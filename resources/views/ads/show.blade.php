<x-layout>

    <div class="container-fluid p-5 " style="margin-top:30px; box-shadow: rgba(5, 101, 74, 0.5)0px 7px 18px 0px;">

        <div class="row">
            <h1 class="fw-bolder" style="color:#1E3A3A; text-align:center"> {{ $ad->title }}</h1>
        </div>

    </div>





    <div class="container" style="display:flex;height:80vh;flex-direction:row ">


 <div class="col-6" style=" align-content:center">


        <div >

            <div id="showCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel"
                style="display:flex;">
 @if ($ad->images)
                    <div class="carousel-inner">
                        @foreach ($ad->images as $image)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ Storage::url($image->path) }}" class="img-fluid p-3 rounded"
                                    alt="...">
                            </div>
                        @endforeach

                    </div>
                @else

                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3"
                                class="img-fluid p-3 rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3"
                                class="img-fluid p-3 rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3"
                                class="img-fluid p-3 rounded" alt="...">
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
        </div>
    </div>

    <div class="col-6" style=";align-content:center">
        <div class="col-6" style=";align-items:center ;margin:30px">
            <h5 class="card-title">{{ $ad->title }}</h5>
            <p class="card-text fw-light">{{ $ad->description }}</p>
            <p class="card-text">€ {{ $ad->price }}</p>

            <a href="{{ route('categoryShow', ['category' => $ad->category]) }}"
                class="my-2 border-top pt-2 border-dark card-link shadow btn btn-start">
                {{ __('messages.Categoria') }}:
                {{ __('messages.categoria_' . $ad->category->id) }}</a>
            <p class='card-footer'>{{ __('messages.Pubblicato') }} {{ $ad->created_at->format('d/m/Y') }}
        </div>
    </div>
    </div>


</x-layout>
