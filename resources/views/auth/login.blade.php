<x-layout pageTitle="Accedi">

<div class="container register-container-size text-start fw-bold font-personal">
    <form class="mx-5 my-5 register-border-box" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
        <h1 class="fs-2 text-start my-3 mb-2 ms-2">Accedi</h1>
        @csrf
        <div class="mb-3 mt-3 mb-3 mx-2 font-sz">
            <label class="form-label mb-0 mx-0 font-sz register-hover">Indirizzo Mail</label>
            <input type="email" name="email" class="form-control  register-hover @error('email') is-invalid @enderror">
            @error('email')
                @if ($message == 'These credentials do not match our records.')
                    <div class="text-danger">Email e/o password sbagliata</div>
                @elseif ($message == 'The email field is required.')
                    <div class="text-danger">La mail è richiesta</div>
                @else
                    <div class="text-danger">{{ $message }}</div>
                @endif
                @enderror
        </div>
        <div class="mb-3 mt-3 mb-3 mx-2 font-sz">
            <label class="form-label mb-0 mx-0 font-sz ">Password</label>
            <input type="password" name="password" class="form-control register-hover @error('password') is-invalid @enderror">
            @error('password')
                @if ($message == 'The password field is required.')
                    <div class="text-danger">La password è obbligatoria</div>
                @else
                    <div class="text-danger">{{ $message }}</div>
                @endif
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-color mb-3 col-6 mx-auto" style="width: 80%;">Accedi!</button>
        </div>
        <div class="mx-2 d-flex align-items-center border-top" style="height: 50px;">
            <p class="fw-light m-0 fs-6">Non hai ancora un account ? <a href="{{route('register')}}">Registrati qui.</a></p>
        </div>
    </form>
</div>

</x-layout>
