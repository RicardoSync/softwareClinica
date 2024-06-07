<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "tensor";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];

// Insertar datos en la base de datos
$sql = "INSERT INTO pacientes (nombre, apellido, fecha_nacimiento, genero, direccion, telefono, correo_electronico)
        VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$genero', '$direccion', '$telefono', '$correo_electronico')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo paciente guardado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
