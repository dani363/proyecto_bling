function confirmarAccion() {
    var mensaje = "¿Estás seguro de que deseas confirmar esta acción?";

    var respuesta = window.confirm(mensaje);

    if (respuesta) {
        // Si el usuario confirma, redirige al usuario a la página confirmar.html
        window.location.href = "confirmar3.html";
    } else {
        // Si el usuario cancela, no se realizará ninguna acción o puedes mostrar un mensaje de cancelación.
    }
}