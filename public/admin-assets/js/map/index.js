var searchInput = document.querySelector('#search-input');
var searchResults = document.querySelector('#search-results');
var latInput = document.querySelector('#lat-input');
var longInput = document.querySelector('#long-input');
var fullName = document.querySelector('#full-name');
var map = L.map('map').setView([51.505, -0.09], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18
}).addTo(map);

var markers = [
    {lat: 51.5, lng: -0.09, title: "Marker 1"},
    {lat: 51.51, lng: -0.1, title: "Marker 2"},
    {lat: 51.49, lng: -0.08, title: "Marker 3"}
];

for (var i = 0; i < markers.length; i++) {
    var marker = L.marker([markers[i].lat, markers[i].lng], {
        title: markers[i].title,
        color: 'red'
    }).addTo(map);
}

var geocoder = L.Control.Geocoder.nominatim();

searchInput.addEventListener('keyup', function() {
    // Clear previous search results
    if (searchResults) {
        searchResults.innerHTML = '';
    }

    // Geocode the search query
    geocoder.geocode(searchInput.value, function(results) {
        if (results && results.length) {
            // Add each result to the search results list
            for (var i = 0; i < results.length; i++) {
                var result = results[i];
                var li = document.createElement('li');
                li.innerHTML = result.html
                li.addEventListener('click', function(result) {
                    return function() {
                        // Fly to the selected result
                        map.flyTo(result.center, 15);

                        console.log({'full':result.name, 'road': result.properties.address.road, 'city': result.properties.address.city});

                        // Set the latitude and longitude values to the input boxes
                        fullName.value = result.name
                        searchInput.value = result.name
                        latInput.value = result.center.lat.toFixed(6);
                        longInput.value = result.center.lng.toFixed(6);

                        L.marker([result.center.lat.toFixed(6), result.center.lng.toFixed(6)]).addTo(map);
                        // Hide the search results
                        searchResults.style.display = 'none';
                    }
                }(result));
                searchResults.appendChild(li);
            }

            // Show the search results
            searchResults.style.display = 'block';
        }
    });
});

// Hide the search results when the user clicks outside the input box or the search results list
document.addEventListener('click', function(event) {
    if (event.target !== searchInput && event.target.parentNode !== searchResults) {
        searchResults.style.display = 'none';
    }
});
