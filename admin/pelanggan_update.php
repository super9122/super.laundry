<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "UPDATE pelanggan SET pelanggan_nama='$nama', pelanggan_hp='$hp', pelanggan_alamat='$alamat' WHERE pelanggan_id='$id'");

header("location:pelanggan.php");
?>
