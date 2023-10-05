function go() {

    /// Création de la carte
    /*var map = L.map('map', {
        crs : L.geoportalCRS.EPSG2154
    }).setView([48, 2], 10);

    // Création de la couche
    var lyr = L.geoportalLayer.WMTS({
        layer  : "GEOGRAPHICALGRIDSYSTEMS.PLANIGNV2.L93"
    }) ;

    lyr.addTo(map); // ou map.addLayer(lyr);*/

    map = L.map("map").setView([11.905720, -1.293255], 7);
    var lyrMaps = L.geoportalLayer.WMTS({
        layer: "GEOGRAPHICALGRIDSYSTEMS.PLANIGNV2",
    }, { // leafletParams
        opacity: 0.7
    });
    map.addLayer(lyrMaps) ;
    var routeCtrl = L.geoportalControl.Route({
    });
	map.addControl(routeCtrl);

}

Gp.Services.getConfig({
    apiKey : "cartes,calcul",
    onSuccess : go
}) ;

var infoDiv= document.getElementById("info") ;
infoDiv.innerHTML= "<p> Extension Leaflet version "+Gp.leafletExtVersion+" ("+Gp.leafletExtDate+")</p>";