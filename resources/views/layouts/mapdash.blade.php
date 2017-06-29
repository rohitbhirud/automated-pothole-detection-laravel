<script type="text/javascript">


		<?php 

				$js_array = json_encode($cords);
				
				echo "var cords = ". $js_array . ";\n";

			?>

		function initMap() {
		    var map;

		    var bounds = new google.maps.LatLngBounds();

		    var mapOptions = {
		        mapTypeId: 'roadmap'
		    };
		                    
		    // Display a map on the page
		    map = new google.maps.Map(document.getElementById("map"), mapOptions);
		    map.setTilt(45);
		                        
		    // Info Window Content

		    var infoBar = [];
		        
		    // Display multiple markers on a map
		    var infoWindow = new google.maps.InfoWindow(), marker, i;
		    
		    // Loop through our array of markers & place each one on the map  
		    for( i = 0; i < cords.length; i++ ) {
		        var position = new google.maps.LatLng(cords[i].latitude, cords[i].longitude);
		        bounds.extend(position);
		        marker = new google.maps.Marker({
		            position: position,
		            map: map,
		            title: cords[i].comp_title
		        });

		        infoBar[i] = '<div class="info_content">' +
		        '<h3>' + cords[i].comp_title.toUpperCase() + '</h3>' +
		        'Compaint Type : ' + cords[i].comp_type + '<br>' +
		        'Reported By : ' + cords[i].cust_name + '</br>' +
		        'Report Date : ' + cords[i].create_date + '</br>' +
		        '<a href="view.php?mod=admin&view=viewByCompID&compId=' + cords[i].cid + '">View Compaint</a></div>';

		        // Allow each marker to have an info window    
		        google.maps.event.addListener(marker, 'click', (function(marker, i) {
		            return function() {
		                infoWindow.setContent(infoBar[i]);
		                infoWindow.open(map, marker);
		            }
		        })(marker, i));

		        // Automatically center the map fitting all markers on the screen
		        map.fitBounds(bounds);
		    }

		    console.log(infoBar);

		    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
		    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
		        this.setZoom(8);
		        google.maps.event.removeListener(boundsListener);
		    });
		    
		}

      // function initMap() {
      //   map = new google.maps.Map(document.getElementById('map'), {
      //     center: {lat: -34.397, lng: 150.644},
      //     zoom: 8
      //   });
      // }

</script>