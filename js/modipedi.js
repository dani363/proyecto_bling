function confirmarGuardarCambios() {
    var mensaje = "¿Estás seguro de que deseas guardar los cambios?";

    var respuesta = window.confirm(mensaje);

    if (respuesta) {
        // Si el usuario confirma, puedes realizar la acción correspondiente aquí,
        // como guardar los cambios en el servidor o realizar cualquier otra operación necesaria.
        // Si deseas redirigir al usuario a otra página después de guardar los cambios,
        // puedes usar window.location.href aquí.
    } else {
        // Si el usuario cancela, no se realizará ninguna acción o puedes mostrar un mensaje de cancelación.
    }
}
function confirmarGuardarCambios() {
    var mensaje = "¿Estás seguro de que deseas guardar los cambios?";

    var respuesta = window.confirm(mensaje);

    if (respuesta) {
        // Si el usuario confirma, redirige al usuario a la página de validarpedido.html
        window.location.href = "validarpedido.html";
    } else {
        // Si el usuario cancela, no se realizará ninguna acción o puedes mostrar un mensaje de cancelación.
    }
}


function validarFormulario() {
    var talla = document.getElementById("talla").value;
    var color = document.getElementById("color").value;
    var cantidad = document.getElementById("cantidad").value;
    var nombre = document.getElementById("nombre").value;
    var descripcion = document.getElementById("descripcion").value;
    var categoria = document.getElementById("categoria").value;

    // Verifica si alguno de los campos está vacío
    if (talla === "" || color === "" || cantidad === "" || nombre === "" || descripcion === "" || categoria === "") {
        alert("Por favor, complete todos los campos antes de guardar los cambios.");
        return false; // Evita que el formulario se envíe si falta algún campo
    }

    // Si todos los campos están completos, el formulario se enviará
    return true;
}
