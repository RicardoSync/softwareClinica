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
$paciente_id = $_POST['paciente_id'];
$medico_id = $_POST['medico_id'];
$fecha_cita = $_POST['fecha_cita'];
$motivo = $_POST['motivo'];
$estado = $_POST['estado'];

// Insertar datos en la base de datos
$sql = "INSERT INTO citas (paciente_id, medico_id, fecha_cita, motivo, estado)
        VALUES ('$paciente_id', '$medico_id', '$fecha_cita', '$motivo', '$estado')";

if ($conn->query($sql) === TRUE) {
    echo "Nueva cita guardada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
