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
            <h2 style="font-weight:900;color:white;">Benvenuto su Presto.it,
                registrati subito ed inserisci il tuo annuncio</h1>
                <button type="button" class="btn-start">Registrati</button>
        </div>

        <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3"
            alt="HomeImage" srcset="" style="object-fit: cover;height:70vh;width:100%">

    </div>



    <h1 style="text-align:center">Ecco i nostri annunci</h1>
    <div style="margin-left:30px; margin-right:30px">
        <div class="row" style="display: flex; justify-ontent:space-between;">

            @foreach ($ads as $ad)
                <div class="col-12 col-md-4 ">
                    <img src="data:image/jpeg;base64,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"
                        class="card-img-top p-3 rounded" alt="...">
                    <div style="overflow: hidden; text-overflow: ellipsis;margin-right:10px; margin-left:15px" class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <p class="card-text">{{ $ad->description }}</p>
                        <p class="card-text">€ {{ $ad->price }}</p>
                    </div>
                    <div style="margin: 20px">
                        <a href="{{ route('ads.show', compact('ad')) }}" class="btn-detail">Visualizza dettagli<a>
                        <a href="{{ route('categoryShow', ['category' => $ad->category]) }}"
                                    class="btn-detail">Categoria:
                                    {{ $ad->category->name }}</a>
                        <p style="margin: 20px" class='card-footer'>Pubblicato il {{ $ad->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-layout>
