<?php
$halaman = 'daftar menu';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
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
                        <h3 class="card-title">Data Daftar Menu</h3>
                        <a style="text-align: right;" class="btn bg-yellow btn-sm offset-md-9" href="tambah-menu"> <i
                                class="fa fa-plus"></i> Tambah Menu</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Jenis Menu</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $query = $koneksi->query("SELECT * FROM tb_produk");
                        $nomor_urut = 1;
                        foreach ($query as $data) : ?>
                                <tr>
                                    <td><?= $nomor_urut; ?></td>
                                    <td><?php echo $data['nama_menu']; ?></td>
                                    <td><?php echo $data['jenis_menu']; ?></td>
                                    <td><?php echo $data['stok']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td>
                                        <?php echo "<a  class='btn btn-primary btn-xs' href='#largeModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_menu'] . "><i class='fa fa-eye'></i> Lihat Gambar</a>"; ?>
                                        <a href="edit-menu?id=<?= $data['id_menu'];?>"
                                            class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                                        <a href="menu-hapus?id=<?= $data['id_menu']; ?>"
                                            class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Hapus"><i
                                                class="fa fa-trash"></i></a>


                                    </td>
                                </tr>
                                <?php
                                                    $nomor_urut++;
                                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Foto Menu</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="fetched-data" style="max-height: 500px;overflow: hidden;position: relative;padding-left: 25px;padding-right: 25px;"> -->
                                    <div class="fetched-data" style="width: 100%; height: 400px;"></div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                                </div>
                            </div>

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