let initialLocation = { lat: 29.973350, lng: -95.646450, title: 'Bergenia' };

if (currentLocation) {
    let location = JSON.parse(currentLocation);
    initialLocation = { lat: location.latitude, lng: location.longitude, title: location.location };
}

let map = L.map('map').setView(initialLocation, 13);


/*-------------- Initialize Map ------------------*/

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18
}).addTo(map);

let markers = [
    initialLocation
];

for (let i = 0; i < markers.length; i++) {
    L.marker([markers[i].lat, markers[i].lng], {
        title: markers[i].title,
        color: '#ccccccc'
    }).addTo(map);
}

/*-------------- Initialize Map ------------------*/

/*-------------- Location Search ------------------*/
let searchInput = document.querySelector('#locationName');
let searchResults = document.querySelector('#search-results');
let latInput = document.querySelector('#latitude');
let longInput = document.querySelector('#longitude');


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

/*-------------- Location Search ------------------*/

/*-------------- Add Marker To The Map ------------------*/
function addMarker({ lat, lng, title, product = null, type = null }) {
    let marker = L.marker([lat, lng], {
        title: title
    }).addTo(map);
    
    let productToViewList = type ? JSON.parse(decodeURIComponent(product)) : product


    if (product) {
        addToRecentViewList(productToViewList);
    }

    map.flyTo([lat, lng], 15);

    let locMap = document.getElementById('map');

    locMap.scrollIntoView({ behavior: 'smooth' });

}
/*-------------- Add Marker To The Map ------------------*/

let geocoder = L.Control.Geocoder.nominatim();

/*-------------- Make Searchable ------------------*/
let currentLocationInfo = JSON.parse(localStorage.getItem('currentLocation'));

$('#productSearchForm').on('submit', function(event) {

    event.preventDefault();

    let productName = $('#productName').val();
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            latitude: currentLocationInfo.latitude,
            longitude: currentLocationInfo.longitude,
            search: productName
        },
        success: function(response) {
            let productHtml = '';

            if (response.length) {
                $.each(response, function (index, product) {
                    productHtml += `<tr>
                                    <td>${product?.shop.name}</td>
                                    <td>${product.name}</td>
                                    <td>${moneyFormatter(product.price)}</td>
                                    <td>${product.shop.location_name}</td>
                                    <td>${product.quantity}</td>
                                    <td>
                                        <div class="d-grid gap-2">
                                            <button
                                            type="button"
                                            onClick="addMarker({ lat: '${product.shop.latitude}', lng: '${product.shop.longitude}', title: '${product.shop.name}', type: 'json', product: '${encodeURIComponent(JSON.stringify(product))}'})"
                                            class="btn btn-primary">View In Map</button>
                                            <button
                                                type="button"
                                                data-text="You are going to add to the favourite list"
                                                onclick="addFavorite(${product.id})"
                                                class="btn btn-success addFavConfirmBtn"
                                            >
                                                Add Favourites
                                            </button>
                                            <form method="POST" action="/add-to-favourite/${product.id}"
                                                  id="confirmForm${product.id}">
                                                <input type="hidden" name="_token" value="${csrfToken}">
                                                <input id="method" type="hidden" name="_method" value="PATCH">
                                            </form>
                                        </div>
                                    </td>
                                </tr>`;
                });
            } else {
                productHtml += `
                <tr>
                    <td colspan="6">No Product Found</td>
                </tr>
                `;
            }

            $('#productSearchResults').html(productHtml);
        }
    });
});
/*-------------- Make Searchable ------------------*/

