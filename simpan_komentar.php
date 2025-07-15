<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mpluh_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$komentar = $_POST['komentar'];

$sql = "INSERT INTO komentar (nama, isi) VALUES ('$nama', '$komentar')";
$conn->query($sql);

$conn->close();
?>
