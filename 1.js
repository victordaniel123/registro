
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registro-form").addEventListener("submit", function (e) {
        e.preventDefault(); // Evita el envío predeterminado del formulario

        // Lógica de validación y procesamiento del registro
        mostrarMensajeRegistro("El registro se completó con éxito.");

        return false; // Evita la redirección del formulario
    });

function mostrarMensajeRegistro(mensaje) {
    var modal = document.getElementById("registro-exitoso");
    var mensajeElement = document.getElementById("mensaje-registro");
    
    mensajeElement.textContent = mensaje;
    
    modal.style.display = "block";
}

document.getElementById("regresar-login").addEventListener("click", function () {
    // Lógica para regresar al login
    window.location.href = "login.html"; // Cambia esto según tu estructura de archivos
});

document.getElementById("registrar-otro").addEventListener("click", function () {
    // Lógica para registrar otro usuario (si es necesario)
    // Puedes redirigir al formulario de registro nuevamente
    window.location.href = "registro.html"; // Cambia esto según tu estructura de archivos
});
