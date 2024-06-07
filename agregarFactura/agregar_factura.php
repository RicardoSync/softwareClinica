<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Factura - Medical</title>
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
                <li><a href="agregar_factura.php">Agregar Factura</a></li>
                <li><a href="#facturas">Facturas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="agregar_factura">
            <h2>Agregar Factura</h2>
            <form action="guardar_factura.php" method="POST" id="form-agregar-factura">
                <label for="consulta_id">Consulta:</label>
                <select id="consulta_id" name="consulta_id" required>
                    <?php
                    // Conectar a la base de datos y obtener las consultas
                    $conn = new mysqli('localhost', 'dni', 'MinuzaFea265/', 'tensor');
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    $sql = "SELECT consultas.id, pacientes.nombre AS paciente_nombre, pacientes.apellido AS paciente_apellido, medicos.nombre AS medico_nombre, medicos.apellido AS medico_apellido, consultas.fecha_consulta 
                            FROM consultas 
                            JOIN citas ON consultas.cita_id = citas.id
                            JOIN pacientes ON citas.paciente_id = pacientes.id 
                            JOIN medicos ON citas.medico_id = medicos.id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['paciente_nombre']." ".$row['paciente_apellido']." - ".$row['medico_nombre']." ".$row['medico_apellido']." - ".$row['fecha_consulta']."</option>";
                        }
                    } else {
                        echo "<option value=''>No hay consultas disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
                
                <label for="monto">Monto:</label>
                <input type="number" step="0.01" id="monto" name="monto" required>
                
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Pagada">Pagada</option>
                </select>
                
                <button type="submit">Guardar Factura</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Clínica Salud. Todos los derechos reservados.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
