<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Lindungi dari SQL Injection dengan menggunakan prepared statement
$stmt = $koneksi->prepare("SELECT * FROM admin WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah pengguna ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Verifikasi password menggunakan password_verify
    if (password_verify($password, $row['password'])) {
        // Set session untuk user yang berhasil login
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: admin/index.php");
        exit; // Pastikan untuk keluar dari skrip setelah mengarahkan pengguna
    } else {
        header("location: index.php?pesan=gagal");
        exit;
    }
} else {
    header("location: index.php?pesan=gagal");
    exit;
}

// Tutup statement dan koneksi database
$stmt->close();
$koneksi->close();
?>
