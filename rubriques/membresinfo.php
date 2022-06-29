<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membres Info</title>
    <link rel="stylesheet" href="../content/membresinfo.css" />
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="aos-by-red.css">
   
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
</head>

<body>

    <nav>
        <a href="accueil.html" class="logo"><img src="img/Logo-GFC-Pharma.jpg" width="100" height="70"></a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars bars"></i>
        </label>

        <ul class="menu">
            <li> <a href="accueil.html">ACCUEIL</a></li>
            <li> <a href="contact.html">CONTACT</a></li>
            <li> <a href="gfc.html">GFC PHARMA</a></li>
            <li> <a href="" class="aaa">ESPACE PHARMACIEN</a></li>
            <li> <a href="gestion.html" class="admin">ADMINISTRATION</a></li>
            <li> <a href="connect.html" class="btn">Se Déconnecter</a></li>
        </ul>
    </nav>

    <main class="main-content">
        <div class="membre-container">
            <div class="membre-content">
                <div class="left-membre">
                    <ul>
                        <li> <img src="img/6h-1_0.jpeg" alt="" class="profile"></li>
                        <li> <h3 class="nom-prenom">Jhon Jhon</h3></li>
                        <li> <span class="fonction">Pharmacien</span></li>
                        <li> <span class="adresse">350 5th Ave, New York, NY 10118</span></li>
                        <li> <span class="email">jhon_jhon@gmail.com</span></li>
                        <li>
                            <h2 class="description">Description</h2>
                        </li>
                        <li>
                            <p class="desctp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum beatae
                                voluptate vero accusantium praesentium tempore nisi, error ea aut, deleniti modi ut
                                provident ipsa, minus dolorem vitae sed adipisci aperiam.</p>
                        </li>
                    </ul>
                </div>
                <div class="right-membre">
                   <div id="map" style="width: 700px; height: 600px; position: relative; outline: none;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(-30px, 81px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/12/2046/1361?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(-200px, -347px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/12/2047/1361?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(312px, -347px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/12/2046/1362?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(-200px, 165px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/12/2047/1362?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(312px, 165px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-shadow-pane"></div><div class="leaflet-pane leaflet-marker-pane"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(1.04808e+06px, 697298px, 0px) scale(4096);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in" aria-disabled="false"><span aria-hidden="true">+</span></a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out" aria-disabled="false"><span aria-hidden="true">−</span></a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JavaScript library for interactive maps"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="8"><path fill="#4C7BE1" d="M0 0h12v4H0z"></path><path fill="#FFD500" d="M0 4h12v3H0z"></path><path fill="#E0BC00" d="M0 7h12v1H0z"></path></svg> Leaflet</a> <span aria-hidden="true">|</span> Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a></div></div></div></div>
                </div>
            </div>
        </div>
    </main>


    <footer>

        <ul class="menu_footer">
            <li> <a href="index.php">ACCUEIL</a></li>
            <li> <a href="contact.html">CONTACT</a></li>
            <li> <a href="">GFC PHARMA</a></li>
            <li> <a href="">ESPACE PHARMACIEN</a></li>
            <li> <a href="">ADMINISTRATION</a></li>
        </ul>
    </footer>
    <script>
    
 
    
        var coord= [];
    
        async function fetchText(adress) {
            let response =
            await fetch
                (
                    "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + adress
                ).catch(
                    error => console.log(error)
                )
                    
            let data = await response.text();
            let json = JSON.parse(data);
            coord.push(json[0].lat);
            coord.push(json[0].lon);
            coord.forEach(element => {
                console.log(element);   
            });
            
            var map = L.map('map').setView([coord[0], coord[1]], 18);
    
            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);
    
            var marker = L.marker([coord[0], coord[1]]).addTo(map);
    
        }
        fetchText('350 5th Ave, New York, NY 10118');
    
        
        
    
        </script>
</body>

</html>