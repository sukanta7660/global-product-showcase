const allProducts = recentlyViewedProducts();

let recentViewProducts = [];

allProducts.map(product => {
    let singleProduct = $.parseJSON(product.replace(/\s+/g,""));
    recentViewProducts.push(singleProduct);
});

let productHTML = '';

recentViewProducts.forEach(product => {
    productHTML += `
   <tr>
    <td>${product.shop.name}</td>
    <td>${product.name}</td>
    <td>${moneyFormatter(product.price)}</td>
    <td>${product.shop.location_name}</td>
    <td>${product.quantity}</td>
    <td>
        <div class="btn-group">
            <button
                type="button"
                onClick="addMarker({ lat: '${product.shop.latitude}', lng: '${product.shop.longitude}', title: '${product.shop.name}'})"
                class="btn btn-primary">
                View in Map
            </button>
        </div>
    </td>
</tr>
   `;
});

$('#recentViewProducts').html(productHTML);
