<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Consulta - Medical</title>
    <link rel="stylesheet" href="/guardarDoctor/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="/img/logo.png" alt="Logotipo de la Clínica">
            <h1>Medical</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="agregar_paciente.html">Agregar Paciente</a></li>
                <li><a href="agregar_medico.php">Agregar Médico</a></li>
                <li><a href="agregar_cita.php">Agregar Cita</a></li>
                <li><a href="agregar_consulta.php">Agregar Consulta</a></li>
                <li><a href="#facturas">Facturas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="agregar_consulta">
            <h2>Agregar Consulta</h2>
            <form action="guardar_consulta.php" method="POST" id="form-agregar-consulta">
                <label for="cita_id">Cita:</label>
                <select id="cita_id" name="cita_id" required>
                    <?php
                    // Conectar a la base de datos y obtener las citas
                    $conn = new mysqli('localhost', 'dni', 'MinuzaFea265/', 'tensor');
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    $sql = "SELECT citas.id, pacientes.nombre AS paciente_nombre, pacientes.apellido AS paciente_apellido, medicos.nombre AS medico_nombre, medicos.apellido AS medico_apellido, citas.fecha_cita 
                            FROM citas 
                            JOIN pacientes ON citas.paciente_id = pacientes.id 
                            JOIN medicos ON citas.medico_id = medicos.id 
                            WHERE citas.estado = 'Pendiente'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['paciente_nombre']." ".$row['paciente_apellido']." - ".$row['medico_nombre']." ".$row['medico_apellido']." - ".$row['fecha_cita']."</option>";
                        }
                    } else {
                        echo "<option value=''>No hay citas pendientes disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
                
                <label for="diagnostico">Diagnóstico:</label>
                <textarea id="diagnostico" name="diagnostico" required></textarea>
                
                <label for="tratamiento">Tratamiento:</label>
                <textarea id="tratamiento" name="tratamiento" required></textarea>
                
                <button type="submit">Guardar Consulta</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Clínica Salud. Todos los derechos reservados.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
