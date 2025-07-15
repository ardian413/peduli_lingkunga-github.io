<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mpluh_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi gagal"]));
}

$id = $_GET['id'] ?? 0;

$result = $conn->query("SELECT jumlah FROM like_post WHERE post_id = $id");
if ($row = $result->fetch_assoc()) {
    echo json_encode(["jumlah" => $row['jumlah']]);
} else {
    echo json_encode(["jumlah" => 0]);
}
?>
