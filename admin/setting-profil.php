<?php 
$halaman = 'profil';
include "global_header.php"; 
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


<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="card">
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
                                    <button type="submit" name="submit" class="btn btn-success btn-sm pull-right"><i
                                            class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                <?php }?>

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