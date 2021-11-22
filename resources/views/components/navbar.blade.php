 <nav class="navbar navbar-expand-lg up-navbar fixed-top py-4 sticky-top">
     <div class="container">

         <a class="navbar-brand " href="{{ route('homepage') }}">
             <img style="width: 60px" src="/img/logo_small.png" alt="">
         </a>

         <ul class="d-flex flex-row ms-0 mb-0" style="list-style-type: none;">
             <li class="nav-item d-flex align-self-center">
                 @include('components.flagsButtons', ['lang' => 'it', 'nation' => 'it'])
             </li>

             <li class="nav-item d-flex align-self-center">
                 @include('components.flagsButtons', ['lang' => 'en', 'nation' => 'gb'])
             </li>

             <li class="nav-item d-flex align-self-center">
                 @include('components.flagsButtons', ['lang' => 'es', 'nation' => 'es'])
             </li>
         </ul>


         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <i class="fas fa-ellipsis-v"></i>
             <span class="text-upper-case">
                 Menù
             </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                 </li>
                 @guest
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('articlesByCategory') }}">{{__('ux.navbarAll')}}</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('register') }}">{{__('ux.navbarRegistration')}}</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">Login</a>
                     </li>
                 @else
                     <li class="nav-item">
                         @if (Auth::user()->identity == 'Femmina')
                             <p class="nav-link text-success mb-0 pb-0 ">{{__('ux.navbarFemale')}}<span
                                     class=" fw-bold">{{ Auth::user()->name }}</span></p>
                         @else
                             <p class="nav-link text-success mb-0 pb-0 ">{{__('ux.navbarMale')}} <span
                                     class=" fw-bold">{{ Auth::user()->name }}</span></p>
                         @endif
                         @if (!(Auth::user()->is_revisor || Auth::user()->is_admin))
                     <li class="nav-item">
                         <a class="nav-link fw-bold text-danger" href="{{ route('revisorSignUp') }}">{{__('ux.navbarRevisor')}}</a>
                     </li>
                     @endif
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('articlesByCategory') }}">{{__('ux.navbarAll')}}</a>
                     </li>
                     @if (Auth::user()->is_revisor || Auth::user()->is_admin)
                         <li class="nav-item d-flex">
                             <a class="nav-link" href="{{ route('revisorHome') }}">{{__('ux.navbarRevisorPanel')}}<span
                                     class="badge bg-danger badge-pill badge-warning">{{ App\Models\Article::ToBeRevisionedCount() }}</span></a>
                         </li>
                     @endif
                     @if (Auth::user()->is_admin)
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('adminHome') }}">{{__('ux.navbarAdminPanel')}}<span
                                     class="badge bg-danger badge-pill badge-warning">{{ App\Models\User::ToBeAcceptedCount() }}</span></a>
                         </li>
                     @endif
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">Logout</a>
                     </li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 @endguest
                 </li>
             </ul>
         </div>
     </div>
 </nav>
