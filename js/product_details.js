$(document).ready(function(){
    // Retrieve product ID from URL query parameter
    var urlParams = new URLSearchParams(window.location.search);
    var queryParams = {};
    queryParams[key] = value;
    productId= queryParams;
    // var productId = urlParams.get('id');
    console.log("Product ID:", productId);
    $.ajax({
        url: 'product_detail.php',
        type: 'GET',
        data: {id: productId},
        dataType: 'json',
        success: function(response) {
            $('#product-details').html(`
                <div class="card">
                    <img src="${response.image_url}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">${response.name}</h5>
                        <p class="card-text">${response.description}</p>
                        <p class="card-text">Price: ${response.price}</p>
                        <p class="card-text">Attribute: ${response.attribute}</p>
                    </div>
                </div>
            `);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
