<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pelanggan WHERE pelanggan_id='$id'");

header("location:pelanggan.php");
?>
