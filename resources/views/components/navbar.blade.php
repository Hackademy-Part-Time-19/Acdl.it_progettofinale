<nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding:0px 0px 0px 0px; position:fixed;top:0;width:100%;z-index:600; margin-bottom:50px";>
    <div class="container-fluid " style="background-image: linear-gradient(to left, #A87C7C 0%, #3F2E3E 100%);background-size:100% ;">
        <div class="col-4">
            <a href="{{ route('home') }}"> <img style="width:50%; padding:10px" src="{{ asset('storage/LogoPresto.png') }}"
                    alt="" srcset=""></a>
        </div>
        <div>
            @auth
                <p style="font-weight: 1600; padding-left: 30px;color: #eeeae8; font-size:16px;margin-bottom:0px;">
                    {{ __('messages.Benvenuto') }}
                    {{ Auth::user()->name }}</p>
            @endauth
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="display: flex; align-items: center;">

        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 linkNavBar" style="justify-content: center">
            <li class="nav-item">
                <a style="color: #eeeae8; font-size:16px" class="nav-link active" aria-current="page"
                    href=" {{ route('home') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a style="color: #eeeae8; font-size:16px"class="nav-link dropdown-toggle" href="#"
                    id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('messages.Categorie') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                                href="{{ route('categoryShow', compact('category')) }}">{{ __('messages.categoria_' . $category->id) }}</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endforeach
                </ul>
            </li>
            @auth
                <li class="nav-item">
                    <a style="color: #eeeae8; font-size:16px"class="nav-link"
                        href="{{ route('ads.create') }}">{{ __('messages.InserisciAnnuncio') }}
                    </a>
                </li>
                @if (Auth::user()->is_revisor)
                    <li class="nav-item ">
                        <a style="color:#eeeae8; font-size:16px;text-align: left " class="nav-link btn  btn-sm position-relative"
                            aria-current="page" href="{{ route('revisor.index') }}">
                            {{ __('messages.AreaRevisore') }}
                            <span style="color: #eeeae8; font-size:12px; margin-top:5px; margin-right:10px" class="position-absolute top-30 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ App\Models\Ad::toBeRevisionedCount() }}
                                <span style="color: #eeeae8; font-size:12px" class="visually-hidden">unread
                                    messages</span>
                            </span>
                        </a>
                    </li>
                @endif
            @endauth
            @guest
                <li class="nav-item">
                    <a style="color:#eeeae8; font-size:16px" class="nav-link active" aria-current="page"
                        href="/login">{{ __('messages.Login') }}</a>
                </li>
                <li class="nav-item">
                    <a style="color:#eeeae8; font-size:16px" class="nav-link active" aria-current="page"
                        href="/register">{{ __('messages.Registrazione') }}</a>
                </li>
            @endguest
            @auth
                <li style="margin-top: 5px; margin-left: 10px" class="nav-item">
                    <form style="margin-right: 10px" action="/logout" method="POST">
                        @csrf
                        <button
                            style="
                            align-items: center;
                            background-color: rgba(175, 175, 175, 0.26);
                            border: 1px solid #eeeae8;
                            border-radius: 16px;
                            box-sizing: border-box;
                            color: #eeeae8;
                            cursor: pointer;
                            display: flex;
                            font-family: Inter, sans-serif;
                            font-size: 15px;
                            justify-content: center;
                            line-height: 18px;
                            max-width: 100%;
                            padding: 10px 20px;
                            text-decoration: none;
                            transition: all .2s;
                            user-select: none;
                            -webkit-user-select: none;
                            touch-action: manipulation;
                            width: 100%;
                            }
                            .button-46:active,
                            .button-46:hover {
                            outline: 0;
                            }
                            .button-46:hover {
                            background-color:#eeeae8;
                            border-color: rgba(0, 0, 0, 0.19);
                            }
                            @media (min-width: 768px) {
                            .button-46 {
                            font-size: 5px;
                            min-width: 200px;
                            padding: 10px 15px;
                            }
                            }"
                            type="submit" class="button-46" role="button"> {{ __('messages.Logout') }}</button>
                    </form>
                </li>
            @endauth
        </ul>
        <form action="{{ route('ads.search') }}" method="GET" class="d-flex">
            @csrf
            <input type="search" name="searched" class="form-control me-2" placeholder="{{ __('messages.Cerca') }}"
                aria-label="search">
            <button class="btn btn-outline-light" type="submit">{{ __('messages.Cerca') }}</button>
        </form>

        <div>
            <a class="bandiera" href="{{ route('set_language_locale', 'en') }}"><x-flag-language-en /></a>
        </div>
        <div>
            <a class="bandiera" href="{{ route('set_language_locale', 'it') }}"><x-flag-language-it /></a>
        </div>
        <div>
            <a class="bandiera" href="{{ route('set_language_locale', 'es') }}"><x-flag-language-es /></a>
        </div>
    </div>

</nav>
<div style="height: 50px">
</div>
