<x-layout pageTitle="Pagina non trovata">
    <h1 class="mt-5 text-center">Errore 404 - Pagina non trovata</h1>
    <h3 class="mt-3 text-center">Hey! Ti sei perso? Forse cercavi una di queste pagine?</h3>
    <ul class="d-flex flex-column align-items-center">
        <li><a href="{{route('homepage')}}">Homepage</a></li>
        <li><a href="{{route('articlesByCategory')}}">Tutti gli annunci</a></li>
        <li><a href="{{route('register')}}">Registrati</a></li>
    </ul>
</x-layout>