<nav class="navbar navbar-top navbar-expand" id="navbarDefault" style="height: 2.2rem; min-height: 2.2rem;">
    <div class="collapse navbar-collapse justify-content-between">
      <div class="navbar-logo">

        <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="{{ route('app.home') }}">
          <div class="d-flex align-items-center">
            <div class="d-flex align-items-center"><img src="{{ asset('assets/img/icons/armoirie-bf.png') }}" alt="Armoirie BF" width="24" />
              <p class="logo-text ms-2 d-none d-sm-block">Facture individuelle de soins gratuité (<b style="color: #004ebc">{{$structure->nom_structure}}</b>)</p>
            </div>
          </div>
        </a>
      </div>
      <ul class="navbar-nav navbar-nav-icons flex-row">
        <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-l ">
              <img class="rounded-circle " src="{{ asset('assets/img/team/40x40/57.webp') }}" alt="" style="width: 75%; height: 75%; margin-top: 0.3rem;" />

            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
            <div class="card position-relative border-0">
              <div class="card-body p-0">
                <div class="text-center pt-4 pb-3">
                  <div class="avatar avatar-xl ">
                    <img class="rounded-circle " src="{{ asset('assets/img/team/72x72/57.webp') }}" alt="" />

                  </div>
                  <h6 class="mt-2 text-black">
                    @auth
                    {{ Auth::user()->name }}
                    @endauth

                  </h6>
                </div>
              </div>
              {{-- <div class="overflow-auto scrollbar" style="height: 10rem;">
                <ul class="nav d-flex flex-column mb-2 pb-1">
                  <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                  <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                  <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Journal</a></li>
                  <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                  <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Aide</a></li>
                </ul>
              </div> --}}
              <div class="card-footer p-0 border-top">
                <div class="px-3 py-3">
                    <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <span class="me-2" data-feather="log-out"> </span>Se déconnecter</a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                </div>
                <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Politique de confidentialité</a>&bull;<a class="text-600 mx-1" href="#!">Conditions d'utilisation</a></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
