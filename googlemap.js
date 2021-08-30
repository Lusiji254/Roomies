function initMap(loc) {
    // The location of Uluru
    var location=loc;
 
var longitude,latitude;
var geocoder = new google.maps.Geocoder();
var address =location;

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
   // jQuery('#coordinates').val(latitude+', '+longitude);
   //alert(latitude+","+longitude);
   var map;

   map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()},
    zoom: 13,

  });

// The marker, positioned at Uluru
const marker = new google.maps.Marker({
  position:  {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()},
  map: map,
});
    } 
}); 

    //const uluru = { lat: latitude, lng: longitude };
    // The map, centered at Uluru
  
    //function initMap() {
   
  }
                   