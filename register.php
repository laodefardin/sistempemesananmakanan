<?php
include("koneksi.php");

//buat koneksi ke mysql dari file config.php
if (isset($_POST["submit"])) {
  // form telah disubmit, proses data
  // ambil nilai form
$username = htmlentities(strip_tags(trim($_POST["username"])));
$password = htmlentities(strip_tags(trim($_POST["password"])));

$nama_lengkap=$_POST["nama_lengkap"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$tanggal_lahir=$_POST["tanggal_lahir"];
$alamat=$_POST["alamat"];
$hp=$_POST["hp"];

session_start();
//filter dengan mysqli_real_escape_string
$username = $koneksi->escape_string($username);
$password = $koneksi->escape_string($password);

//generate hashing
$password_sha1 = md5(sha1(md5($password)));
//   $password_sha1 = sha1($password);

$hasil = "INSERT INTO tb_user (username,password,nama_lengkap,jenis_kelamin,tanggal_lahir,alamat,hp,level) 
VALUES
('$username','$password_sha1','$nama_lengkap','$jenis_kelamin','$tanggal_lahir','$alamat','$hp','Pelanggan')";

$result = $koneksi->query($hasil);

// Kondisi apakah berhasil atau tidak
if ($hasil) 
  {
	echo "<script>
				alert('Anda Berhasil Registrasi !, Silahkan login akun anda');
				document.location='login';
		  </script>";
  }
  else 
  {
	echo "<script>
				alert('Registrasi Anda Gagal !');
				document.location='register';
		  </script>";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi | Sistem Pemesanan Makanan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="icon.png" type="image/x-icon" />
</head>
<style>
    #iconeye {
        cursor: pointer;
    }
</style>

<body class="hold-transition login-page">
    <div class="card-body col-8">

        <div class="login-logo">
            <div class="login-logo">
                <a href="#">
                    <h1><b>HALAMAN </b>REGISTRASI PELANGGAN
                </a></h1>
            </div>

        </div>
        <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo $pesan = $_SESSION['pesan'];
                    
                }
                //mengatur session pesan menjadi kosong
                $_SESSION['pesan'] = '';
                ?>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" id="user" name="username"
                                placeholder="Masukan Username" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" id="pass" name="password"
                                placeholder="Masukan Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama_lengkap"
                            placeholder="Masukan Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Laki-Laki">
                            <label class="form-check-label" for="jk">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Perempuan">
                            <label class="form-check-label" for="jk">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl" name="tanggal_lahir" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="rumah">Alamat</label>
                            <input type="text" class="form-control" id="rumah" name="alamat"
                                placeholder="Masukan Alamat" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telp">No. Telephone</label>
                            <input type="text" class="form-control" id="telp" name="hp" placeholder="No. Telephone" required>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <a href="index" class="btn btn-success">
                        Batal
                    </a>
                </form>

                <div class="social-auth-links text-right mb-3">
                </div>
            </div>

            <!-- /.login-card-body -->
        </div>

        <!-- jQuery -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#largeModal').on('show.bs.modal', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                    //menggunakan fungsi ajax untuk pengambilan data
                    $.ajax({
                        type: 'post',
                        url: 'detailkontak.php',
                        data: 'rowid=' + rowid,
                        success: function (data) {
                            $('.fetched-data').html(data); //menampilkan data ke dalam modal
                        }
                    });
                });
            });
        </script>
        <script>
            function show() {
                var nilai = document.getElementById('password').type;
                if (nilai == 'password') {
                    document.getElementById('password').type = 'text';
                    document.getElementById('iconeye').innerHTML = '<i class= "fas fa-eye-slash"></i>';
                } else {
                    document.getElementById('password').type = 'password';
                    document.getElementById('iconeye').innerHTML = '<i class= "fas fa-eye"></i>';
                }
            }
        </script>
</body>

</html>