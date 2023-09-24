<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mi_page";


// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión a la base de datos fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

// Consulta para verificar el inicio de sesión
$sql = "SELECT * FROM usuarios WHERE email = '$correo' AND contraseña = '$contraseña'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    // El inicio de sesión fue exitoso
    echo "Inicio de sesión exitoso. ¡Bienvenido!";
} else {
    // El inicio de sesión falló
    echo "Inicio de sesión fallido. Verifica tu correo y contraseña.";
}

$conn->close();
?>
