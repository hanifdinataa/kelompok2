<?php 
// Membuat koneksi ke database
$host = 'localhost';  // Nama host server (biasanya localhost untuk XAMPP)
$user = 'root';       // Username default XAMPP
$password = '';       // Password kosong jika belum diubah
$database = 'tekom_2b';  // Nama database yang ingin dihubungkan

// Menghubungkan ke MySQL
$db = mysqli_connect($host, $user, $password, $database);

// Cek jika koneksi gagal
if (!$db) {
    die('Connection failed: ' . mysqli_connect_error());
}


?>
