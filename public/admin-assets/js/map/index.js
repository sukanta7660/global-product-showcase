$(document).ready(function() {
    let autocomplete;
    let id = 'location';

    autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)), {
        types: ['geocode'],
    })

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
    let place = autocomplete.getPlace();
    jQuery("#latitude").val(place.geometry.location.lat());
    jQuery("#longitude").val(place.geometry.location.lng());
    })

})
