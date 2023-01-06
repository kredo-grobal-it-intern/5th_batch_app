
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 35.6812,
            lng: 139.7671
        },
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    
    
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
        });
        // 1: Variables infowindow and service:
        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        var markers = [];
        searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (places.length == 0) {
            return;
        }
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };
    
            var marker = new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location,
                placeId: place.place_id
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', function(evt) {
                // 2: getDetails, referring to the "places" (var places = searchBox.getPlaces();) already on the map
                // 3: addlistener on the markers, to show an infowindow upon a clickevent   
    
                service.getDetails({
                placeId: this.placeId
                }, (function(marker) {
                return function(place, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                    infowindow.setContent('<div class = "card text-center fs-3 p-0"><strong>' + place.name + '</strong>' +
                                                '<div class = "card-body p-0" >' +
                                                    '<table class= "table table-responsive table-sm table-striped text-start mt-3">'+
                                                        '<tr>'+
                                                            '<th class = "col-5">'+ 'Address:'+ '</th>'+
                                                            '<td class = "col-7">'+ place.formatted_address + '</td>' + 
                                                        '</tr>'+
                                                        '<tr>'+
                                                            '<th class = "col-5">'+ 'Contact Number:'+ '</th>'+
                                                            '<td class = "col-7">'+ place.formatted_phone_number + '</td>' + 
                                                        '</tr>'+
                                                        '<tr>'+
                                                            '<th class = "col-5">'+ 'Website:'+ '</th>'+
                                                            '<td class = "col-7">'+  '<a href="' + place.website + '" target="_blank" rel="noopener">' + place.website + '</a></td>' + 
                                                        '</tr>'+
                                                    '</table>'+
                                                '</div>'+
                                            '</div>'
                        );
                        
                    infowindow.open(map, marker);
                    }
                }
                }(marker)));
            });
            if (place.geometry.location) {
                bounds.extend(place.geometry.location);
            }
            })
            map.fitBounds(bounds);
        });

    
    }
    window.initMap = initMap;