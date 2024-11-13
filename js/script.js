let cart = [];

function addItem(name, price) {
    cart.push({ name, quantity: 1, price });
    renderCart();
}

function renderCart() {
    const cartItems = document.getElementById('cartItems');
    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.name} - Rp${item.price.toLocaleString()} x ${item.quantity}`;
        cartItems.appendChild(li);
        total += item.price * item.quantity;
    });

    document.getElementById('cartTotal').textContent = total.toLocaleString();
}

function checkout() {
    const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

    fetch('checkout.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cart, paymentMethod })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Checkout berhasil!');
            cart = [];
            renderCart();
        } else {
            alert('Checkout gagal.');
        }
    });
}
