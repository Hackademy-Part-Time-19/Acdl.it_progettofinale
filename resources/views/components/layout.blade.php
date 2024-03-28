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

<body style="background-color: #eeeae8; hight:100%">
    <x-navbar />
    {{ $slot }}
    @livewireScripts
    <x-footer />
</body>

</html>
