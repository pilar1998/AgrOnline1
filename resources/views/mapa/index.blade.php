@extends ('layouts.admin')
@section('contenido')
    <!DOCTYPE html >
      <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Mapa</title>
        <style>
          /* Always set the map height explicitly to define the size of the div
           * element that contains the map. */
          #map {
            height: 450px;
            width: 600px;
          }
          /* Optional: Makes the sample page fill the window. */
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }
          .button {
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            background-color: #66d677;
            border-radius: 6px;
            border: 2px solid #03aa3e;
           }
          .button:hover {
            color: #66d677;
            background-color: #ffffff;
           }


        </style>
      </head>

      <body>
        <div id="map"></div>

        <script>
          var customLabel = {
            restaurant: {
              label: 'R'
            },
            bar: {
              label: 'B'
            }
          };

            function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: new google.maps.LatLng(4.5991080, -74.5968950),
              zoom: 15
            });
            var infoWindow = new google.maps.InfoWindow;

              // Change this depending on the name of your PHP or XML file
              downloadUrl('', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                  var name = markerElem.getAttribute('name');
                  var address = markerElem.getAttribute('address');
                  var type = markerElem.getAttribute('type');
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('lat')),
                      parseFloat(markerElem.getAttribute('lng')));

                  var infowincontent = document.createElement('div');
                  var strong = document.createElement('strong');
                  strong.textContent = name
                  infowincontent.appendChild(strong);
                  infowincontent.appendChild(document.createElement('br'));

                  var text = document.createElement('text');
                  text.textContent = address
                  infowincontent.appendChild(text);
                  var icon = customLabel[type] || {};
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                  });
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                    /* INICIO: MARCAR UNA RUTA */
                    var posicionprincipal = {lat: 4.5230103, lng: -74.5928838};
                    var posicionllegada = point;
                    var objConfigDR = {
                        map: map,
                        suppressMarkers: true
                    }
                    var objConfigDS ={
                        origin: posicionprincipal,
                        destination: posicionllegada,
                        travelMode: google.maps.TravelMode.DRIVING,
                        provideRouteAlternatives: true
                    }
                    var ds = new google.maps.DirectionsService();
                    var dr = new google.maps.DirectionsRenderer(objConfigDR);
                        ds.route(objConfigDS, fnRutear);
                    function fnRutear(resultados, status){
                        if (status === google.maps.DirectionsStatus.OK){
                              dr.setDirections(resultados);

                        }else{
                            alert('Error'+status);
                        }
                    }
                    /* FINAL: MARCAR UNA RUTA */    
                   });
                });
              });
            }


    function infoMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: new google.maps.LatLng(4.5991080, -74.5968950),
              zoom: 15
            });
            var infoWindow = new google.maps.InfoWindow;

              // Change this depending on the name of your PHP or XML file
              downloadUrl('informacionxml.php', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                  var nombres_admin = markerElem.getAttribute('nombres_admin');
                  var nombre_finca = markerElem.getAttribute('nombre_finca');
                  var cantidadto = markerElem.getAttribute('cantidadto');
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('latitud')),
                      parseFloat(markerElem.getAttribute('longitud')));

                  var infowincontent = document.createElement('div');
                  var strong = document.createElement('strong');
                  strong.textContent = nombre_finca
                  infowincontent.appendChild(strong);
                  infowincontent.appendChild(document.createElement('br'));

                  var text = document.createElement('text');
                  text.textContent = "adimnistrador(a): " + nombres_admin
                  infowincontent.appendChild(text);
                  infowincontent.appendChild(document.createElement('br'));
                  
                  var text2 = document.createElement('text');
                  text2.textContent = "cantidad de productos: " +cantidadto+ " canastillas"
                  infowincontent.appendChild(text2);
                  infowincontent.appendChild(document.createElement('br'));
                  
                  var link = nombre_finca + ".php";
                  var newBaitTag = document.createElement('a');
                  var newBaitText = document.createTextNode("Más Informacion");
                  newBaitTag.setAttribute('href', link);
                  newBaitTag.appendChild(newBaitText);
                  infowincontent.appendChild(newBaitTag);
                  
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    //label: "F"
                  });
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                    /* INICIO: MARCAR UNA RUTA */
                    var posicionprincipal = {lat: 4.5230103, lng: -74.5928838};
                    var posicionllegada = point;
                    var objConfigDR = {
                        map: map,
                        suppressMarkers: true
                    }
                    var objConfigDS ={
                        origin: posicionprincipal,
                        destination: posicionllegada,
                        travelMode: google.maps.TravelMode.DRIVING,
                        provideRouteAlternatives: true
                    }
                    var ds = new google.maps.DirectionsService();
                    var dr = new google.maps.DirectionsRenderer(objConfigDR);
                        ds.route(objConfigDS, fnRutear);
                    function fnRutear(resultados, status){
                        if (status === google.maps.DirectionsStatus.OK){
                              dr.setDirections(resultados);

                        }else{
                            alert('Error'+status);
                        }
                    }
                    /* FINAL: MARCAR UNA RUTA */    
                   });
                });
              });
            }
            
            function prodMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: new google.maps.LatLng(4.5991080, -74.5968950),
              zoom: 15
            });
            var infoWindow = new google.maps.InfoWindow;

              // Change this depending on the name of your PHP or XML file
              downloadUrl('productosxml.php', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                  var nombre_finca = markerElem.getAttribute('nombre_finca');
                  var cantidad = markerElem.getAttribute('cantidad');
                  var cantidad_total = markerElem.getAttribute('cantidad_total');
                  var nombre_producto = markerElem.getAttribute('nombre_producto');
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('latitud')),
                      parseFloat(markerElem.getAttribute('longitud')));

                  var infowincontent = document.createElement('div');
                  var strong = document.createElement('strong');
                  strong.textContent = nombre_finca
                  infowincontent.appendChild(strong);
                  infowincontent.appendChild(document.createElement('br'));

                  var text = document.createElement('text');
                  text.textContent = "Nombre del producto: " + nombre_producto
                  infowincontent.appendChild(text);
                  infowincontent.appendChild(document.createElement('br'));
                  
                  var text2 = document.createElement('text');
                  text2.textContent = "cantidad del producto: " +cantidad+ " canastillas"
                  infowincontent.appendChild(text2);
                  infowincontent.appendChild(document.createElement('br'));
                  
                  var text3 = document.createElement('text');
                  text3.textContent = "cantidad total del producto: " +cantidad_total+ " canastillas"
                  infowincontent.appendChild(text3);
                  infowincontent.appendChild(document.createElement('br'));
                  
                  var link = nombre_finca + ".php";
                  var newBaitTag = document.createElement('a');
                  var newBaitText = document.createTextNode("Más Informacion");
                  newBaitTag.setAttribute('href', link);
                  newBaitTag.appendChild(newBaitText);
                  infowincontent.appendChild(newBaitTag);
                  
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    //label: "F"
                  });
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                    /* INICIO: MARCAR UNA RUTA */
                    var posicionprincipal = {lat: 4.5230103, lng: -74.5928838};
                    var posicionllegada = point;
                    var objConfigDR = {
                        map: map,
                        suppressMarkers: true
                    }
                    var objConfigDS ={
                        origin: posicionprincipal,
                        destination: posicionllegada,
                        travelMode: google.maps.TravelMode.DRIVING,
                        provideRouteAlternatives: true
                    }
                    var ds = new google.maps.DirectionsService();
                    var dr = new google.maps.DirectionsRenderer(objConfigDR);
                        ds.route(objConfigDS, fnRutear);
                    function fnRutear(resultados, status){
                        if (status === google.maps.DirectionsStatus.OK){
                              dr.setDirections(resultados);

                        }else{
                            alert('Error'+status);
                        }
                    }
                    /* FINAL: MARCAR UNA RUTA */    
                   });
                });
              });
            }


          function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
              if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
              }
            };

            request.open('GET', url, true);
            request.send(null);
          }

          function doNothing() {}
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB971ufHXbdhm0tx9KkSEv9vOwGVsSb0J8&callback=initMap">
        </script>
        <p></p>
        <input class="button" type="button" name="botón" value="Ver puntos con informacion" onclick="infoMap()">
        
        <input class="button" type="button" name="botón" value="ver puntos de cosecha de mango" onclick="prodMap()">
      </body>
    </html>
@endsection

