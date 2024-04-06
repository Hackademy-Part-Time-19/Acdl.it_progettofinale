<x-layout>
    <h1 style="margin-top:50px;">{{ __('messages.Lavora') }}</h1>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">

                <h2>{{ __('messages.LavoraComeRevisore') }}</h2>
                <p>{{ __('messages.LavoraNoi') }} </p>

            </div>

            <div class="col-12 col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('careers.submit') }}" method="POST" class="p-5">
                    @csrf


                    <div class="class mb-3">
                        <label for="message" class="form-label">{{ __('messages.ParlaciTe') }}</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{ old('message') }}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-info text-white">{{ __('messages.Candidatura') }}</button>
                    </div>
                </form>


            </div>
        </div>
    </div>



</x-layout>
