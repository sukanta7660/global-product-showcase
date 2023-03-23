$('#createUpdateModal').on('shown.bs.modal', function () {

    let searchInput = document.querySelector('#location');
    let searchResults = document.querySelector('#search-results');
    let latInput = document.querySelector('#latitude');
    let longInput = document.querySelector('#longitude');
// let fullName = document.querySelector('#full-name');
    let map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18
    }).addTo(map);

    let geocoder = L.Control.Geocoder.nominatim();

    searchInput.addEventListener('keyup', function() {
        // Clear previous search results
        if (searchResults) {
            searchResults.innerHTML = '';
        }

        // Geocode the search query
        geocoder.geocode(searchInput.value, function(results) {
            if (results && results.length) {
                // Add each result to the search results list
                for (let i = 0; i < results.length; i++) {
                    let result = results[i];
                    let li = document.createElement('li');
                    li.innerHTML = result.html
                    li.addEventListener('click', function(result) {
                        return function() {
                            // Fly to the selected result
                            map.flyTo(result.center, 15);

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
});
