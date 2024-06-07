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
$cita_id = $_POST['cita_id'];
$diagnostico = $_POST['diagnostico'];
$tratamiento = $_POST['tratamiento'];

// Insertar datos en la base de datos
$sql = "INSERT INTO consultas (cita_id, diagnostico, tratamiento)
        VALUES ('$cita_id', '$diagnostico', '$tratamiento')";

if ($conn->query($sql) === TRUE) {
    // Actualizar el estado de la cita a "Completada"
    $sql_update_cita = "UPDATE citas SET estado = 'Completada' WHERE id = '$cita_id'";
    $conn->query($sql_update_cita);
    echo "Nueva consulta guardada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
