

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- load css leaflet -->
    <link rel="stylesheet" href="src/leaflet.css">
    <!-- load js leaflet -->
    <script src="src/leaflet.js"></script>
    <script src="geojson/Kecamatan.js" type="text/javascript"></script>
    <style>
        body,html{
            padding: 0px;
            margin: 0px;
            height: 100%;
            width: 100%;
        }
        #MiniMap{
            height: 600px;
            width: 1200px;
        }
        .leaflet-popup-content {
            width:auto !important;
        }
    </style>
	
</head>
<body>

<div id='maps'></div>
<div id="MiniMap"></div>


    <script>
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + 
                 ' &copy; <a href="https://www.jihadul4kbar.github.io/">Jihadul Akbar</a>',
        mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamloYWR1bDRrYmFyIiwiYSI6ImNqZ3lzOXpmaDA0bGQzMnJveGh5eW5lZjgifQ.IrFoCdc8VtGPQEzUFPqG_A';

    var streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr}),
        grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr});
        traffic = L.tileLayer(mbUrl, {id:'mapbox.mapbox-terrain-v2', attribution:mbAttr});
        jalanv8 = L.tileLayer(mbUrl, {id:'mapbox.mapbox-streets-v8', attribution:mbAttr});
        satellite = L.tileLayer(mbUrl, {id:'mapbox.satellite', attribution:mbAttr});



    var peta = L.map('MiniMap', {
        center: [-8.6873968, 116.2817962],
        zoom: 15,
        layers: [ streets]
    });
var mapIcon = L.Icon.extend({
        options: {
            iconSize:     [33, 38],
            iconAnchor:   [22, 94],
            popupAnchor:  [-5, -90] 
        }
        });

    kantorIcon = new mapIcon({iconUrl: 'icon/embassy.png'}),
    kesehatanIcon = new mapIcon({iconUrl: 'icon/hospital-building.png'}),
    tamanbermainIcon = new mapIcon({iconUrl: 'icon/playground.png'}),
    pemerintahIcon = new mapIcon({iconUrl: 'icon/temple-2.png'}),
    keamananIcon = new mapIcon({iconUrl: 'icon/police.png'}),
    wadukIcon = new mapIcon({iconUrl: 'icon/river-2.png'}),
    masjidikon = new mapIcon({iconUrl: 'icon/mosquee.png'}),
    pasarIconikon = new mapIcon({iconUrl: 'icon/market.png'}),
    sekolahIcon = new mapIcon({iconUrl: 'icon/school.png'});


var camat1 = L.marker([-8.6128812,116.3103311],{icon:kantorIcon}).addTo(map).bindPopup("Kantor Camat Batukliang <img src='img/batkel.png' alt='Kantor Camat Batukliang' width='350px'/>");

    

  var kantor1 =  L.marker([-8.6843534,116.2390449,],{icon:kantorIcon}).addTo(peta)
    .bindPopup('kantor desa puyung');

   var sekolah1 = L.marker([-8.6935363,116.2261791],{icon:sekolahIcon}).addTo(peta)
    .bindPopup('kantor desa Sukarara');

   var sekolah2=  L.marker([-8.6940218,116.2496392],{icon:sekolahIcon}).addTo(peta)
    .bindPopup('politehnik pariwisata lombk Tengah');

    var kantor2 =  L.marker([-8.6914459,116.249372],{icon:kantorIcon}).addTo(peta)
    .bindPopup('Kantor Bupati Lombk Tengah');

  var sekolah3= L.marker([-8.6903015,116.2458821],{icon:sekolahIcon}).addTo(peta)
    .bindPopup('ponpes jihadul ummah lombok tengah');

   var pasar1=  L.marker([-8.6936153,116.2253038],{icon: pasarIcon}).addTo(peta)
    .bindPopup('Pasar sukarara .<br> Lombok Tengah.');

   var pasar2 = L.marker([-8.6844086,116.2371805],{icon: pasarIcon}).addTo(peta)
    .bindPopup('Pasar puyung .<br> Lombok Tengah.');

    var mj1 = L.marker([-8.6898602,116.2463807],{icon: masjidIcon}).addTo(peta).bindPopup('Masjid waker .<br> Lombok Tengah.');
    var mj2 = L.marker([-8.6999617,116.2413753],{icon: masjidIcon}).addTo(peta).bindPopup('Masjid Alistiqomah Bangket tengak.<br> Lombok Tengah.');
    var mj3 = L.marker([-8.6838294,116.2375105],{icon: masjidIcon}).addTo(peta).bindPopup('Masjid jamiq alihlas puyung.<br> Lombok Tengah.');
    
    var sekolah = L.layerGroup([sekolah1, sekolah2, sekolah3]);
    var pasar =L.layerGroup([pasar1, pasar2]);
    var kantor = L.layerGroup([kantor1,kantor2]);
    var masjid = L.layerGroup([mj1, mj2, mj3]);

    
    var baseLayers = {
        "Jalan": streets,
        "Hitam Putih": grayscale,
        "Trapik": traffic,
        "Jalanv8": jalanv8,
        "Satellite": satellite,
        
    };
    var overlays = {
        "Masjid": masjid,
        "Kantor Camat": camat,
        "taman " : taman,
        "waduk ": waduk,
        "Rumah Sakit" : kesehatan,
        "Kantor Keamanan": keamanan,
        
    };

    L.control.layers(baseLayers,overlays).addTo(peta);

    

    L.geoJSON([puyung], {
		style: function (feature) {
			return feature.properties && feature.properties.style;
		}
	}).addTo(peta);
    </script>



</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel-gis-web\resources\views/v_web.blade.php ENDPATH**/ ?>