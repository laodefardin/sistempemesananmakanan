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
          <div class="alert alert-info alert-dismissible">
            <h5><i class="icon fas fa-info"></i>Selamat Datang!</h5>
            Selamat datang di Sistem Pemesanan Makanan
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

            <?php 
            if (!isset($_SESSION['username'])){?>
            <div class="col-md-12">
              <?php }else{ ?>
              <div class="col-md-8">
                <?php } ?>
                <div class="card card-info">
                  <!-- /.card-header -->
                  <div class="card-header">
                    <h3 class="card-title">Silahkan Pesan Menu Sesuai Keinginan Anda</h3>
                  </div>
                  <div class="card-body">
                    <!-- Menu -->

                    <div class="row mt-1">
                      <?php 
                          $query = mysqli_query($koneksi, 'SELECT * FROM tb_produk');
                          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);?>
                      <?php foreach($result as $result) : ?>
                      <div class="col-md-3 mt-4">
                        <img src="upload/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold"><?php echo $result['nama_menu'] ?></h5>
                          <br>
                          <label class="card-text harga"><strong>Rp.</strong>
                            <?php echo number_format($result['harga']); ?></label><br>

                          <?php 
                          if (!isset($_SESSION['username'])){?>
                          <button class="btn btn-success btn-sm btn-block"
                            onClick="alert('Untuk memesan anda harus login terlebih dahulu');document.location='login'">Pesan</button>
                          <?php }else{ ?>
                          <a href="beli?id_menu=<?php echo $result['id_menu']; ?>"
                            class="btn btn-success btn-sm btn-block ">Pesan</a>
                          <?php } ?>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>

                    <!-- Akhir Menu -->

                  </div>

                </div>
              </div>

              <?php 
            if (!isset($_SESSION['username'])){?>

              <?php }else{ ?>
              <div class="col-md-4">
                <div class="card card-info">
                  <!-- /.card-header -->
                  <div class="card-header">
                    <h3 class="card-title">Pemesanan Anda</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                    <form method="POST" action="">
                      <label for="exampleInputEmail1">Atas Nama</label>
                      <input type="text" class="form-control" value="<?= $_SESSION["nama"]?>" name="nama"
                        disabled="">
                      <input type="text" class="form-control" value="<?= $_SESSION["id_user"]?>" name="id_user"
                        hidden >
                    </div>
                    <input type="number" class="form-control" name="nomeja" placeholder="No Meja" required>

                    <br>
                    <div class="table-responsive">

                      <table class="table table-bordered" id="example" style="font-size: 13px;">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subharga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $nomor=1; ?>
                          <?php $totalbelanja = 0; ?>
            <?php 
            if (!isset($_SESSION['username'])){?>
            <div class="col-md-12">
              <?php }else{ ?>
              <div class="col-md-8">
                <?php } ?>
                          
                          <?php
                          if (!isset($_SESSION['pesanan'])){

                          }else{
                          foreach ($_SESSION['pesanan'] as $id_menu => $jumlah) {
                          ?>
                          <?php
                          

                          $ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_menu='$id_menu'");
                          $pecah = $ambil -> fetch_assoc();
                          $subharga = $pecah["harga"]*$jumlah;
                          ?>
                          <tr>
                            <td>
                              <a href="hapus_pesanan?id_menu=<?php echo $id_menu ?>" class="badge badge-danger"><i
                                  class="fa fa-trash"></i></a>
                            </td>
                            <td><?php echo $pecah["nama_menu"]; ?></td>
                            <td><?php echo number_format($pecah["harga"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo number_format($subharga); ?></td>
                          </tr>
                          <?php $nomor++; ?>
                          <?php $totalbelanja+=$subharga; ?>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="4">Total Belanja</th>
                            <th colspan="2">Rp. <?php echo number_format($totalbelanja) ?></th>
                          </tr>
                        </tfoot>
                      </table><br>
                      
                        <!-- <a href="menu_pembeli.php" class="btn btn-primary btn-sm">Lihat Menu</a> -->
                        <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
                      </form>

                      <?php 
                        if(isset($_POST['konfirm'])) {
                            $id_user = $_SESSION['id_user'];
                            $nomeja = $_POST['nomeja'];
                            $tanggal_pemesanan=date("Y-m-d");

                            // Menyimpan data ke tabel pemesanan
                            $insert = mysqli_query($koneksi, "INSERT INTO tb_pemesanan (id_user, no_meja, tanggal_pemesanan, total_belanja, status) VALUES ('$id_user','$nomeja','$tanggal_pemesanan', '$totalbelanja','Belum Dibayar')");

                            // Mendapatkan ID barusan
                            $id_terbaru = $koneksi->insert_id;

                           // Menyimpan data ke tabel pemesanan produk
                            foreach ($_SESSION["pesanan"] as $id_menu => $jumlah)
                            {
                              $insert = mysqli_query($koneksi, "INSERT INTO tb_pemesanan_produk (id_pemesanan, id_menu, jumlah) 
                              VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
                            }          

                            // Mengosongkan pesanan
                            unset($_SESSION["pesanan"]);

                           // Dialihkan ke halaman nota
                            echo "<script>alert('Pemesanan Sukses!');</script>";
                            echo "<script>location= 'riwayat-pemesanan'</script>";
                            }
                            ?>

                    </div>



                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.card -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- /.content-wrapper -->
<?php include 'global_footer.php'; ?>