<?php
include 'db_config.php';

function getCount($table) {
    global $conn;

    // Consulta para obtener el conteo de registros
    $sql = "SELECT COUNT(*) AS count FROM $table";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}
?>
