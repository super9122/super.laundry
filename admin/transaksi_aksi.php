<?php
include '../koneksi.php';

$pelanggan = $_POST['pelanggan'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];
$tgl_hari_ini = date('Y-m-d');
$status = 0;

// Fetch the price per kilo
$h = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga");
$harga_per_kilo = mysqli_fetch_assoc($h);

// Calculate the total price
$harga = $berat * $harga_per_kilo['harga_per_kilo'];

// Insert the new transaction
mysqli_query($koneksi, "INSERT INTO transaksi VALUES('', '$tgl_hari_ini', '$pelanggan', '$harga', '$berat', '$tgl_selesai', '$status')");
$id_terakhir = mysqli_insert_id($koneksi);

// Get the types and quantities of clothes
$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];

// Insert each item of clothing
for ($x = 0; $x < count($jenis_pakaian); $x++) {
    if ($jenis_pakaian[$x] != "") {
        mysqli_query($koneksi, "INSERT INTO pakaian VALUES('', '$id_terakhir', '$jenis_pakaian[$x]', '$jumlah_pakaian[$x]')");
    }
}

// Redirect to the transaction page
header("location:transaksi.php");
?>
