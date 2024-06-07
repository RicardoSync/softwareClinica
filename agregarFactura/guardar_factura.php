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
$consulta_id = $_POST['consulta_id'];
$monto = $_POST['monto'];
$estado = $_POST['estado'];

// Insertar datos en la base de datos
$sql = "INSERT INTO facturas (consulta_id, monto, estado)
        VALUES ('$consulta_id', '$monto', '$estado')";

if ($conn->query($sql) === TRUE) {
    echo "Nueva factura guardada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
