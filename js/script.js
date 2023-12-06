window.onload = function () {
    // Verificar si estamos en la página de confirmación
    const confirmacionPage = document.getElementById("confirmacion");

    if (confirmacionPage) {
        mostrarProductosDelCarrito();
    }
};

function agregarAlCarrito(productoId) {
    debugger;
    const infoContainer = document.querySelector(`.producto:nth-child(${productoId}) .info`);
    const talla = infoContainer.querySelector(`#talla${productoId}`).value;
    const color = infoContainer.querySelector(`#color${productoId}`).value;
    const cantidad = infoContainer.querySelector(`#cantidad${productoId}`).value;
    const mensajeError = infoContainer.querySelector(`.mensaje-error`);

    if (talla === "" || color === "" || cantidad <= 0) {
        mensajeError.textContent = "Por favor, completa todos los campos.";
        mensajeError.style.color = "red";
    } else {
        mensajeError.textContent = "Producto agregado al carrito.";
        mensajeError.style.color = "green";

        const producto = {
            nombre: infoContainer.querySelector('strong').textContent,
            precio: infoContainer.querySelector('strong:nth-child(2)').textContent,
            talla: talla,
            color: color,
            cantidad: cantidad
        };
        localStorage.setItem(`producto${productoId}`, JSON.stringify(producto));
    }
}

function mostrarProductosDelCarrito() {
    const detallesProductos = document.getElementById("detalles-productos");

    for (let i = 1; i <= 4; i++) {
        const productoJSON = localStorage.getItem(`producto${i}`);
        if (productoJSON) {
            const producto = JSON.parse(productoJSON);
            const detalleProducto = document.createElement("div");
            detalleProducto.innerHTML = `
                <h3>Producto ${i}</h3>
                <p><strong>Nombre del Producto:</strong> ${producto.nombre}</p>
                <p><strong>Precio:</strong> ${producto.precio}</p>
                <p><strong>Talla:</strong> ${producto.talla}</p>
                <p><strong>Color:</strong> ${producto.color}</p>
                <p><strong>Cantidad:</strong> ${producto.cantidad}</p>
                <hr>
            `;
            detallesProductos.appendChild(detalleProducto);
        }
    }
}

function confirmarCompra() {
    const mensaje = document.getElementById("mensaje");
    mensaje.textContent = "¡Compra confirmada con éxito!";
    mensaje.style.color = "green";
}
function confirmarAccion() {
    var mensaje = "¿Estás seguro de que deseas confirmar esta acción?";

    var respuesta = window.confirm(mensaje);

    if (respuesta) {
        // Si el usuario confirma, redirige al usuario a la página confirmar.html
        window.location.href = "confirmar.html";
    } else {
        // Si el usuario cancela, no se realizará ninguna acción o puedes mostrar un mensaje de cancelación.
    }
}


