<?php
include 'db_config.php';

if ($conn->ping()) {
    echo "Conexión exitosa";
} else {
    echo "Error de conexión: " . $conn->error;
}

$conn->close();
?>
