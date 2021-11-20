<?php
$halaman = 'daftar menu';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$id_menu = $_GET['id_menu'];

$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);

?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


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



                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Menu</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM tb_produk WHERE id_menu = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form method="POST" action="editprosesmenu.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="menu1">Nama Menu</label>
                                <input type="hidden" name="id_menu" value="<?php echo $data['id_menu'] ?>">
                                <input type="text" class="form-control" id="menu1" name="nama_menu"
                                    value="<?php echo $data['nama_menu'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="#">Jenis Menu</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="jenis_menu"
                                            value="Makanan">Makanan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Minuman"
                                            name="jenis_menu">Minuman
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stok1">Stok</label>
                                <input type="text" class="form-control" id="stok1" name="stok"
                                    value="<?php echo $data['stok'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga1">Harga Menu</label>
                                <input type="text" class="form-control" id="harga1" name="harga"
                                    value="<?php echo $data['harga'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Foto Menu</label>
                                <input type="file" class="form-control-file border" id="gambar" name="gambar">
                            </div><br>
                            <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
                            <a href="daftar-menu" class="btn btn-danger" name="reset">Batal</a>
                        </form>
                        <?php }} ?>
                        <?php 
                        if(isset($_POST['tambah'])){
                        $nama = $_POST['nama_menu'];
                        $jenis = $_POST['jenis_menu'];
                        $stok = $_POST['stok'];
                        $harga = $_POST['harga'];
                        $nama_file = $_FILES['gambar']['name'];
                        $source = $_FILES['gambar']['tmp_name'];
                        $folder = '../upload/';

                        move_uploaded_file($source, $folder.$nama_file);
                        echo "INSERT INTO tb_produk VALUES (NULL, '$nama', '$jenis', '$stok', '$harga', '$nama_file')";
                        $insert = mysqli_query($koneksi, "INSERT INTO tb_produk VALUES (NULL, '$nama', '$jenis', '$stok', '$harga', '$nama_file')");

                        if($insert){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./daftar-menu';</script>";
                        }
                        else {
                        echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
                        }
                        }
                        ?>

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