let map = L.map('map').setView([51.505, -0.09], 13);
console.log(map)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18
}).addTo(map);

// let markers = [
//     {lat: 51.5, lng: -0.09, title: "Sukanta"},
//     {lat: 51.51, lng: -0.1, title: "Marker 2"},
//     {lat: 51.49, lng: -0.08, title: "Marker 3"}
// ];

// for (let i = 0; i < markers.length; i++) {
//     let marker = L.marker([markers[i].lat, markers[i].lng], {
//         title: markers[i].title,
//         color: '#ccccccc'
//     }).addTo(map);
// }

function addMarker({ lat, lng, title }) {
    let marker = L.marker([lat, lng], {
        title: title
    }).addTo(map);

    map.flyTo([lat, lng], 15);
}

let geocoder = L.Control.Geocoder.nominatim();
