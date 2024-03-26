<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Un utente ha richiesto di lavorare con noi</h1>
    <h4>Richiesta per ruolo di Revisore</h4>
    <p>Nome utente: {{ Auth::user()->name }}</p>
    <p>Email:{{ Auth::user()->email }}</p>
    <p>Messaggio:{{ $info['message'] }}</p>
    <p>Se vuoi renderlo revisore clicca qui:</p>
    <a href="{{ route('make.revisor1', ['user' => Auth::id()]) }}">Rendi revisore</a>

</body>

</html>
