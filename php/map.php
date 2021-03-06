<?php
    $louis="ll";
    $request="SELECT * FROM `trips` WHERE `idUser`="."0";
    $result = mysqli_query($connexion, $request); 
    foreach($result as $value){
        print_r($value);
        $requestFirst="SELECT * FROM `stations` WHERE `id`=".$value["idFirstStation"];
        $resultFirst = mysqli_query($connexion, $requestFirst); 
        foreach ($resultFirst as $valueFirst){
            echo("<link rel='stylesheet' href='css/map.css'>
            ");
            echo("
                <div id='mapRail'></div>
                <script src='https://unpkg.com/leaflet@1.5.1/dist/leaflet.js' integrity='sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==' crossorigin=''></script>
                <script type='text/javascript' src='js/map.js'></script>
                <script>
                    var stations = {
                        'Paris': { 'lat': 48.852969, 'lon': 2.349903 },
                        'Brest': { 'lat': 48.383, 'lon': -4.500 },
                        'Quimper': { 'lat': 48.000, 'lon': -4.100 },
                        'Bayonne': { 'lat': 43.500, 'lon': -1.467 }
                    };
                    var latlngs = [
                        [45.51, -122.68],
                        [37.77, -122.43],
                        [34.04, -118.2]
                        ];
                    var map = L.map('mapRail').setView([0, 0], 1);
                        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                                // Il est toujours bien de laisser le lien vers la source des données
                                attribution: 'données © <a href='//osm.org/copyright'>OpenStreetMap</a>/ODbL - rendu <a href='//openstreetmap.fr'>OSM France</a>',
                                minZoom: 1,
                                maxZoom: 20
                            }).addTo(map);
                    var openrailwaymap = new L.TileLayer('http://{s}.tiles.openrailwaymap.org/standard/{z}/{x}/{y}.png',
                        {
                        attribution: '<a href='https://www.openstreetmap.org/copyright'>© OpenStreetMap contributors</a>, Style: <a href='http://creativecommons.org/licenses/by-sa/2.0/'>CC-BY-SA 2.0</a> <a href='http://www.openrailwaymap.org/'>OpenRailwayMap</a> and OpenStreetMap',
                        minZoom: 1,
                        maxZoom: 20,
                        tileSize: 256
                        }).addTo(map);
                        drawMarker(stations);
                        drawPath(latlngs);
                </script>
            
            ");
        };
    };
?>