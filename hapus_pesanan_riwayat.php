<?php
include 'koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$hapus = "DELETE FROM tb_pemesanan WHERE id_pemesanan = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
}
echo "<script> document.location.href='./riwayat-pemesanan';</script>";
die();
