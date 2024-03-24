<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/footer.css']);
    @livewireStyles
</head>

<body>
    <x-navbar />
    <div class="is-preload">

        <!-- Page Wrapper -->
        <div id="page-wrapper">
    
            <!-- Banner -->
            <section id="banner">
                <div class="inner">
    
                    <h2>Presto.it</h2>
                    <p>You made the right choise!</p>
                </div>
            </section>
    
        </div>
    </div>

    {{ $slot }}
    @livewireScripts
    <x-footer />
</body>

</html>



