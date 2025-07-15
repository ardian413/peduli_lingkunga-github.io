<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mpluh_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM komentar ORDER BY tanggal DESC";
$result = $conn->query($sql);

$komentar = [];

while ($row = $result->fetch_assoc()) {
    $komentar[] = $row;
}

echo json_encode($komentar);
$conn->close();
?>
