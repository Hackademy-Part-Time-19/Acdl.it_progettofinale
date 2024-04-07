<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Alexandria' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/footer.css'])
    @livewireStyles
</head>

<body style="background-image:src="{{ asset('storage/LogoPresto.png') }}; hight:100%">
    <div id="contenitore" style="margin-top: 30px">

        <x-navbar />
        {{ $slot }}
        @livewireScripts

    </div>
    <x-footer />
</body>

</html>
