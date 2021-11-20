<?php 
$halaman = 'setting';
include "global_header.php"; ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                                    <?php
        //mengatasi error notice dan warning
        //error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

        //koneksi ke database
        include '../koneksi.php';

        //proses jika tombol rubah di klik
        if ($_POST['submit']) {
          //membuat variabel untuk menyimpan data inputan yang di isikan di form
        $password_lama          = $_POST['password_lama'];
        $password_baru          = $_POST['password_baru'];
        $konfirmasi_password    = $_POST['konfirmasi_password'];

          //cek dahulu ke database dengan query SELECT
          //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
          //encrypt -> md5($password_lama)
        $password_lama  = md5(sha1(md5($password_lama)));
        $data            = $koneksi->query("SELECT password FROM tb_user WHERE password='$password_lama'");
        if ($data->num_rows) {
            //kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
            //membuat kondisi minimal password adalah 5 karakter
            if (strlen($password_baru) >= 8) {
              //jika password baru sudah 5 atau lebih, maka lanjut ke bawah
              //membuat kondisi jika password baru harus sama dengan konfirmasi password
        if ($password_baru == $konfirmasi_password) {
                //jika semua kondisi sudah benar, maka melakukan update kedatabase
                //query UPDATE SET password = encrypt md5 password_baru
                //kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
                $password_baru  = md5(sha1(md5($password_baru)));

                 $update = $koneksi->query("UPDATE tb_user SET password='$password_baru' WHERE id_user = '" . $_SESSION['id_user'] . "'");
                if ($update) {
                  //kondisi jika proses query UPDATE berhasil
            echo "<div class=\"alert alert-success alert-dismissible\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <h5><i class=\"icon fas fa-check\"></i> Alert!</h5>
                <h4>Password berhasil di ganti</h4>
                </div>";
                } else {
                  //kondisi jika proses query gagal
            echo "<div class=\"alert alert-danger alert-dismissible\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
             <h5><i class=\"icon fas fa-ban\"></i> Alert!</h5>
                <h4>Gagal mengganti password</h4>
                </div>";
                }
            } else {
                //kondisi jika password baru beda dengan konfirmasi password
                echo "<div class=\"alert alert-warning alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h5><i class=\"icon fas fa-check\"></i> Alert!</h5>
            <h4>Konfirmasi password tidak cocok</h4>
            </div>";
        }
            } else {
              //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
   echo "<div class=\"alert alert-warning alert-dismissible\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h5><i class=\"icon fas fa-check\"></i> Alert!</h5>
        <h4>Minimal Password Baru 8 karakter, Ulang Lagi</h4>
        </div>";
            }
        } else {
            //kondisi jika password lama tidak cocok dengan data yang ada di database
             echo "<div class=\"alert alert-warning alert-dismissible\">
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h5><i class=\"icon fas fa-check\"></i> Alert!</h5>
        <h4>Password lama tidak cocok</h4>
        </div>";
        }
        }
        ?>
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-8">
                            <h2>Ganti Password</h2>
                            <!-- mulai form rubah password -->
                            <form method="post" action="" class="form-horizontal">
                                <table border="0" cellpadding="10" cellspacing="0" width="500" align="center"
                                    class="table">
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><input value="<?= $_SESSION['username'] ?>" class="form-control" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password Lama</td>
                                        <td>:</td>
                                        <td><input type="password" name="password_lama" class="form-control"
                                                placeholder="Masukkan Password Lama" required></td>
                                    </tr>
                                    <tr>
                                        <td>Password Baru</td>
                                        <td>:</td>
                                        <td><input type="password" name="password_baru" class="form-control"
                                                placeholder="Masukkan Password Baru" required></td>
                                    </tr>
                                    <tr>
                                        <td>Konfirmasi Password</td>
                                        <td>:</td>
                                        <td><input type="password" name="konfirmasi_password" class="form-control"
                                                placeholder="Ulangi Password Baru" required></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td><br><input type="submit" name="submit" class="btn btn-primary"
                                                value="Ganti Password"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>