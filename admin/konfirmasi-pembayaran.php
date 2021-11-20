<?php
include '../koneksi.php';
session_start();

    $id = $_GET['id'];
    $update = "UPDATE tb_pemesanan SET status='Sudah dibayar' WHERE id_pemesanan='$id' ";

    $sql = mysqli_query($koneksi, $update);
    $_SESSION['pesan'] = 'Simpan';
    echo "<script> document.location.href='./pesanan-selesai';</script>";