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
$password = $data->password;

$sql = "SELECT * FROM gebruikers WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo json_encode(["success" => true, "message" => "Login gelukt"]);
    } else {
        echo json_encode(["success" => false, "message" => "Wachtwoord incorrect"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Gebruiker niet gevonden"]);
}

$conn->close();
?>
