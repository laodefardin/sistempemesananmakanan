<?php 
include 'global_header.php';
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
                            <h3 class="card-title">Riwayat Pemesanan Anda</h3>
                        </div>
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">ID Pemesanan</th>
                                        <th scope="col">Nama Pesanan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah </th>
                                        <th scope="col">Subharga</th>
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor=1; ?>
                                    <?php $totalbelanja = 0; ?>
                                    <?php 
            $ambil = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan_produk JOIN tb_produk ON tb_pemesanan_produk.id_menu=tb_produk.id_menu WHERE tb_pemesanan_produk.id_pemesanan='$_GET[id]' ");

            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
          ?>
                                    <?php foreach($result as $data) : ?>
<?php $subharga1=$data['harga']*$data['jumlah']; ?>
                                    <tr>
                                        <th scope="row"><?= $nomor; ?></th>
                                        <td><?= $data["id_pemesanan"]; ?></td>
                                        <td><?= $data["nama_menu"]; ?></td>
                                        <td>Rp. <?= number_format($data['harga']); ?></td>
                                        <td><?php echo $data['jumlah']; ?></td>
                                        <td>
                                            Rp. <?= number_format($data['harga']*$data['jumlah']); ?>
                                        </td>
                                        <!-- <td>
                                            <a href="hapus-pesanan-user.php?id=<?= $data['id_pemesanan_produk'] ?>&pesan=<?=$_GET['id']?>"
                                                class="badge badge-danger">Hapus</a>
                                        </td> -->
                                    </tr>
                                    <?php $nomor++; ?>
                                    <?php $totalbelanja+=$subharga1; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total Bayar</th>
                                        <th>Rp. <?= number_format($totalbelanja) ?></th>
                                    </tr>
                                </tfoot>
                            </table>
 <form method="POST" action="">
                <a href="riwayat-pemesanan" class="btn btn-success btn-sm">Kembali</a>
                <!-- <button class="btn btn-primary btn-sm" name="bayar">Konfirmasi Pembayaran</button> -->
              </form>
                        </div>
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