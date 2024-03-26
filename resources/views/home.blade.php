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

        <!-- Page Wrapper -->
        <div id="page-wrapper">

            <!-- Banner -->
            <section id="banner" style="margin: 40px">
                <div class="inner">
                    <h2>Presto.it</h2>
                    <p>You made the right choise!</p>
                </div>
            </section>

        </div>
        <img src="https://img.freepik.com/foto-gratuito/giovane-bruna-in-maglione-casual-bianco-isolato-sulla-parete-viola_343596-5601.jpg?t=st=1711396249~exp=1711399849~hmac=785648242be6e6ea6ee9354ba43b85523b3728eee8b8d44f0df84e969d87ca21&w=1480"
 alt="" srcset="" style= object-fit: cover, height="100%",width="100%" >

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
                        <a href="{{ route('ads.show', compact('ad')) }}"class="btn btn-primary shadow">Visualizza
                            dettagli</a>
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
