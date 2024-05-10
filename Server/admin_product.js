$(document).ready(function() {
    // Add Product Form Submission
    $('#add-product-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'add_product.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('Product added successfully');
                // Clear form fields
                $('#add-product-form')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Error adding product:', error);
            }
        });
    });

    // Modify Product Form Submission
    $('#modify-product-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'modify_product.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('Product modified successfully');
                // Clear form fields
                $('#modify-product-form')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Error modifying product:', error);
            }
        });
    });

    // Delete Product Form Submission
    $('#delete-product-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'delete_product.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('Product deleted successfully');
                // Clear form fields
                $('#delete-product-form')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Error deleting product:', error);
            }
        });
    });
});
