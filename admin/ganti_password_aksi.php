<?php
include '../koneksi.php';

// Ambil data password baru dari form
$password_baru = $_POST['password_baru'];

// Enkripsi password baru dengan password_hash
$password_baru_hashed = password_hash($password_baru, PASSWORD_DEFAULT);

// Update password baru ke dalam tabel admin
$stmt = mysqli_prepare($koneksi, "UPDATE admin SET password=?");
mysqli_stmt_bind_param($stmt, "s", $password_baru_hashed);
mysqli_stmt_execute($stmt);

// Redirect kembali ke halaman ganti_password.php dengan pesan sukses
header("location: ganti_password.php?pesan=oke");
?>
