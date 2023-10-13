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
            $("#mise_observation").click(function(){
                if( $("#mise_observation").is(':checked') ){
                    document.getElementById("show_observation_montant").style.display = "block";
                }else{
                    document.getElementById("show_observation_montant").style.display = "none";
                }
            });

            // ENREGISTRER CONSULTATION
            $("#save-form").click(function(){
                var consultation_type = $('input[name="patient_type"]:checked').val();
                var cout_mise_en_observation = $("#observation_montant").val();
                var cout_tatol_equipement = $("#total_account_equipement").text();
                var cout_total_act = $("#total_account_acte").text();
                var cout_total_prod = $("#total_account_product").text();
                var registre_number = $("#registre_number").val();
                var serie_number = $("#serie_number").val();
                var consultation_date = $("#consultation_date").val();
                // var csps = $("#").val();
                // var district = $("#").val();
                // var drs = $("#").val();
                var liste_eq = $("#code_equipement").val();
                // var nomAgent = $("#").val();
                // var nomPatient = $("#").val();
                var num_ordonance = $("#ordonnance_number").val();
                // var qualification = $("#").val();
                // var screen_act_type = $("#").val();
                var liste_prod = $("#code_product").val();
                var liste_act = $("#code_acte").val();
                var quantity_prod = $("#quantity_product").val();
                var quantity_act = $("#quantity_acte").val();
                var quantity_eq = $("#quantity_equipement       ").val();
                var patient_id = $("#patient_id").val();
                var diagnostic = $("#diagnostic").val();
                // alert("submit success");
                $.ajax({
                        url: "{{ route('consultation.store') }}",
                        type: 'POST',
                        data: {"_token": "{{ csrf_token() }}", consultation_type:consultation_type, cout_mise_en_observation:cout_mise_en_observation, cout_tatol_equipement:cout_tatol_equipement, cout_total_act:cout_total_act, cout_total_prod:cout_total_prod, registre_number:registre_number, serie_number:serie_number, consultation_date:consultation_date, liste_eq:liste_eq, num_ordonance:num_ordonance, liste_prod:liste_prod, liste_act:liste_act, quantity_prod:quantity_prod, quantity_act:quantity_act, quantity_eq:quantity_eq, patient_id:patient_id, diagnostic:diagnostic},
                        error:function(){alert("Erreur");},
                        success: function () {
                            // location.reload();
                            document.location.href = "{{ route('app.consultation') }}";
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
                // alert(0);
                var idparent_val = $("#"+parent).val();
                // alert(idparent_val);
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
                        if(table == 'langue') {
                            var content = '';
                            for (var x = 0; x < data.length; x++) {
                                if(data[x]['id'] !='') {
                                    content += '<div class="radio-custom radio-primary"><input type="radio" id="'+data[x]['id']+'" name="langue[]" value="'+data[x]['id']+'"><label class="no-fw" for="'+data[x]['id']+'">'+data[x]['name']+'</label></div>';
                                }
                            }

                            $('#'+child).html(content);

                        }else{
                            var options = '<option value="" selected>--- Choisir une valeur </option>';
                            for (var x = 0; x < data.length; x++) {
                                if(data[x]['id'] !='') {
                                    options += '<option value="' + data[x]['id'] + '">' + data[x]['name'] + '</option>';
                                }
                            }
                            $('#'+child).html(options);
                        }

                    }
                });
            }
        /************ END SELECT CHARGEMENT SOUS TABLES **************************/
        var code_product = [], code_acte = [], code_equipement = [];
        var quantity_product = [], quantity_acte = [], quantity_equipement = [];
        var price_product = [], price_acte = [], price_equipement = [];
        var index_product = [], index_acte = [], index_equipement = [];
        var total_account = 0.0;
        function selectProduct(i, table){
            if( $("#check_"+table+i).is(':checked') ){

                $("#quantity_"+table+i).removeAttr("disabled");
                $("#price_"+table+i).attr("class", "badge badge-tag me-2 mb-2 bg-info color-info");
                $("#total_"+table+i).attr("class", "badge badge-tag me-2 mb-2 bg-info color-info");
                var productSelected = $("#check_"+table+i).val();
                var quantitySelected = $("#quantity_"+table+i).val();
                var priceSelected = $("#price_"+table+i).text();
                if(table == 'product'){
                    // alert(productSelected);
                    code_product[i] = productSelected;
                    quantity_product[i] = quantitySelected;
                    price_product[i] = priceSelected;
                    index_product.push(i);
                    $("#code_"+table).val(code_product);
                    $("#quantity_"+table).val(quantity_product);
                    $("#index_"+table).val(index_product);
                }else if(table == 'acte'){
                    code_acte[i] = productSelected;
                    quantity_acte[i] = quantitySelected;
                    price_acte[i] = priceSelected;
                    index_acte.push(i);
                    $("#code_"+table).val(code_acte);
                    $("#quantity_"+table).val(quantity_acte);
                    $("#index_"+table).val(index_acte);
                }else {
                    code_equipement[i] = productSelected;
                    quantity_equipement[i] = quantitySelected;
                    price_equipement[i] = priceSelected;
                    index_equipement.push(i);
                    $("#code_"+table).val(code_equipement);
                    $("#quantity_"+table).val(quantity_equipement);
                    $("#index_"+table).val(index_equipement);
                }

                // console.log(price);

                // product.push(productSelected);
                // quantity.push(quantitySelected);

                // console.log(product);
                // console.log(quantity);
                // alert(product.length);
                // alert("Checkbox Is checked");
            }
            else{
                $("#quantity_"+table+i).attr("disabled", "");
                $("#price_"+table+i).attr("class", "badge badge-tag me-2 mb-2");
                $("#total_"+table+i).attr("class", "badge badge-tag me-2 mb-2");
                if(table == 'product'){
                    code_product[i] = '';
                    quantity_product[i] = '';
                }else if(table == 'acte'){
                    code_acte[i] = '';
                    quantity_acte[i] = '';
                }else{
                    code_equipement[i] = '';
                    quantity_equipement[i] = '';
                }
                total_account = total_account - parseFloat( $("#total_"+table+i).text());
                $("#total_account_"+table).text(total_account);
                $("#total_"+table+i).text('0.00');
                $("#quantity_"+table+i).val(0);
                // alert("quantity"+i);
            }
        }



        function setPrice(i, table){
            var total = 0.0;

            // GET QUANTITY
            var quantity_price = $("#quantity_"+table+i).val();
            // var quantitySelected = $("#quantity_"+table+i).val();
            // GET PRIX UNITAIRE
            var price_pvp = $("#price_"+table+i).text();

            if(table == 'product'){
                quantity_product[i] = quantity_price
                $("#quantity_"+table).val(quantity_product);
            }else if(table == 'acte'){
                quantity_acte[i] = quantitySelected;
                $("#quantity_"+table).val(quantity_acte);
            }else{
                quantity_equipement[i] = quantitySelected;
                $("#quantity_"+table).val(quantity_equipement);
            }

            // console.log(quantity);
            // console.log(quantity);

            if(!quantity_price){
                // alert(quantity);
                $("#total_"+table+i).text(0);
            }else{
                total = parseFloat(quantity_price) * parseFloat(price_pvp);
                total_account = total_account + parseFloat(price_pvp);
                // alert($("#total_account_"+table).text());

                $("#total_account_"+table).text(total_account);
                // console.log(product_id_list);
                $("#total_"+table+i).text(total);
            }
            // console.log(quantity);

            // alert(total_account+' '+table);
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
                        $("#total_act").text(data.data.total_act+" FCFA");
                        $("#total_eq").text(data.data.total_eq+" FCFA");
                        $("#total_med").text(data.data.total_med+" FCFA");
                        $("#total_ev").text(data.data.total_ev+" FCFA");
                    }
            });

        }
    </script>

  </body>
</html>
