<?php 
session_start();
//hapus session
session_destroy();

// redirek ke halaman login
header('location:index');
?>