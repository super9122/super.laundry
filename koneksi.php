<?php
$koneksi = mysqli_connect("localhost", "root", "", "super.laundry");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit; // Keluar dari skrip jika koneksi gagal
}
?>
