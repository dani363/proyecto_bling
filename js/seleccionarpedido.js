function confirmarCompra() {
    var mensaje = "¿Estás seguro de que deseas hacer el pedido?";

    var respuesta = window.confirm(mensaje);

    if (respuesta) {
        // Si el usuario confirma, redirige al usuario a la página de validarpedido.html
        window.location.href = "confirmar.html";
    } else {
        // Si el usuario cancela, no se realizará ninguna acción o puedes mostrar un mensaje de cancelación.
    }
}