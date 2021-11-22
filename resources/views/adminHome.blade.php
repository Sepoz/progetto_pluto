<x-layout pageTitle="Utenti da approvare">

    <h1 class="mt-5 mb-5 text-center">Pannello Assegnazione Ruoli </h1>
    <div class="min-vh-100">
        @if ($users)
            <div class="container ">
                <div class="row border border-white ">

                    <div class=" d-flex justify-content-center mt-5 ">
                        <div>
                            <h2>{{ $users->name }}</h2>
                            <h3>Indirizzo Email: {{ $users->email }}</h3>
                            <h4>Utente da: {{ date('d-m-Y', strtotime($users->created_at)) }}</h4>

                            <div class="row mt-5 d-flex justify-content-around mb-5">
                                <div class="col-md-4">
                                    <form action="{{ route('adminReject', $users->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Rifiuta</button>
                                    </form>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <form action="{{ route('adminAccept', $users->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Accetta</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h2 class="text-success text-center mt-3">Non ci sono utenti da autorizzare, ben fatto!</h2>
        @endif

    </div>
</x-layout>
