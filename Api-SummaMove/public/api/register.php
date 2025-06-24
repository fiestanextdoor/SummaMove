<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "summa_move_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Verbinding mislukt."]));
}

$data = json_decode(file_get_contents("php://input"));

$username = $conn->real_escape_string($data->username);
$password = password_hash($data->password, PASSWORD_DEFAULT); 

$sql = "INSERT INTO gebruikers (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Gebruiker geregistreerd."]);
} else {
    echo json_encode(["success" => false, "message" => "Fout bij registratie."]);
}

$conn->close();
?>
