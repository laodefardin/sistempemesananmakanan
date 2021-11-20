<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$query = "SELECT * FROM tb_produk WHERE id_menu = '$id'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

if (is_file("../upload/" . $data['gambar']))
    unlink("../upload/" . $data['gambar']);
    
$hapus = "DELETE FROM tb_produk WHERE id_menu = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
}
echo "<script> document.location.href='./daftar-menu';</script>";
die();