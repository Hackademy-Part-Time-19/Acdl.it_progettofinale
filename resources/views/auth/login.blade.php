<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <form class="mt-5" action="/login" method="POST">
                    @csrf
                    <h1>Accedi</h1>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    @error('email')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    @error('password')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                    <br>
                    <p>Non sei registrato?<a href="{{ route('register') }}"><br>Clicca qui</a></p>
                    <button type="submit" class="btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
