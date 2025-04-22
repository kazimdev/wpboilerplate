jQuery(document).ready(function($) {
    // Function to update cart count
    $(document).on('click', '.ajax-add-to-cart', function(e) {
        e.preventDefault();

        var button = $(this);
        var product_id = button.data('product_id');

        button.prop('disabled', true); // Disable button to prevent multiple clicks

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'custom_ajax_add_to_cart',
                product_id: product_id
            },
            beforeSend: function() {
                button.text('Adding...');
            },
            success: function(response) {
                if (response.success) {
                    button.text('Added');
                    button.siblings('.added-message').fadeIn().delay(1500).fadeOut();
                    updateCartCount(); // Update cart count dynamically
                } else {
                    button.text('Failed');
                }
                setTimeout(function() {
                    button.text('Add to Cart');
                    button.prop('disabled', false);
                }, 2000);
            }
        });
    });

    // Function to Update Cart Count
    function updateCartCount() {
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: { action: 'get_cart_count' },
            success: function(response) {
                if (response.count !== undefined) {
                    $('.cart-count').text(response.count);
                }
            }
        });
    }


    // Function to update wishlist count
    function updateWishlistCount() {
        $.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: { action: 'get_wishlist_count' },
            success: function(response) {
                if (response.count !== undefined) {
                    $('.wishlist-count').text(response.count);
                }
            }
        });
    }

    // Run updates on document ready
    updateCartCount();
    updateWishlistCount();

    // Hook into WooCommerce events to update cart
    $(document.body).on('added_to_cart removed_from_cart', function() {
        updateCartCount();
    });

    // Hook into YITH Wishlist events
    $(document).on('added_to_wishlist removed_from_wishlist', function() {
        updateWishlistCount();
    });
});
