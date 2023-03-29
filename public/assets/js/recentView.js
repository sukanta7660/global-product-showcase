const allProducts = recentlyViewedProducts();

// let recentViewProducts = [];

// allProducts.map(product => {
//     let singleProduct = $.parseJSON(product.replace(/\s+/g,""));
//     recentViewProducts.push(singleProduct);
// });

// console.log(recentViewProducts)

let productHTML = '';

allProducts.forEach(product => {
    productHTML += `
   <tr>
    <td>${product.shop.name}</td>
    <td>${product.name}</td>
    <td>${moneyFormatter(product.price)}</td>
    <td>${product.shop.location_name}</td>
    <td>${product.quantity}</td>
    <td>
        <div class="d-grid gap-2">
            <button
                type="button"
                onClick="addMarker({ lat: '${product.shop.latitude}', lng: '${product.shop.longitude}', title: '${product.shop.name}', type: 'json', product: '${encodeURIComponent(JSON.stringify(product))}'})"
                class="btn btn-primary">
                View in Map
            </button>
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
</tr>
   `;
});

$('#recentViewProducts').html(productHTML);
