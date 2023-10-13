<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>FACTURE DE SOINS GRATUITE</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icons/armoirie-bf.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/icons/armoirie-bf.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/img/favicons/favicon-16x16.png">
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
    <link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
    <link href="{{ asset('leaflet/leaflet.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
    @yield('css')
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
  <style>
    .load_map {
        background:url('/assets/img/ajax-loader.gif') 50% 50% no-repeat rgba(255, 255, 255, 0.8);
        cursor:wait;
        height:34rem;
        position: fixed;
        width:76%;
        z-index:9999;
    }
  </style>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <nav class="navbar navbar-vertical navbar-expand-lg">
          <script>
            var navbarStyle = window.config.config.phoenixNavbarStyle;
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          @include('layouts.nav')
        </nav>
        @include('layouts.header')
        <div class="content bg-white" style="padding-top: 3.2rem;">
          @yield('content')
          <footer class="footer position-absolute">
            <div class="row g-0 justify-content-between align-items-center h-100">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 mt-2 mt-sm-0 text-900"><small> Tous droits reservés<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;<a class="mx-1" href="#">FEUILLE DE SOINS</a> Ministère de la santé et de l'hygiène publique. BF</small></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600"><small class="text-700">v1.0</small></p>
              </div>
            </div>
          </footer>
        </div>
      </div>

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <script>
            window.onload = function() {
                // dropzoneFormis the configuration for the element that has an id attribute
                // with the value dropzone-form (or dropzoneForm)
                //initialize the dropzone;
                Dropzone.options.dropzoneForm = {
                        autoProcessQueue: 'your value',
                        acceptedFiles: 'your value',
                        maxFilesize: 'your value',
                        init: function() {
                        myDropzone = this;

                        this.on('addedfile', function(file) {
                            //todo...something...
                        });
                        //catch other events here...
                        }
                };

                getStat();
            };

            document.addEventListener("DOMContentLoaded", function() {
                Dropzone.options.dropzone = {
                    url: "/admin/update-product",
                    method: "POST",
                    maxFilesize: 2, // 2 MB
                    paramName: "file",
                    uploadMultiple: true,
                    acceptedFiles: ".jpeg,.jpg,.png,.pdf", // Allowed extensions
                    success: function(file, response){ // Dropzone upload response
                        var jsonObj = JSON.parse(response);
                        alert(jsonObj);
                        if(jsonObj.status == 0){
                                alert(jsonObj.msg);
                        }
                    }
            };
            });

    </script>



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/phoenix.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARdVcREeBK44lIWnv5-iPijKqvlSAVwbw&callback=revenueMapInit" async></script>
    <script src="{{ asset('assets/js/ecommerce-dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('js/script4.js') }}"></script>

    <script>
        $(function(){
            // CHECK ORDONNANCE NUMBER
            $("#check-odonnance").click(function(){
                var ordonnance_id = $("#ordonnance_id").val();
                $.ajax({
                        url: "{{ route('ordonnance.check') }}",
                        type: 'GET',
                        data: {numero: ordonnance_id},
                        error:function(data){alert("Erreur");},
                        success: function (response) {
                            $("#products").html(response);
                        }
                    });
            });

            // CHECK MISE OBSERVATION
            $('input[name="type_observation"]').click(function(){
                var type_observation = $('input[name="type_observation"]:checked').val();
                if(type_observation != "ambulatoire"){
                    document.getElementById("show_mise_observation").style.display = "block";
                }
                else{
                    document.getElementById("show_mise_observation").style.display = "none";
                }
            });

            // CHECK EVACUATION
            $("#evacuation_patient").click(function(){
                if( $("#evacuation_patient").is(':checked') ){
                    document.getElementById("show_evacuation_montant").style.display = "block";
                }else{
                    document.getElementById("show_evacuation_montant").style.display = "none";
                }
            });

            // ENREGISTRER CONSULTATION
            $("#save-form").click(function(){
                // GENERAL
                var nom_patient = $("#nom_patient").val();
                var village_patient = $("#village_patient").val();
                var distance_village_patient = $("#distance_village_patient").val();
                var age = $("#age").val();
                var birth_date_item = $('input[name="birth_date_item"]:checked').val();
                var sexe_patient = $('input[name="sexe_patient"]:checked').val();
                var parent_patient = $("#parent_patient").val();
                var num_telephone = $("#num_telephone").val();
                var consultation_date = $("#consultation_date").val();
                var serie_number = $("#serie_number").val();
                var registre_number = $("#registre_number").val();
                var patient_type = $('input[name="patient_type"]:checked').val();
                var type_prestation = $("#type_prestation").val();

                // PRODUCT
                var liste_prod = $("#code_product").val();
                var quantity_prod = $("#quantity_product").val();
                var montant_prod = $("#amount_product").val();
                var cout_total_prod = $("#total_account_product").text();

                // ACTE
                var liste_act = $("#code_acte").val();
                var quantity_act = $("#quantity_acte").val();
                var montant_act = $("#amount_acte").val();
                var cout_total_act = $("#total_account_acte").text();

                // EXAMEN
                var liste_ex = $("#code_examen").val();
                var quantity_ex = $("#quantity_examen").val();
                var montant_ex = $("#amount_examen").val();
                var cout_total_ex = $("#total_account_examen").text();

                // OBSERVATION
                var type_observation = $('input[name="type_observation"]:checked').val();
                var nbre_jours = $("#nbre_jours").val();
                var cout_mise_en_observation = $("#observation_montant").val();

                // EVACUATION
                var cout_evacuation = $("#evacuation_montant").val();

                // GERANT / PRESCRIPTEUR
                var name_prescripteur = $("#name_prescripteur").val();
                var contact_prescripteur = $("#contact_prescripteur").val();
                var qualification_prescripteur = $("#qualification_prescripteur").val();
                var name_gerant = $("#name_gerant").val();
                var contact_gerant = $("#contact_gerant").val();

                // alert("submit success");
                $.ajax({
                        url: "{{ route('factures.store') }}",
                        type: 'POST',
                        data: {"_token": "{{ csrf_token() }}",
                            // GENERAL
                            nom_patient:nom_patient, village_patient:village_patient, distance_village_patient:distance_village_patient, age:age, birth_date_item:birth_date_item,
                            sexe_patient:sexe_patient, parent_patient:parent_patient, num_telephone:num_telephone, consultation_date:consultation_date,
                            serie_number:serie_number, registre_number:registre_number, patient_type:patient_type, type_prestation:type_prestation,
                            // PRODUCT
                            liste_prod:liste_prod, quantity_prod:quantity_prod, montant_prod:montant_prod, cout_total_prod:cout_total_prod,
                            // ACTE
                            liste_act:liste_act, quantity_act:quantity_act, montant_act:montant_act, cout_total_act:cout_total_act,
                            // EXAMEN
                            liste_ex:liste_ex, quantity_ex:quantity_ex, montant_ex:montant_ex, cout_total_ex:cout_total_ex,
                            // OBSERVATION
                            type_observation:type_observation, nbre_jours:nbre_jours, cout_mise_en_observation:cout_mise_en_observation,
                            // EVACUATION
                            cout_evacuation:cout_evacuation,
                            // GERANT / PRESCRIPTEUR
                            name_prescripteur:name_prescripteur, contact_prescripteur:contact_prescripteur, qualification_prescripteur:qualification_prescripteur, name_gerant:name_gerant, contact_gerant:contact_gerant
                        },
                        error:function(){alert("Erreur");},
                        success: function () {
                            // location.reload();
                            document.location.href = "{{ route('app.factures') }}";
                        }
                });
            });

            // DISPENSATION
            $("#add-dispensation").click(function(){
                var numero = $("#ordonnance_id").val();
                var date_dispensation = $("#consultation_date_product").val();
                // alert(date_dispensation);
                var liste_prod = $("#code_product").val();
                var quantity_prod = $("#quantity_product").val();
                $.ajax({
                        url: "{{ route('ordonnance.save') }}",
                        type: 'POST',
                        data: {"_token": "{{ csrf_token() }}", numero:numero, date_dispensation:date_dispensation, liste_prod:liste_prod, quantity_prod:quantity_prod },
                        error:function(data){
                            alert((data.responseJSON.errors.date_dispensation)[0]);
                        },
                        success: function () {
                            // location.reload();
                            document.location.href = "{{ route('esoins.dispensation') }}";
                        }
                });
                // alert('test');
            });

            // DATA FILTER
            $("#data_filter").click(function(){
                var id_drs_filtre = $("#id_drs_filtre").val();
                var id_district_filtre = $("#id_district_filtre").val();
                var id_csps_filtre = $("#id_csps_filtre").val();
                $.ajax({
                        url: "{{ route('data.filter') }}",
                        type: 'POST',
                        data: {"_token": "{{ csrf_token() }}", id_drs_filtre:id_drs_filtre, id_district_filtre:id_district_filtre, id_csps_filtre:id_csps_filtre },
                        error:function(data){
                            alert("Erreur");
                        },
                        success: function (data_filtre) {
                            // location.reload();
                            $("#total_act").text(data_filtre.data.total_act+" FCFA");
                            $("#total_eq").text(data_filtre.data.total_eq+" FCFA");
                            $("#total_med").text(data_filtre.data.total_med+" FCFA");
                            $("#total_ev").text(data_filtre.data.total_ev+" FCFA");
                            $("#org_unit_name").text(data_filtre.data.org_unit_name);
                            document.getElementById("org_unit_name").style.display = "block";
                        }
                });
            });
        });







        /************ BEGIN SELECT CHARGEMENT SOUS TABLES **************************/
            // Région
            function changeValue(parent, child, table_item)
            {

                var idparent_val = $("#"+parent).val();
                var table = table_item;

                var url = '{{ route('root.selection') }}';

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {idparent_val: idparent_val, table:table},
                    dataType: 'json',
                    error:function(data){alert("Erreur");},
                    success: function (data) {
                        var data = data.data;
                        var options = '<option value="" selected disabled>--- Choisir une valeur ---</option>';
                        for (var x = 0; x < data.length; x++) {
                            if(data[x]['id'] !='') {
                                options += '<option value="' + data[x]['id'] + '">' + data[x]['name'] + '</option>';
                            }
                        }
                        $('#'+child).html(options);
                    }
                });
            }
        /************ END SELECT CHARGEMENT SOUS TABLES **************************/
        var code_product = [], code_acte = [], code_examen = [];
        var quantity_product = [], quantity_acte = [], quantity_examen = [];
        var amount_product = [], amount_acte = [], amount_examen = [];
        var last_amount_product = [], last_amount_acte = [], last_amount_examen = [];

        var index_product = [], index_acte = [], index_examen = [];

        var total_account_prod = 0.0;
        var total_account_act = 0.0;
        var total_account_ex = 0.0;

        var last_amount = 0;

        function selectProduct(i, table){
            if( $("#check_"+table+i).is(':checked') ){

                $("#quantity_"+table+i).removeAttr("disabled");
                $("#amount_"+table+i).removeAttr("disabled");

                var productSelected = $("#check_"+table+i).val();
                var quantitySelected = $("#quantity_"+table+i).val();
                var userPriceSelected = $("#amount_"+table+i).val();

                if(table == 'product'){
                    code_product[i] = productSelected;
                    quantity_product[i] = quantitySelected;
                    amount_product[i] = userPriceSelected;
                    index_product.push(i);

                    $("#code_"+table).val(code_product);
                    $("#quantity_"+table).val(quantity_product);
                    $("#amount_"+table).val(amount_product);
                    $("#index_"+table).val(index_product);
                }
                else if(table == 'acte'){
                    code_acte[i] = productSelected;
                    quantity_acte[i] = quantitySelected;
                    amount_acte[i] = userPriceSelected;
                    index_acte.push(i);

                    $("#code_"+table).val(code_acte);
                    $("#quantity_"+table).val(quantity_acte);
                    $("#amount_"+table).val(amount_acte);
                    $("#index_"+table).val(index_acte);
                }
                else {
                    code_examen[i] = productSelected;
                    quantity_examen[i] = quantitySelected;
                    amount_examen[i] = userPriceSelected;
                    index_examen.push(i);

                    $("#code_"+table).val(code_examen);
                    $("#quantity_"+table).val(quantity_examen);
                    $("#amount_"+table).val(amount_examen);
                    $("#index_"+table).val(index_examen);
                }
            }
            else{
                $('#check_'+table+i).removeAttr("checked");
                $("#quantity_"+table+i).attr("disabled", "");
                $("#amount_"+table+i).attr("disabled", "");

                if(table == 'product'){
                    code_product[i] = '';
                    quantity_product[i] = '';
                    amount_product[i] = '';
                    last_amount = last_amount_product[i] ? last_amount_product[i] : 0;
                    total_account_prod = total_account_prod - parseFloat(last_amount);
                    last_amount_product[i] = 0;
                    $("#quantity_"+table+i).val(0);
                    $("#amount_"+table+i).val(0);
                    $("#total_account_"+table).text(total_account_prod);
                }
                else if(table == 'acte'){
                    code_acte[i] = '';
                    quantity_acte[i] = '';
                    amount_acte[i] = '';
                    last_amount = last_amount_acte[i] ? last_amount_acte[i] : 0;
                    total_account_act = total_account_act - parseFloat(last_amount);
                    last_amount_acte[i] = 0;
                    $("#quantity_"+table+i).val(0);
                    $("#amount_"+table+i).val(0);
                    $("#total_account_"+table).text(total_account_act);
                }
                else{
                    code_examen[i] = '';
                    quantity_examen[i] = '';
                    amount_examen[i] = '';
                    last_amount = last_amount_examen[i] ? last_amount_examen[i] : 0;
                    total_account_ex = total_account_ex - parseFloat(last_amount);
                    last_amount_examen[i] = 0;
                    $("#quantity_"+table+i).val(0);
                    $("#amount_"+table+i).val(0);
                    $("#total_account_"+table).text(total_account_ex);
                }
            }
        }

        function setQuantity(i, table){
            var quantity_price = $("#quantity_"+table+i).val() =='' ? 0 : $("#quantity_"+table+i).val();

            if(table == 'product'){
                quantity_product[i] = quantity_price;
                $("#quantity_"+table).val(quantity_product);
            }
            else if(table == 'acte'){
                quantity_acte[i] = quantity_price;
                $("#quantity_"+table).val(quantity_acte);
            }
            else{
                quantity_examen[i] = quantity_price;
                $("#quantity_"+table).val(quantity_examen);
            }
        }

        function setPrice(i, table){
            var total = 0.0;
            var last_amount = 0;
            var amount_price = $("#amount_"+table+i).val() =='' ? 0 : $("#amount_"+table+i).val();
            var quantity_price = $("#quantity_"+table+i).val() =='' ? 0 : $("#quantity_"+table+i).val();

            if(table == 'product'){
                quantity_product[i] = quantity_price;
                amount_product[i] = amount_price;
                if(amount_product != last_amount_product[i]){
                    last_amount = last_amount_product[i] ? last_amount_product[i] : 0;
                    total_account_prod = total_account_prod - parseFloat(last_amount) + parseFloat(amount_price);
                }
                last_amount_product[i] = parseFloat(amount_price);
                $("#quantity_"+table).val(quantity_product);
                $("#amount_"+table).val(amount_product);
                $("#total_account_"+table).text(total_account_prod);
            }
            else if(table == 'acte'){
                quantity_acte[i] = quantity_price;
                amount_acte[i] = amount_price;
                if(amount_acte != last_amount_acte[i]){
                    last_amount = last_amount_acte[i] ? last_amount_acte[i] : 0;
                    total_account_act = total_account_act - parseFloat(last_amount) + parseFloat(amount_price);
                }
                last_amount_acte[i] = parseFloat(amount_price);
                $("#quantity_"+table).val(quantity_acte);
                $("#amount_"+table).val(amount_acte);
                $("#total_account_"+table).text(total_account_act);
            }
            else{
                quantity_examen[i] = quantity_price;
                amount_examen[i] = amount_price;
                if(amount_examen != last_amount_examen[i]){
                    last_amount = last_amount_examen[i] ? last_amount_examen[i] : 0;
                    total_account_ex = total_account_ex - parseFloat(last_amount) + parseFloat(amount_price);
                }
                last_amount_examen[i] = parseFloat(amount_price);
                $("#quantity_"+table).val(quantity_examen);
                $("#amount_"+table).val(amount_examen);
                $("#total_account_"+table).text(total_account_ex);
            }
        }

        function afficheForm(form_area, display_area){
            var form_area_value = $('input[name="'+form_area+'"]:checked').val();
            if( $('input[name="'+form_area+'"]').is(':checked') ){
                document.getElementById(display_area).style.display = "block";

                if(display_area == 'know_birth_date'){
                    document.getElementById('unknow_birth_date').style.display = "none";
                }else if(display_area == 'unknow_birth_date'){
                    document.getElementById('know_birth_date').style.display = "none";
                }
            }else{
                document.getElementById(display_area).style.display = "none";

            }

            if(form_area == 'phone_number'){
                if(form_area_value == 'yes'){
                    document.getElementById(display_area).style.display = "block";
                }else{
                    document.getElementById(display_area).style.display = "none";
                }
            }

            // alert(form_area_value);
        }

        function getStat(){
            var url_stat = "{{ route('data.stat') }}";
            $.ajax({
                    url: url_stat,
                    type: 'GET',
                    dataType: 'json',
                    error:function(data){alert("Erreur");},
                    success: function (data) {
                        $("#total_med").text(data.data.total_med + " FCFA");
                        $("#total_act").text(data.data.total_act + " FCFA");
                        $("#total_ex").text(data.data.total_eq + " FCFA");
                        $("#total_obs").text(data.data.total_obs + " FCFA");
                        $("#total_ev").text(data.data.total_ev + " FCFA");
                    }
            });

        }

        function calculMontantObservation(){
            var montant_observation = 0;
            var type_observation = $('input[name="type_observation"]:checked').val();
            var nombre_jours = $("#nbre_jours").val();
            if( type_observation == 'observation' ){
                montant_observation = 100;
            }else{
                montant_observation = 500;
            }
            if(nombre_jours !=''){
                $("#observation_montant").val(parseInt(nombre_jours)*parseInt(montant_observation));
            }else{
                $("#observation_montant").val(0);
            }

        }
    </script>
    @yield('script')
  </body>
</html>
