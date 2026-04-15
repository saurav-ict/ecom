const cartCount = document.getElementById('cartCount');

function updateCartCount(count) {
    if (cartCount) cartCount.textContent = count;
}

document.querySelectorAll('[data-add-to-cart]').forEach(btn => {
    btn.addEventListener('click', () => {
        const productId = btn.dataset.addToCart;
        // TODO: wire up to cart API
        console.log('Add to cart:', productId);
    });
});
