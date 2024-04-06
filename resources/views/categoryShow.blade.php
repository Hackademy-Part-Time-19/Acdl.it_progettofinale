<x-layout>
    <div class="box-category p-5 mb-4">
        <div class="row">
            <div class="col-12 p-5">
                <h1 style="color: #1E3A3A">{{ __('messages.EsploraCategoria') }} {{ $category->name }}<h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">


                    @forelse ($ads as $ad)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card shadow" style="width: 30rem;">
                                <img src="{{!$ad->images()->get()->isEmpty() ? Storage::url($ad->images()->first()->path): 'https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3' }}" 
                        class="card-img-top rounded" alt="...">
                                <div style="overflow: hidden; text-overflow: ellipsis" class="card-body">
                                    <h5 class="card-title">{{ $ad->title }}</h5>
                                    <p class="card-text">{{ $ad->description }}</p>
                                    <p class="card-text">{{ $ad->price }}</p>
                                    <a href="{{ route('ads.show', compact('ad')) }}"class="btn btn-detail ">{{ __('messages.VisualizzaDettagli') }}
                                    </a>

                                    <p class='card-footer my-2'>Pubblicato il {{ $ad->created_at->format('d/m/Y H:i') }}

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
    </div>

</x-layout>
