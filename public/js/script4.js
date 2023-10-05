/* ce script ajoute un marqueur quand on clique sur la carte, et mesure la distance
(C) Fabrice  Sincère ; version 2
*/

// INFRASTRUCTURES ZONE MOUSE OVER STYLE

function oneCSPSEacheFeature(feature, layer){
    layer.on({
        click : onPaysClick,
        click:onPaysClick

    });
}

// PAYS MOUSE CLICK
function onPaysClick(e){
var layer = e.target;
var region_id = layer.feature.properties.id;
var popupContent =
                    "<b style='color:#000; font-size:1.5rem;'>CSPS TENADO </b>" +
                    "<br>" +
                    "<p> Total des actes : "+ "<b>0.00 FCFA</b></p>" +
                    "<p> Total des équipements : "+ "<b>0.00 FCFA</b></p>" +
                    "<p> Total des médicaments : "+ "<b>0.00 FCFA</b></p>" +
                    "<p> Total des évacuations : "+ "<b>0.00 FCFA</b></p>" +
                    "<hr/>"+
                    "<p> Total : "+ "<b id='valeur'>0.00 FCFA</b></p>"+
                        "<p><a target = '_blank' href='#' style='padding: 0.3rem 1rem; border: 1px solid #004ebc; color:#004ebc; border-radius: 4px;'>Voir plus</a></p>" +
                    "<p>"+
                    "<small>Cliquer sur le lien pour voir plus</small></p>";
                    layer.bindPopup(popupContent).openPopup();

}

// CSPS MOUSE OVER STYLE
function onCSPSMouseOver(e){
    var layer = e.target;

    // SET STYLE
    layer.setStyle({
        weight:5,
        color:'black'
    });
    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }

    var popupContent =
                    "<b style='color:#000; font-size:1.5rem;'>Pays </b>" +
                    "<br>" +
                    "<p> Secteur : "+ "<b>"+data.secteur + "</b></p>" +
                    "<p> Sous secteur : "+ "<b>"+data.soussecteur + "</b></p>" +
                    "<p> Indicateur : "+ "<b>"+data.indicateur + "</b></p>" +
                    "<p> Nom : "+ "<b>BURKINA-FASO</b></p>"+
                    "<p> Valeur : "+ "<b id='valeur'>"+data.valeurindicateur + "</b></p>"+
                     "<p><a target = '_blank' href='{{ route('details.indicateur') }}?code="+code+"&id_indicateur="+id_indicateur+"&annee_ind="+annee_entite+"'>Voir plus</a></p>" +
                    "<p>"+
                    "<small>Cliquer sur la région pour afficher ses provinces</small></p>";
                    layer.bindPopup(popupContent).openPopup();

}

// ZONE STYLE
function zoneStyle(feature) {
    return {
        weight : 2,
        opacity : 1,
        color: 'black',
        fillColor : 'yellow',
        dashArray : 3,
        fillOpacity : 0.2
    };
}

// SET ICON FOR MARKET INFRASTRUCTURE
function createMarketIcon (feature, latlng) {
    let myIcon = L.icon(
    {
      iconUrl: 'js/map-icon.png',
      shadowUrl: '',
      iconSize:     [30, 25], // width and height of the image in pixels
      shadowSize:   [35, 20], // width, height of optional shadow image
      iconAnchor:   [12, 12], // point of the icon which will correspond to marker's location
      shadowAnchor: [12, 6],  // anchor point of the shadow. should be offset
      popupAnchor:  [10, 10] // point from which the popup should open relative to the iconAnchor
    })
    return L.marker(latlng, { icon: myIcon })
              .bindPopup('Ouagadougou')
              .openPopup();

  }

  // REGIONS CATEGORIE INFRASTRUCTURE LAYER
  function oneRegionCategorieInfraEacheFeature(feature, layer){

    layer.on({
        click :onInfrastructureMouseOver,
    });
}

// INFRASTRUCTURES ZONE MOUSE OVER STYLE
function onInfrastructureMouseOver(e){
    var layer = e.target;

    var annee_infrastructure = $("#annee_infrastructure").val();
    var code_localite_infrastructure = layer.feature.properties.code;


    // SET URL
    var url_valeur = '/';

    $.ajax({
        url:url_valeur,
        type:'GET',
        data:{ code_localite_infrastructure:code_localite_infrastructure, annee_infrastructure:annee_infrastructure},
        dataType:'json',
        error:function(){
            alert("ERROR");
        },
        success:function(data){

            var popupContent =
            "<b style='color:#000; font-size:1.5rem;'>Infrastructure </b>" +
                    "<br>" +
                    "<p> Catégorie : "+ "<b>"+data.categorie + "</b></p>" +
                    "<p> Sous categorie : "+ "<b>"+data.souscategorie + "</b></p>" +
                    "<p> Infrastructure : "+ "<b>"+data.infrastructure + "</b></p>" +
                    "<p><a target = '_blank' href='{{ route('details.infrastructure') }}?code="+code_localite_infrastructure+"&id_infrastructure="+layer.feature.properties.id+"&annee_inf="+annee_infrastructure+"'>Voir plus</a></p>";
            layer.bindPopup(popupContent).openPopup();
        }
    });
}



var map = L.map('map');
var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
// var osmUrl = '"https://api.mapbox.com/styles/v1/schwarzdesign/{STYLE_ID}/tiles/256/{z}/{x}/{y}@2x?access_token={TOKEN}"';
var osmAttrib = 'Map data © OpenStreetMap contributors';
var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
map.setView([12.3603119,-1.5163034], 9);
map.addLayer(osm);
document.getElementById("loader_map").style.display = "block";

$.ajax({
    url:'/jsondata',
    type:'GET',
    dataType:'json',
    error:function(){
        alert("ERROR");
    },
    success:function(data){
        // pays = JSON.parse(data.datajson.pays);
        localites = data.region;
        orgUnits = JSON.parse(data.org_unit);

        // SET DATA REGION TO MAP
        var localite = L.geoJson(localites,{
            style:zoneStyle,
            onEachFeature : oneCSPSEacheFeature
        }).addTo(map);
        var orgUnits = L.geoJson(orgUnits,{
            pointToLayer: createMarketIcon,
            onEachFeature : oneRegionCategorieInfraEacheFeature


        }).addTo(map);
        document.getElementById("loader_map").style.display = "none";
        // L.marker([11.192381, -4.301272], [12.345785, -1.52309]).addTo(map).openPopup();



        // SET DATA YORO TO MAP
        // var leyoros = L.geoJson(yoros,{
            // pointToLayer: createMarketIcon,
            // onEachFeature : oneYoroEacheFeature
        // }).addTo(map);
    }
});

