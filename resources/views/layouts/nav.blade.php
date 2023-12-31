<nav class="navbar navbar-vertical navbar-expand-lg" style="top: 2rem; background-color: #ededec; height: 100vh; border-right:0;">
    <script>
      var navbarStyle = window.config.config.phoenixNavbarStyle;
      if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
      }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
      <!-- scrollbar removed-->
      <div class="navbar-vertical-content h-100">
        <ul class="navbar-nav flex-column" id="navbarVerticalNav">
          <li class="nav-item">
            <!-- label-->
            <p class="navbar-vertical-label" style="margin-top:0.5rem;">Application
            </p>
            <hr class="navbar-vertical-line" />

            <!-- parent pages-->
            <div class="nav-item-wrapper @yield('dashboard')"><a class="nav-link label-1 @yield('dashboard')" href="{{ route('home') }}" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="home"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Dashboard</span></span>
                </div>
              </a>
            </div>

            <!-- parent pages-->
            <div class="nav-item-wrapper @yield('factures')"><a class="nav-link label-1 @yield('factures')" href="{{ route('app.factures') }}" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="user-plus"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Factures</span></span>
                </div>
              </a>
            </div>
          </li>
          @if(route('home') == url()->current())
          @if($structure->level_structure != env("LEVEL_FS") && $structure->level_structure != env("LEVEL_FS_CM") && $structure->level_structure != env("LEVEL_FS_CMA") && $structure->level_structure != env("LEVEL_TEST"))
          <div class="form m-4 p-2 bg-white rounded-2" style="border: 1px solid #ccc;">
            @if($structure->level_structure == env("LEVEL_NATIONAL"))
            <select class="form-select select_drs" id="id_drs_filtre" name="id_drs_filtre" disabled onchange="onChangeFilterValue('id_drs_filtre', 'id_district_filtre', 'structure');">
                <option value="">DRS...</option>
            </select>
            @endif
            @if($structure->level_structure == env("LEVEL_NATIONAL") || $structure->level_structure == env("LEVEL_DRS"))
            <select class="form-select mt-2 select_district" id="id_district_filtre" name="id_district_filtre" disabled onchange="onChangeFilterValue('id_district_filtre', 'id_csps_filtre', 'structure');">
                <option value="">District...</option>
            </select>
            @endif
            <select class="form-select mt-2 select_csps" id="id_csps_filtre" disabled name="id_csps_filtre">
                <option value="">FS...</option>
            </select>
          </div>
          @endif
          <div class="form m-4 mt-0 p-2 bg-white rounded-2" style="border: 1px solid #ccc;">
            <div class="mb-2">
                <input class="form-control form-control-sm" id="periode_debut" type="date" placeholder=".form-control-sm" />
              </div>
              <div class="mb-0">
                <input class="form-control form-control-sm" id="periode_fin" type="date" placeholder=".form-control-sm" />
              </div>
          </div>
          <div class="d-grid gap-2 ms-4 me-4">
            <button class="btn btn-outline-primary btn-block btn-sm" id="data_filter"><span data-feather="filter" class="me-1" style="font-size: 12px"></span>Filtrer</button>
          </div>
          @endif
          @if($structure->level_structure == env("LEVEL_NATIONAL"))
          <li class="nav-item">
            <!-- label-->
            <p class="navbar-vertical-label">Administration
            </p>
            <hr class="navbar-vertical-line" />
            <!-- parent pages-->

            <div class="nav-item-wrapper @yield('user')"><a class="nav-link label-1 @yield('user')" href="{{ route('users.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="user"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Utilisateurs</span></span>
                </div>
              </a>
            </div>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
