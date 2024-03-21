<x-layout>

    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">

        <div class="row">

            <div class="col-12 text-light p-5">

                <h1 class="display-2">Annuncio {{ $ad->title }}<h1>

            </div>

        </div>

    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div style="overflow: hidden; text-overflow: ellipsis" class="card-body">
        <h5 class="card-title">{{ $ad->title }}</h5>
        <h6 class="card-text">{{ $ad->description }}</h6>
        <h6 class="card-text">{{ $ad->price }}</h6>
        <button>Visualizza dettagli</button>
        <a href="{{ route('categoryShow', ['category' => $ad->category]) }}"
            class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">
            Categoria:
            {{ $ad->category->name }}</a>
        <p class='card-footer'>Pubblicato il {{ $ad->created_at->format('d/m/Y') }} -
            author:{{ $ad->user->name ?? '' }}</p>

    </div>
</x-layout>
