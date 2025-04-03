<?php
$host = "localhost"; // Ganti jika berbeda
$user = "root"; // Ganti dengan username database Anda
$pass = ""; // Ganti dengan password database Anda
$dbname = "mpluh_db"; // Sesuaikan dengan nama database

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
