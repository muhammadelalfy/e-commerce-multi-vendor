import $ from 'jquery';

(function ($) {
    const csrfToken = csrf; // Ensure csrf is defined in your Blade template

    // Reusable AJAX function
    function makeAjaxRequest(url, method, data, onSuccess, onError) {
        $.ajax({
            url,
            method,
            data: {
                ...data,
                _token: csrfToken // Add CSRF token to every request
            },
            success: onSuccess,
            error: onError
        });
    }

    // Handle quantity change
    $('.quantity-change').on('keyup', function (e) {
        e.preventDefault(); // Prevent default action
        const productId = $(this).data('id');
        const quantity = $(this).val();

        makeAjaxRequest(
            `/cart/${productId}`,
            'PUT',
            { product_id: productId, quantity },
            function (response) {
                console.log('Cart updated:', response);
            },
            function (xhr, status, error) {
                console.error('Error updating cart:', error);
            }
        );
    });

    // Remove item from cart
    $('.remove-from-cart').on('click', function (e) {
        e.preventDefault(); // Prevent default action
        const productId = $(this).data('id');

        makeAjaxRequest(
            `/cart/${productId}`,
            'DELETE',
            { product_id: productId },
            function (response) {
                $(`.remove-item-${productId}`).remove();
                console.log('Item removed from cart:', response);
            },
            function (xhr, status, error) {
                console.error('Error removing item from cart:', error);
            }
        );
    });

    // Add item to cart
    $('#add-to-cart-ajax').on('click', function (e) {
        e.preventDefault(); // Prevent default action
        const productId = $(this).data('id');
        const quantity = $('#quantity').val();

        makeAjaxRequest(
            `/cart`,
            'POST',
            { product_id: productId , quantity: quantity },
            function (response) {
                console.log('Item added to cart:', response);
            },
            function (xhr, status, error) {
                console.error('Error adding item to cart:', error);
            }
        );
    });
})($);
