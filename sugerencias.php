<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysbd_proyectmanejo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$email = $_POST['email'];
$sugerencias = $_POST['sugerencia'];

// Preparar la consulta SQL
$sql = "INSERT INTO sugerencias (email, sugerencia) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    echo "Error en la preparación de la consulta: " . $conn->error;
    die();
}

// Vincular los parámetros y ejecutar la consulta
$stmt->bind_param("ss", $email, $sugerencias);
if ($stmt->execute()) {
    echo "Los datos del formulario se han guardado correctamente en la base de datos.";
} else {
    echo "Error al guardar los datos del formulario: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
