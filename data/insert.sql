--
-- usuarios
--

INSERT INTO usuarios (nombre, apellido, edad, correo, contrasena, fecha_registro, estado) VALUES
('Juan', 'Pérez', 30, 'juan@gmail.com', 'contraseña123', NOW(), 'user'),
('María', 'González', 25, 'maria@gmail.com', 'maria456', NOW(), 'user'),
('Pedro', 'Ramírez', 28, 'pedro@gmail.com', 'pedro789', NOW(), 'user'),
('Laura', 'Sánchez', 35, 'laura@gmail.com', 'laura321', NOW(), 'user'),
('Carlos', 'López', 32, 'carlos@gmail.com', 'carlos654', NOW(), 'user'),
('Ana', 'Martínez', 27, 'ana@gmail.com', 'ana987', NOW(), 'user'),
('José', 'Hernández', 29, 'jose@gmail.com', 'jose234', NOW(), 'user'),
('Sofía', 'Díaz', 31, 'sofia@gmail.com', 'sofia567', NOW(), 'user'),
('Daniel', 'Torres', 26, 'daniel@gmail.com', 'daniel890', NOW(), 'user'),
('Elena', 'Ruiz', 33, 'elena@gmail.com', 'elena123', NOW(), 'user'),
('Luis', 'Gómez', 34, 'luis@gmail.com', 'luis456', NOW(), 'user'),
('Marta', 'Vargas', 30, 'marta@gmail.com', 'marta789', NOW(), 'user'),
('Javier', 'Jiménez', 29, 'javier@gmail.com', 'javier321', NOW(), 'user'),
('Raquel', 'Flores', 27, 'raquel@gmail.com', 'raquel654', NOW(), 'user'),
('Diego', 'Castro', 31, 'diego@gmail.com', 'diego987', NOW(), 'user');

--
-- trabajos
--

INSERT INTO trabajos (foto, titulo, descripcion, fecha_inicio, fecha_fin, ubicacion, precio, empleadorID) VALUES
('imagen1.jpg', 'Desarrollo web', 'Desarrollo de sitio web corporativo', '2024-05-01', '2024-06-30', 'Ciudad X', 1500.00, 1),
('imagen2.jpg', 'Diseño gráfico', 'Creación de logo y material promocional', '2024-06-01', '2024-07-15', 'Ciudad Y', 800.00, 2),
('imagen3.jpg', 'Marketing digital', 'Campaña de marketing en redes sociales', '2024-07-01', '2024-08-31', 'Ciudad Z', 1200.00, 3),
('imagen4.jpg', 'Traducción', 'Traducción de documentos técnicos', '2024-06-15', '2024-07-31', 'Ciudad W', 1000.00, 4),
('imagen5.jpg', 'Consultoría financiera', 'Asesoramiento financiero para empresas', '2024-06-20', '2024-08-15', 'Ciudad V', 2000.00, 5),
('imagen6.jpg', 'Redacción de contenidos', 'Redacción de artículos para blog', '2024-06-10', '2024-07-20', 'Ciudad U', 600.00, 6),
('imagen7.jpg', 'Soporte técnico', 'Servicio de soporte técnico remoto', '2024-07-05', '2024-08-10', 'Ciudad T', 900.00, 7),
('imagen8.jpg', 'Desarrollo móvil', 'Desarrollo de aplicación móvil', '2024-06-25', '2024-08-05', 'Ciudad S', 1800.00, 8),
('imagen9.jpg', 'Edición de video', 'Edición y postproducción de video corporativo', '2024-07-15', '2024-09-01', 'Ciudad R', 1300.00, 9),
('imagen10.jpg', 'Diseño de interiores', 'Diseño de interiores para residencia', '2024-06-30', '2024-08-30', 'Ciudad Q', 1700.00, 10),
('imagen11.jpg', 'Programación', 'Desarrollo de software a medida', '2024-07-10', '2024-09-15', 'Ciudad P', 1600.00, 11),
('imagen12.jpg', 'Community management', 'Gestión de redes sociales', '2024-06-05', '2024-07-25', 'Ciudad O', 700.00, 12),
('imagen13.jpg', 'Mantenimiento de equipos', 'Servicio de mantenimiento preventivo y correctivo', '2024-07-20', '2024-09-10', 'Ciudad N', 1100.00, 13),
('imagen14.jpg', 'Asesoría legal', 'Asesoramiento legal para empresas', '2024-06-28', '2024-08-28', 'Ciudad M', 1900.00, 14),
('imagen15.jpg', 'Fotografía', 'Sesión fotográfica profesional', '2024-07-02', '2024-08-20', 'Ciudad L', 1400.00, 15);

--
-- tomar_chamba
--

INSERT INTO tomar_chamba (trabajoID, usuarioID) VALUES
(1, 3), (2, 4), (3, 5), (4, 6), (5, 7),
(6, 8), (7, 9), (8, 10), (9, 11), (10, 12),
(11, 13), (12, 14), (13, 15), (14, 1), (15, 2);


--
-- pqr
--

INSERT INTO pqr (tipo, nombre, email, telefono, mensaje) VALUES
('Solicitud de información', 'Juan Pérez', 'juan@gmail.com', '1234567890', 'Quiero más información sobre sus servicios.'),
('Queja', 'María González', 'maria@gmail.com', '9876543210', 'Estoy insatisfecha con el servicio recibido.'),
('Reclamo', 'Pedro Ramírez', 'pedro@gmail.com', '5678901234', 'Necesito resolver un problema con mi pedido.'),
('Sugerencia', 'Laura Sánchez', 'laura@gmail.com', '2345678901', 'Me gustaría sugerir una mejora en su plataforma.'),
('Felicitación', 'Carlos López', 'carlos@gmail.com', '8901234567', 'Quiero felicitar al equipo por su excelente trabajo.'),
('Solicitud de soporte', 'Ana Martínez', 'ana@gmail.com', '3456789012', 'Necesito asistencia técnica urgente.'),
('Queja', 'José Hernández', 'jose@gmail.com', '6789012345', 'No estoy conforme con la atención al cliente recibida.'),
('Solicitud de información', 'Sofía Díaz', 'sofia@gmail.com', '4567890123', 'Quiero conocer más sobre sus precios y servicios.'),
('Reclamo', 'Daniel Torres', 'daniel@gmail.com', '9012345678', 'He recibido un producto defectuoso.'),
('Sugerencia', 'Elena Ruiz', 'elena@gmail.com', '5678901234', 'Sería bueno implementar un sistema de puntos para clientes.'),
('Felicitación', 'Luis Gómez', 'luis@gmail.com', '2345678901', 'Gracias por resolver mi problema tan rápido.'),
('Queja', 'Marta Vargas', 'marta@gmail.com', '8901234567', 'No estoy satisfecha con el tiempo de entrega.'),
('Solicitud de soporte', 'Javier Jiménez', 'javier@gmail.com', '1234567890', 'Necesito ayuda con la configuración de mi cuenta.'),
('Solicitud de información', 'Raquel Flores', 'raquel@gmail.com', '9876543210', 'Quiero saber si ofrecen servicios de mantenimiento.'),
('Reclamo', 'Diego Castro', 'diego@gmail.com', '3456789012', 'No he recibido respuesta a mi solicitud anterior.');


--
-- admin
--

INSERT INTO admin (username, correo, contrasena) VALUES
    ('admin', 'chambeapues@cps.com', '123pormi'),
    ('LordAdm', 'LordAdm@cps.com', '123pormi'),
    ('MichAdm', 'MichAdm@cps.com', '123pormi'),
    ('AlejoAdm', 'AlejoAdm@cps.com', '123pormi');