<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>

    <h1 class="text-center">Grazie per averci contattato <span style="color: #40916C">{{ $contact['user'] }}</span>!</h1>
    <h3 class="">Ecco il riepilogo della sua <span style="color: #40916C">richiesta</span>!</h3>
    <p>{{ $contact['description'] }}</p>
    <h4 class="text-center">Le faremo sapere al più <span style="color: #40916C">PRESTO</span>!</h4>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
