const LOCATION_KEY = 'currentLocation';
const EXPIRY_DURATION = 120;
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

//

const addToRecentViewList = (product) => {

    const previousData = getFromLocalStorage('recently-open', true);

    let dataToStore = [product];

    if (previousData.length) {

        dataToStore = [product, ...previousData];

        dataToStore = [...new Set(dataToStore.map(obj => JSON.stringify(obj)))].map(str => JSON.parse(str));
    }


    const items = dataToStore;

    setToLocalStorage('recently-open', items, true);
};

const setToLocalStorage = (key, value, stringify = false) => {

    const data = stringify
        ? JSON.stringify(value)
        : value;

    localStorage.setItem(key, data);
};

const getFromLocalStorage = (key, parsed = false, fallback = []) => {
    const data = parsed
        ? JSON.parse(localStorage.getItem(key))
        : localStorage.getItem(key)
    ;

    if (_.isEmpty(data)) {
        return fallback;
    }

    return data;
};

const removeFromLocalStorage = (key) => {
    localStorage.removeItem(key);
};

const clearLocalStorage = () => {
    localStorage.clear();
};

const checkExpiry = (storedTime) => {
    let givenDateTime = new Date(storedTime);
    let expiryDuration = EXPIRY_DURATION * 1000;

    let currentTime = new Date();

    return currentTime - givenDateTime > expiryDuration;
};

const removeExpireRecentProduct = () => {
    const products = getFromLocalStorage('recently-open', true) || [];

    const recentProduct = [];

    products.map(product => {

        if (!checkExpiry(product.stored_at)) {
            recentProduct.push(product);
        }

        setToLocalStorage('recently-open', recentProduct, true)
    });

};

const recentlyViewedProducts = () => {
    removeExpireRecentProduct();
    return getFromLocalStorage('recently-open', true) || []
};

function moneyFormatter(value, currency = '$'){
    return `${currency} ${parseFloat(value).toFixed(2)}`
}


