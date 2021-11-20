<?php
include '../koneksi.php';
session_start();
$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$jenis_menu = $_POST['jenis_menu'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

$img = $_FILES['gambar']['name'];


if(empty($img)){
    $update = "UPDATE tb_produk SET nama_menu='$nama_menu', jenis_menu='$jenis_menu', stok='$stok', harga='$harga' WHERE id_menu='$id_menu' ";

    $sql = mysqli_query($koneksi, $update);
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./daftar-menu';</script>";
}else{
    $query = $koneksi->query("SELECT * FROM tb_produk WHERE id_menu = '$id_menu' ");
    $data = mysqli_fetch_array($query);
    $lokasi1 = $data['gambar'];
    $hapus_gbr = "../upload/".$lokasi1;
    unlink($hapus_gbr);

    move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/'.$img);

    $update = "UPDATE tb_produk SET nama_menu='$nama_menu', jenis_menu='$jenis_menu', stok='$stok', harga='$harga', gambar='$img' WHERE id_menu='$id_menu' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./daftar-menu';</script>";
}