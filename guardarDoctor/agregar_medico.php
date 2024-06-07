<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Médico - Medical</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="/img/logo.png" alt="Logotipo de la Clínica">
            <h1>Medical</h1>
        </div>
        <nav>
        <ul>
                <li><a href="/index.html">Inicio</a></li>

                <li><a href="/guardarPaciente/index.html">Crear Pacientes</a></li>
                <li><a href="/guardarDoctor/agregar_medico.php">Médicos</a></li>
                <li><a href="/agregarCitas/agregar_cita.php">Citas</a></li>
                <li><a href="#consultas">Consultas</a></li>
                <li><a href="#facturas">Facturas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="agregar_medico">
            <h2>Agregar Médico</h2>
            <form action="guardar_medico.php" method="POST" id="form-agregar-medico">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
                
                <label for="especialidad_id">Especialidad:</label>
                <select id="especialidad_id" name="especialidad_id" required>
                    <?php
                    // Conectar a la base de datos y obtener las especialidades
                    $conn = new mysqli('localhost', 'dni', 'MinuzaFea265/', 'tensor');
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, nombre FROM especialidades";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                        }
                    } else {
                        echo "<option value=''>No hay especialidades disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
                
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
                
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" id="correo_electronico" name="correo_electronico" required>
                
                <button type="submit">Guardar Médico</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Clínica Salud. Todos los derechos reservados.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
