const LOCATION_KEY = 'currentLocation';
let myModal = new bootstrap.Modal(document.getElementById('locationModal'), {
    backdrop: 'static',
    keyboard: false
});

// check location is already set
const currentLocation = localStorage.getItem(LOCATION_KEY);
if (!currentLocation) {
    myModal.show()
}

// set location
let locationName = $('#locationName').val();
let latitude = $('#latitude').val();
let longitude = $('#longitude').val();

function setLocation() {

 let location = {
     name: locationName,
     latitude: latitude,
     longitude: longitude
 }

 if (currentLocation) {

     localStorage.removeItem(LOCATION_KEY);
     localStorage.setItem(LOCATION_KEY, JSON.stringify(location));

 } else {
     localStorage.setItem(LOCATION_KEY, JSON.stringify(location));
 }

}

$('#locationForm').on('submit', function () {
    if (!locationName || !latitude || !longitude) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Invalid Location. Latitude and longitude not found for this location',
            showConfirmButton: false,
            toast: true,
            timer: 3000,
        });

        return false;
    }

    setLocation();
});


