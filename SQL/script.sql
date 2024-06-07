CREATE USER 'dni'@'localhost' IDENTIFIED BY 'MinuzaFea265/';
GRANT ALL PRIVILEGES ON *.* TO 'dni'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EXIT;


CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    fecha_nacimiento DATE,
    genero ENUM('M', 'F'),
    direccion VARCHAR(255),
    telefono VARCHAR(15),
    correo_electronico VARCHAR(100),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    especialidad VARCHAR(100),
    telefono VARCHAR(15),
    correo_electronico VARCHAR(100),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    medico_id INT,
    fecha_cita DATETIME,
    motivo VARCHAR(255),
    estado ENUM('Pendiente', 'Completada', 'Cancelada'),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

CREATE TABLE consultas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cita_id INT,
    diagnostico TEXT,
    tratamiento TEXT,
    fecha_consulta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cita_id) REFERENCES citas(id)
);

CREATE TABLE facturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    consulta_id INT,
    monto DECIMAL(10, 2),
    fecha_emision TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('Pendiente', 'Pagada'),
    FOREIGN KEY (consulta_id) REFERENCES consultas(id)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) UNIQUE,
    contrasena VARCHAR(255),
    tipo ENUM('Admin', 'Medico', 'Recepcionista'),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE especialidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
