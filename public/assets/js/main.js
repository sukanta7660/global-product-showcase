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
if (currentLocation) {
    let location = JSON.parse(currentLocation);

    $('#currentLocation').html(location.name)
}

function setLocation({ locationName, latitude, longitude }) {

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

    let locationName = $('#locationName').val();
    let latitude = $('#latitude').val();
    let longitude = $('#longitude').val();

    if (!locationName || !latitude || !longitude) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Invalid Location',
            showConfirmButton: false,
            toast: true,
            timer: 3000,
        });

        return false;
    }

    setLocation({locationName, latitude, longitude});
});

$('#addLocationBtn').on('click', function () {
    $('#locationModalCloseBtn').show();
});


