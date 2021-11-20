<?php 
include 'global_header.php';

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    
    $update = "UPDATE tb_user SET 
    nama_lengkap = '$nama',
    username     = '$username',
    level        = '$level'
    WHERE id_user = '$_SESSION[id_user]'";

    mysqli_query($koneksi, $update) or die (mysqli_error());
    $_SESSION['pesan']='Profil Berhasil Di Update';
    echo "<script type='text/javascript'>window.location = 'setting-profil'</script>";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-7">
                    <!-- <h1 class="m-0 text-dark"> Cari Peralatan <small>Sistem Database Equipment Warehouse</small></h1> -->
                </div>

            </div><!-- /.row -->
            <div class="alert alert-gray-dark alert-dismissible">
                <h5></h5>
            </div>


        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {

                    $pesan = $_SESSION['pesan'];

                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                //mengatur session pesan menjadi kosong

                $_SESSION['pesan'] = '';
                // unset($_SESSION['pesan']);
                // $cetak_pesan = '';
                ?>

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-gray">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Setting Password</h3>
                        </div>
                        <?php
                $profil = $koneksi->query("SELECT * FROM tb_user WHERE id_user = '".$_SESSION['id_user']."'");
                foreach ($profil as $data){
                ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <span class="col-lg-2">Nama Lengkap</span>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value='<?php echo $data['nama_lengkap']; ?>'
                                                    placeholder="contoh : Masukkan nama anda">
                                            </div>
                                            <span class="col-lg-2">Username</span>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="username" name="username"
                                                    value="<?php echo $data['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <span class="col-lg-2">Level</span>

                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="level" name="level"
                                                    value="<?php echo $data['level']; ?>" readonly>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" name="submit"
                                                class="btn btn-success btn-sm pull-right"><i class="fa fa-save"></i>
                                                Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <?php }?>
                    </div>
                </div>

            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'global_footer.php'; ?>