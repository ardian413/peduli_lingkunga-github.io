<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pesan = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pesan Anda telah terkirim!'); window.location.href='kontak.html';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
