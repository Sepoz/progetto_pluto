<x-layout  pageTitle="Registrati">

    
    <div class="container vh-100 register-container-size text-start fw-bold font-personal">
        <form class="mx-5 my-5 register-border-box" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            <h1 class="fs-2 text-start my-4 mb-5 ms-3">Crea l'account</h1>
            @csrf
        <div class="mb-3 mx-2">
            <label class="form-label mb-0 font-sz mb-0">Nome Utente</label>
            <input type="text" name="name" class="register-hover form-control @error('name') is-invalid @enderror">
            @error('name')
                @if ($message == 'The name field is required.')
                    <div class="text-danger">Il nome utente è obbligatorio</div>
                @else
                    <div class="text-danger">{{ $message }}</div>
                @endif
            @enderror
        </div>
        <div class="md-3 mx-2 font-sz">
            <label class="form-label ">Sesso:</label>
    
            <input class="form-check-input register-hover register-hover" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Maschio" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Maschio
            </label>
    
            <input class="form-check-input register-hover" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Femmina">
            <label class="form-check-label" for="flexRadioDefault2">
                Femmina
            </label>
    
            <input class="form-check-input register-hover" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="Altro">
            <label class="form-check-label" for="flexRadioDefault3">
                Altro
            </label>

        </div>

        <div class="mt-3 mb-3 mx-2 font-sz">
            <label class="form-label mb-0">Indirizzo Mail</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror register-hover">
            @error('email')
                @if ($message == 'The email field is required.')
                    <div class="text-danger">La mail è obbligatoria</div>
                @elseif ($message == 'The email has already been taken.')
                    <div class="text-danger">La mail è già in uso</div>
                @else
                    <div class="text-danger">{{ $message }}</div>
                @endif
            @enderror
        </div>
        <div class="mb-3 mx-2 font-sz">
            <label class="form mb-0 label">Password</label>
            <input type="password" name="password" class="register-hover form-control @error('password') is-invalid @enderror">
            @error('password')
                @if ($message == 'The password field is required.')
                    <div class="text-danger">La password è obbligatoria</div>
                @else
                    <div class="text-danger">{{ $message }}</div>
                @endif
            @enderror
        </div>
        <div class="mb-3 mx-2 font-sz">
            <label class="form- mb-0label">Conferma Password</label>
            <input type="password" name="password_confirmation"
                class="register-hover form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-color mb-3 col-6 mx-auto" style="width: 90%;">Registrati!</button>
        </div>
        <div class="mx-2 d-flex align-items-center border-top" style="height: 50px;">
            <p class="fw-light m-0 fs-6">Hai già un account ? <a href="{{route('login')}}">Accedi qui.</a></p>
        </div>
    </form>
</div>
</x-layout>
