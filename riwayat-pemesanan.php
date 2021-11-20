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
                    <th scope="col">No Meja</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor=1; ?>
                  <?php 
            $ambil = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan WHERE id_user = '".$_SESSION['id_user']."' ");
            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
          ?>
                  <?php foreach($result as $result) : ?>

                  <tr>
                    <th scope="row"><?php echo $nomor; ?></th>
                    <td><?php echo $result["id_pemesanan"]; ?></td>
                    <td><?php echo $result["no_meja"]; ?></td>
                    <td><?php echo $result["tanggal_pemesanan"]; ?></td>
                    <td>Rp. <?php echo number_format($result["total_belanja"]); ?></td>
                    <td>
                      <?php
                                    $status = 'Sudah dibayar';
                                    if ($status == $result['status']){?>
                      <span class="right badge badge-success"><?=$result['status'] ?></span>
                      <?php }else{ ?>
                      <span>On Proses</span><br>
                      <span class="right badge badge-danger"><?=$result['status'] ?></span>
                      <?php } ?>
                    </td>
                    <td>
                      <a href="detail_pesanan.php?id=<?php echo $result['id_pemesanan'] ?>"
                        class="badge badge-primary">Detail</a>
                      <?php
                                    $status = 'Sudah dibayar';
                                    if ($status == $result['status']){?>

                      <?php }else{ ?>
                      <a href="hapus_pesanan_riwayat.php?id=<?php echo $result['id_pemesanan'] ?>"
                        class="badge badge-danger">Hapus</a>
                      <?php } ?>
                    </td>


                    </td>
                  </tr>
                  <?php $nomor++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
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