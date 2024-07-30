
CREATE DATABASE emp_seguridad


CREATE TABLE Empleados 
(
    emp_id SERIAL PRIMARY KEY,
    emp_nombre VARCHAR(50),
    emp_apellido VARCHAR(50),
    emp_fecha_nacimiento DATE,
    emp_telefono VARCHAR(15),
    emp_correo_electronico VARCHAR(50),
    emp_direccion VARCHAR(50),
    emp_puesto VARCHAR(50),
    emp_fecha_ingreso DATE,
    emp_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Clientes 
(
    cli_id SERIAL PRIMARY KEY,
    cli_nombre_empresa VARCHAR(50),
    cli_nombre_contacto VARCHAR(50),
    cli_telefono VARCHAR(15),
    cli_correo VARCHAR(50),
    cli_direccion VARCHAR(50),
    cli_tipo VARCHAR(50),
    cli_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Servicios (
    serv_id SERIAL PRIMARY KEY,
    serv_descripcion VARCHAR(255),
    serv_precio DECIMAL(10, 2),
    serv_tipo VARCHAR(50),
    serv_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Contratos (
    con_id SERIAL PRIMARY KEY,
    con_id_cliente INT,
    con_id_servicio INT,
    con_fecha_inicio DATE,
    con_fecha_fin DATE,
    con_estado VARCHAR(50),
    FOREIGN KEY (con_id_cliente) REFERENCES Clientes(cli_id),
    FOREIGN KEY (con_id_servicio) REFERENCES Servicios(serv_id)
);

CREATE TABLE Asignaciones (
    asig_id SERIAL PRIMARY KEY,
    asig_emp_id INT,
    asig_con_id INT,
    asig_fecha_asignacion DATE,
    asig_fecha_desasignacion DATE,
    FOREIGN KEY (asig_emp_id) REFERENCES Empleados(emp_id),
    FOREIGN KEY (asig_con_id) REFERENCES Contratos(con_id)
);



---------------------------------------------------------------



-- Insertar empleados
INSERT INTO Empleados (emp_nombre, emp_apellido, femp_fecha_nacimiento, emp_telefono, emp_correo_electronico, emp_direccion, emp_puesto, emp_fecha_ingreso)
VALUES 
('Ana', 'García', '1990-07-22', '555-5678', 'ana.garcia@ejemplo.com', 'Avenida Siempre Viva 456', 'Desarrolladora', '2023-02-10');
('Luis', 'Martínez', '1982-11-05', '555-8765', 'luis.martinez@ejemplo.com', 'Boulevard Central 789', 'Administrador', '2023-03-01');


-- Insertar clientes
INSERT INTO Clientes (cli_nombre_empresa, cli_nombre_contacto, cli_telefono, cli_correo, cli_direccion, cli_tipo)
VALUES 
('Servicios XYZ', 'María Rodríguez', '555-2222', 'maria.rodriguez@serviciosxyz.com', 'Avenida de la Innovación 202', 'Servicios');
('Tech Solutions', 'Roberto Fernández', '555-3333', 'roberto.fernandez@techsolutions.com', 'Plaza de la Tecnología 303', 'Tecnología');

INSERT INTO Servicios (serv_descripcion, serv_precio, serv_tipo)
VALUES 
('Desarrollo de Software', 1500.00, 'Externa');
('Soporte Técnico', 200.00, 'Personalidades');

-- Insertar contratos

INSERT INTO Contratos (con_id_cliente, con_id_servicio, con_fecha_inicio, con_fecha_fin, con_estado)
VALUES 
(2, 2, '2024-02-15', '2024-08-15', 'Activo');
(3, 3, '2024-03-01', '2024-06-01', 'Completado');

INSERT INTO Asignaciones (asig_emp_id, asig_con_id, asig_fecha_asignacion, asig_fecha_desasignacion)
VALUES 
(2, 2, '2024-02-16', NULL);  -- Empleado 2 asignado al Contrato 2
(3, 3, '2024-03-02', '2024-06-01'); -- Empleado 3 asignado al Contrato 3, desasignado el mismo día del fin del contrato












