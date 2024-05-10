$(document).ready(function(){
    // Fetch product data from the server
    $.get("get_products.php", function(data, status){
      if(status === "success") {
        // Parse JSON data
        var products = JSON.parse(data);
  
        // Iterate through each product and create product cards
        products.forEach(function(product) {
          var productCard = `
            <div class="col-md-4 mb-4">
              <div class="card">
                <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                <div class="card-body">
                  <h5 class="card-title">${product.name}</h5>
                  <p class="card-text">Price: $${product.price}</p>
                  <a href="product_detail.html?id=${product.id}" class="btn btn-primary read-more">Read More</a>
                </div>
              </div>
            </div>
          `;
          $("#product-container").append(productCard);
        });
      } else {
        console.log("Failed to fetch products.");
      }
    });
  });
  