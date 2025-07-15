<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mpluh_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi gagal"]));
}

$id = $_POST['id'] ?? 0;
$ip = $_SERVER['REMOTE_ADDR'];

// Cek apakah IP ini sudah like puisi ini
$cek = $conn->prepare("SELECT * FROM like_ip WHERE post_id = ? AND ip_address = ?");
$cek->bind_param("is", $id, $ip);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    // Sudah like sebelumnya
    $result = $conn->query("SELECT jumlah FROM like_post WHERE post_id = $id");
    $data = $result->fetch_assoc();
    echo json_encode(["jumlah" => $data['jumlah'], "status" => "sudah"]);
    exit;
}

// Tambah 1 like
$conn->query("INSERT INTO like_post (post_id, jumlah) VALUES ($id, 1)
              ON DUPLICATE KEY UPDATE jumlah = jumlah + 1");

// Simpan IP yang sudah like
$simpan = $conn->prepare("INSERT INTO like_ip (post_id, ip_address) VALUES (?, ?)");
$simpan->bind_param("is", $id, $ip);
$simpan->execute();

// Ambil jumlah terbaru
$result = $conn->query("SELECT jumlah FROM like_post WHERE post_id = $id");
$data = $result->fetch_assoc();

echo json_encode(["jumlah" => $data['jumlah'], "status" => "berhasil"]);
?>
