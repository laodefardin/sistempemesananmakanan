<?php
$halaman = 'daftar pesanan';
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
                        <h3 class="card-title">Data Daftar Pesanan</h3>
                        <!-- <a style="text-align: right;" class="btn bg-yellow btn-sm offset-md-9" href="tambah-menu"> <i
                                class="fa fa-plus"></i> Tambah Menu</a> -->
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID Pemesanan</th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">No Meja</th>
                                    <th scope="col">Tanggal Pesan</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $query = $koneksi->query("SELECT * FROM tb_pemesanan INNER JOIN tb_user ON tb_user.id_user=tb_pemesanan.id_user WHERE status = 'Belum dibayar' ");
                        $nomor_urut = 1;
                        foreach ($query as $data) : ?>
                                <tr>
                                    <th scope="row"><?=$nomor_urut; ?></th>
                                    <td><?=$data["id_pemesanan"]; ?></td>
                                    <td><?=$data["nama_lengkap"]; ?></td>
                                    <td><?=$data["no_meja"]; ?></td>
                                    <td><?=$data["tanggal_pemesanan"]; ?></td>
                                    <td>Rp. <?=number_format($data["total_belanja"]); ?></td>
                                    <td>
                                    <?php
                                    $status = 'Sudah dibayar';
                                    if ($status == $data["status"]){?>
                                        <span class="right badge badge-success"><?=$data['status'] ?></span>
                                        <?php }else{ ?>
                                        <span>On Proses</span><br>
                                        <span class="right badge badge-danger"><?=$data['status'] ?></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="detail_pesanan.php?id=<?=$data['id_pemesanan'] ?>"
                                            class="badge badge-primary">Detail</a>
                                        <a href="hapus_pesanan_riwayat.php?id=<?=$data['id_pemesanan'] ?>"
                                            class="badge badge-danger">Hapus</a>
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