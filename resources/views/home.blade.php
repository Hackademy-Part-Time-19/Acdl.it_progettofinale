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
    <div class="is-preload">

        <!-- Page Wrapper
        <div id="page-wrapper"> -->

        <!-- Banner
            <section id="banner" style="margin: 40px">
                <div class="inner">
                    <h2>Presto.it</h2>
                    <p>You made the right choise!</p>
                </div>
            </section> -->

 <div class="container img " style="position: relative;">
                    <div style="position: absolute; top: 150px; left: 80px;z-index: 1000;width:30%;">
                        <h2 style="font-weight:900;color:white;">Benvenuto su Presto.it,
                            registrati subito ed inserisci il tuo annuncio</h1>
                            <button type="button" class="btn btn-outline-light">Registrati</button>
                    </div>

                    <img src="https://img.freepik.com/free-photo/pretty-european-woman-casual-sweater-with-megaphone-pink-wall_343596-5823.jpg?w=1480&t=st=1711559198~exp=1711559798~hmac=b9f231830afae4a458d3777e15cb852ba20a570a1bf3f322abcb82343ef443b3" alt="HomeImage" srcset="" style="object-fit: contain">

                </div>



        <h1 style="text-align:center">Ecco i nostri annunci</h1>
        <div style="margin-left:30px; margin-right:30px">
            <div class="row" style="display: flex; justify-ontent:space-between;">

                @foreach ($ads as $ad)
                    <div class="col-12 col-md-4 ">
                        <img src="..." class="card-img-top p-3 rounded" alt="...">
                        <div style="overflow: hidden; text-overflow: ellipsis;margin-right:10px;" class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <p class="card-text">{{ $ad->description }}</p>
                            <p class="card-text">{{ $ad->price }}</p>
                            <a href="{{ route('ads.show', compact('ad')) }}" class=" btn-detail shadow">Visualizza
                                dettagli </a>
                            <a href="{{ route('categoryShow', ['category' => $ad->category]) }}"
                                class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria:
                                {{ $ad->category->name }}</a>
                            <p class='card-footer'>Pubblicato il {{ $ad->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



</x-layout>
