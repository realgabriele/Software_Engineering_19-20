<?php

class Map
{
    public $poi = [];
    private $API_KEY = 'AIzaSyBn3ONWiEoBuuzwFhXgBrRHfBSHIqxLcHA';
    
    public function addPoi($poi)
    {
        $this->poi.array_push($poi);
    }
    
    public function showMap()
    {
        $url = 'https://maps.googleapis.com/maps/api/js?key='.$this->API_KEY.'&callback=initMap';
        $embed = "<script async defer src='$url' type='text/javascript'></script>";
        
        echo "<div id='map'></div>";
        // echo "<script type='text/javascript' src='Map.js'></script>";
        $this->printJS();
        echo $embed;
    }
    
    private function printJS()
    {
        
        echo "
        <script>
         var map;
         function initMap() {
            map = new google.maps.Map(
                  document.getElementById('map'),
                  {center: new google.maps.LatLng(42.367599, 13.351469), zoom: 16});
            
                var iconBase = 'res/icons/';
            
              var icons = {
                parking: {
                  icon: iconBase + 'parking_lot_maps.png'
                },
                library: {
                  icon: iconBase + 'library_maps.png'
                },
                info: {
                  icon: iconBase + 'info-i_maps.png'
                }
              };
            
              var features = [
                {
                  position: new google.maps.LatLng(42.37, 13.351469),
                  type: 'info'
                }, {
                  position: new google.maps.LatLng(42.367599, 13.35),
                  type: 'parking'
                }, {
                  position: new google.maps.LatLng(42.367599, 13.351469),
                  type: 'library'
                }
              ];
            
              // Create markers.
              for (var i = 0; i < features.length; i++) {
                var marker = new google.maps.Marker({
                  position: features[i].position,
                  icon: icons[features[i].type].icon,
                  map: map
                });
              };
            }
            </script>";
    }
}

