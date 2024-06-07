<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cita - Medical</title>
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
            
                <li><a href="/guardarPaciente/index.html">Crear Pacientes</a></li>
                <li><a href="/guardarDoctor/agregar_medico.php">Médicos</a></li>
                <li><a href="/agregarCitas/agregar_cita.php">Citas</a></li>
                <li><a href="#consultas">Consultas</a></li>
                <li><a href="#facturas">Facturas</a></li>
            
            </ul>
        </nav>
    </header>
    <main>
        <section id="agregar_cita">
            <h2>Agregar Cita</h2>
            <form action="guardar_cita.php" method="POST" id="form-agregar-cita">
                <label for="paciente_id">Paciente:</label>
                <select id="paciente_id" name="paciente_id" required>
                    <?php
                    // Conectar a la base de datos y obtener los pacientes
                    $conn = new mysqli('localhost', 'dni', 'MinuzaFea265/', 'tensor');
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, nombre, apellido FROM pacientes";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['nombre']." ".$row['apellido']."</option>";
                        }
                    } else {
                        echo "<option value=''>No hay pacientes disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
                
                <label for="medico_id">Médico:</label>
                <select id="medico_id" name="medico_id" required>
                    <?php
                    // Conectar a la base de datos y obtener los médicos
                    $conn = new mysqli('localhost', 'dni', 'MinuzaFea265/', 'tensor');
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, nombre, apellido FROM medicos";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['nombre']." ".$row['apellido']."</option>";
                        }
                    } else {
                        echo "<option value=''>No hay médicos disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
                
                <label for="fecha_cita">Fecha y Hora de la Cita:</label>
                <input type="datetime-local" id="fecha_cita" name="fecha_cita" required>
                
                <label for="motivo">Motivo:</label>
                <input type="text" id="motivo" name="motivo" required>
                
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Completada">Completada</option>
                    <option value="Cancelada">Cancelada</option>
                </select>
                
                <button type="submit">Guardar Cita</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Clínica Salud. Todos los derechos reservados.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
