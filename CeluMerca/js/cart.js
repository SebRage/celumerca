// Array para almacenar los productos seleccionados
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Función para agregar un producto al carrito
function addToCart(product) {
    // Busca si el producto ya está en el carrito
    const existingProduct = cart.find(item => item.name === product.name);
    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push({ ...product, quantity: 1 });
    }

    // Actualiza el carrito en localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    alert("Producto añadido al carrito");
}

// Cargar los productos del carrito en la página del carrito
function loadCart() {
    const cartItems = document.getElementById('cart-items');
    const totalPriceEl = document.getElementById('total-price');
    let totalPrice = 0;

    cartItems.innerHTML = '';
    cart.forEach(item => {
        const total = item.price * item.quantity;
        totalPrice += total;

        cartItems.innerHTML += `
            <tr>
                <td>${item.name}</td>
                <td>$${item.price}</td>
                <td>${item.quantity}</td>
                <td>$${total}</td>
                <td><button class="btn btn-danger btn-sm" onclick="removeFromCart('${item.name}')">Eliminar</button></td>
            </tr>
        `;
    });

    totalPriceEl.textContent = `Total: $${totalPrice}`;
}

// Función para eliminar un producto del carrito
function removeFromCart(productName) {
    cart = cart.filter(item => item.name !== productName);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart();
}

// Cargar los productos al cargar la página del carrito
if (document.getElementById('cart-items')) {
    loadCart();
}
