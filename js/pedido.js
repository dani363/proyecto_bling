// Datos de ejemplo para la lista de pedidos
const pedidos = [
    { id: 1, producto: "Producto 1", estado: "Pendiente" },
    { id: 2, producto: "Producto 2", estado: "En Proceso" },
    { id: 3, producto: "Producto 3", estado: "Entregado" },
];

// Función para mostrar la lista de pedidos
function mostrarPedidos() {
    const listaPedidos = document.getElementById("listaPedidos");
    listaPedidos.innerHTML = "";

    pedidos.forEach(pedido => {
        const pedidoDiv = document.createElement("div");
        pedidoDiv.classList.add("pedido");
        pedidoDiv.innerHTML = `
            <p>ID: ${pedido.id}</p>
            <p>Producto: ${pedido.producto}</p>
            <p>Estado: ${pedido.estado}</p>
            <button onclick="modificarPedido(${pedido.id})">Modificar</button>
            <button onclick="cancelarPedido(${pedido.id})">Cancelar</button>
        `;
        listaPedidos.appendChild(pedidoDiv);
    });
}

// Función para modificar un pedido
function modificarPedido(id) {
    // Aquí puedes implementar la lógica para modificar el pedido con el ID dado
    alert(`Modificar pedido con ID: ${id}`);
}

// Función para cancelar un pedido
function cancelarPedido(id) {
    // Aquí puedes implementar la lógica para cancelar el pedido con el ID dado
    alert(`Cancelar pedido con ID: ${id}`);
}

// Mostrar la lista de pedidos al cargar la página
mostrarPedidos();
