<?php
$halaman = 'pesanan selesai';
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
                            <a href="pesanan-selesai" class="btn btn-success btn-sm">Kembali</a>
                        </form>
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