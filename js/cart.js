// Array para almacenar los productos seleccionados
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Función para agregar un producto al carrito
function addToCart(product) {
    // Busca si el producto ya está en el carrito
    const existingProduct = cart.find(item => item.id_producto === product.id_producto);
    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push({ ...product, quantity: 1 });
    }

    // Actualiza el carrito en localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Actualiza el contador del carrito
    updateCartCount();

    // Mostrar mensaje de confirmación
    alert(`${product.name} fue añadido al carrito`);
}

// Función para actualizar el contador del carrito
function updateCartCount() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const cartCountElement = document.getElementById('cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = totalItems;
    }
}

// Cargar los productos del carrito en la página del carrito
function loadCart() {
    const cartItems = document.getElementById('cart-items');
    const totalPriceEl = document.getElementById('total-price');
    let totalPrice = 0;

    cartItems.innerHTML = ''; // Limpiar los productos en el carrito

    cart.forEach(item => {
        const total = item.price * item.quantity;
        totalPrice += total;

        cartItems.innerHTML += `
            <tr>
                <td>${item.id_producto}</td>
                <td>${item.name}</td>
                <td>$${item.price}</td>
                <td>${item.quantity}</td>
                <td>$${total}</td>
                <td><button class="btn btn-danger btn-sm" onclick="removeFromCart('${item.id_producto}')">Eliminar</button></td>
            </tr>
        `;
    });

    totalPriceEl.textContent = `Total: $${totalPrice}`;
}

// Función para eliminar un producto del carrito
function removeFromCart(id_producto) {
    // Eliminar el producto utilizando su id_producto
    cart = cart.filter(item => item.id_producto !== id_producto);

    // Guardar el carrito actualizado en localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Recargar los productos en la página
    loadCart();

    // Actualizar el contador del carrito
    updateCartCount();
}

// Cargar los productos al cargar la página del carrito
if (document.getElementById('cart-items')) {
    loadCart();
}

// Llamar a updateCartCount para actualizar el contador de productos en el carrito al cargar la página
document.addEventListener('DOMContentLoaded', updateCartCount);
