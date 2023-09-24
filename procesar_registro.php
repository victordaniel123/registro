
<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta a la base de datos (reemplaza con tus credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "regis";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recopila los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hashea la contraseña
    $genero = $_POST["genero"];
    $hobbies = $_POST["hobbies"];
    $estadoCivil = $_POST["estadoCivil"];

    // Subir la imagen de perfil (si se proporciona)
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        $target_dir = "uploads/"; // Directorio donde se guardarán las imágenes
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        $imagenPerfil = $target_file;
    } else {
        $imagenPerfil = ""; // Si no se proporciona una imagen
    }

    // Inserta los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, edad, contraseña, genero, hobbies, estadoCivil, imagenPerfil)
            VALUES ('$nombre', '$email', $edad, '$password', '$genero', '$hobbies', '$estadoCivil', '$imagenPerfil')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, muestra el mensaje emergente
        echo '<script>mostrarMensajeRegistro("Usuario registrado correctamente.");</script>';
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
    
    // Cierra la conexión
    $conn->close();
}
?>
