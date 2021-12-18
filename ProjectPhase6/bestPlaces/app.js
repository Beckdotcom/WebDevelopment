function initMap(){
    var customLabel = {
        bathroom: {
          label: 'B',
          color: 'black'
        },
        study: {
          label: 'S'
        },
        nap: {
          label: 'N'
        }
    };
    
    var options= {
      
      center: {lat: 30.28540798750081, lng:  -97.73474658445255},
      zoom: 17,
      mapId: 'ab5ac4134cec60d6'
    }
  
   //creates new map of centered at UT; 
   map = new google.maps.Map(document.getElementById("map"), options);
 

    

       
    var infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP or XML file
    downloadUrl('https://spring-2021.cs.utexas.edu/cs329e-bulko/zmoneyzb/phase4/bestPlaces/convert.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var spotType = markerElem.getAttribute('spotType');
              var description = markerElem.getAttribute('description');
              var code = markerElem.getAttribute('code');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
//add random number to attribute so that the dont overlap 
                
                
                
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = description;
              infowincontent.appendChild(text);
              var icon = customLabel[spotType] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
               
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
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
