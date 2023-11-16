<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>FEUILLE DE SOINS</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/img/icons/armoirie-bf.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/img/icons/armoirie-bf.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/img/icons/armoirie-bf.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="{{ asset('/assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('/assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('/assets/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('/assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <div class="container-fluid">
          <div class="bg-holder bg-auth-card-overlay" style="background-image:url({{ asset('/assets/img/bg/37.png)') }};">
          </div>
          <!--/.bg-holder-->

          <div class="row flex-center position-relative min-vh-100 g-0 py-5">
            <div class="col-11 col-sm-10 col-xl-8">
              <div class="card border border-300 auth-card">
                <div class="card-body pe-md-0">
                  <div class="row align-items-center gx-0 gy-7">
                    <div class="col-auto bg-100 dark__bg-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                      <div class="bg-holder" style="background-image:url({{ asset('/assets/img/bg/38.png)') }};">
                      </div>
                      <!--/.bg-holder-->

                      <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                        <h3 class="mb-3 text-black fs-1 text-uppercase">Factures de soins gratuité</h3>
                        <p class="text-700">Valeurs financières des biens et services gratuité</p>
                        <ul class="list-unstyled mb-0 w-max-content w-md-auto mx-auto">
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Médicaments et consommables</span></li>
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Actes</span></li>
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Examens</span></li>
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Mise en observation</span></li>
                          <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-700 fw-semi-bold">Évacuations sanitaires</span></li>
                        </ul>
                      </div>
                      <div class="position-relative z-index--1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="{{ asset('/assets/img/spot-illustrations/15.png') }}" alt="" /><img class="auth-title-box-img d-light-none" src="../../../assets/img/spot-illustrations/auth-dark.png" alt="" /></div>
                    </div>
                    <div class="col mx-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="auth-form-box">
                                <div class="text-center mb-7"><a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
                                    <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{{ asset('/assets/img/icons/armoirie-bf.png') }}" alt="MSHP" width="58" />
                                    </div>
                                </a>
                                <h3 class="text-1000">Espace de connexion</h3>
                                <p class="text-700">Se connecter à votre profil.</p>
                                </div>
                                @if(Session::has('error'))
                                    <div class="alert alert-soft-warning" role="alert">{{ session::get('error') }}</div>
                                @endif
                                <div class="position-relative">
                                <hr class="bg-200 mt-5 mb-4" />
                                <div class="divider-content-center bg-white">Entrer email et mot de passe</div>
                                </div>
                                <div class="mb-3 text-start">
                                <label class="form-label" for="email">Addresse Email</label>
                                <div class="form-icon-container">
                                    <input class="form-control form-icon-input" name="email" id="email" type="email" placeholder="name@example.com" /><span class="fas fa-user text-900 fs--1 form-icon"></span>
                                </div>
                                </div>
                                <div class="mb-3 text-start">
                                <label class="form-label" for="password">Mot de Passe</label>
                                <div class="form-icon-container">
                                    <input class="form-control form-icon-input" name="password" id="password" type="password" placeholder="********" /><span class="fas fa-key text-900 fs--1 form-icon"></span>
                                </div>
                                </div>
                                <div class="row flex-between-center mb-7">
                                <div class="col-auto">
                                    <div class="form-check mb-0">
                                    <input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked" />
                                    <label class="form-check-label mb-0" for="basic-checkbox">Se souvenir de moi ?</label>
                                    </div>
                                </div>
                                <div class="col-auto"><a class="fs--1 fw-semi-bold" href="../../../pages/authentication/card/forgot-password.html">Mot de passe oublié?</a></div>
                                </div>
                                <button class="btn btn-primary w-100 mb-3" type="submit">Se connecter</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
          navbarTop.classList.add('navbar-darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVertical && navbarVerticalStyle === 'darker') {
          navbarVertical.classList.add('navbar-darker');
        }
      </script>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('/assets/js/phoenix.js') }}"></script>

  </body>

</html>
