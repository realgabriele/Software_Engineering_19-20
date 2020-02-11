class Mappa{
	
	markersArray = [];
	
	constructor(){
		// <script async defer src='https://maps.googleapis.com/maps/api/js?callback=initMap&key=API_KEY' type='text/javascript'></script>
		var script = document.createElement('script');
	    script.type = 'text/javascript';
	    script.src = 'https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyBn3ONWiEoBuuzwFhXgBrRHfBSHIqxLcHA';
	    document.body.appendChild(script);
	}
	
	showMap() {
		map = new google.maps.Map(
				document.getElementById('map'),
				{center: new google.maps.LatLng(42.367599, 13.351469), zoom: 16});

		map.addListener('idle', function(e) {
			$("*").each(function() {
		        if ($(this).css("zIndex") == 100) {
		            $(this).css("zIndex", "-100");
		        }
		    })
		});
	}
	
	showPoi(poi){
		// while (typeof google === "undefined");
		this.clearOverlays();
		
		this.infowindow = new google.maps.InfoWindow({});
		
		for (var i = 0; i < poi.length; i++){
			var curr_poi = poi[i];
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(curr_poi.coord_x, curr_poi.coord_y),
				icon: "res/icons/" + curr_poi.service + ".png",
				map: map,
				label: curr_poi.name
			});
			
			/* marker.addListener('click', function() {
				infowindow.setContent(curr_poi.name);
				infowindow.open(map, marker);
				//userif.mappa.openInfoWindow(marker, curr_poi);
			}); */
			
			this.markersArray.push(marker);
			google.maps.event.addListener(marker,'click', (function(marker, poi){ 
			    return function() {
			        userif.mappa.openInfoWindow(marker, poi)
			    };
			})(marker, curr_poi));
		}
		
	}
	
	openInfoWindow(marker, poi){
		var content = "<div class='infowindow'>" +
				"<p class='infotitle'>" + poi.name + "</p>" +
				"<p class='infodescription'>" + poi.description + "</p>" +
				"</div>";
		this.infowindow.setContent(content);
		this.infowindow.open(map, marker);
	}
	
	clearOverlays() {
		for (var i = 0; i < this.markersArray.length; i++ ) {
			this.markersArray[i].setMap(null);
		}
		this.markersArray.length = 0;
	}	
}

var map;
var google;
function initMap() {
	google = google;
	userif.mappa.showMap();
}

