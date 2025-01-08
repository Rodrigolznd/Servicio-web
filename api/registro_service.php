<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servicios_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión a la base de datos: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["usuario"]) && isset($data["password"])) {
    $usuario = $data["usuario"];
    $password = password_hash($data["password"], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Usuario registrado con éxito"]);
    } else {
        echo json_encode(["error" => "Error al registrar el usuario: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}

$conn->close();
?>
