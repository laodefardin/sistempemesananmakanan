<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Menu Utama</li>
        <li class="nav-item has-treeview menu-open">
            <a href="index" class="nav-link <?php if($halaman == 'dashboard') echo"active" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="daftar-menu" class="nav-link <?php if($halaman == 'daftar menu') echo"active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Daftar Menu
                </p>
            </a>
        </li>
        <!-- <li class="nav-item has-treeview">
            <a href="daftar-pesanan" class="nav-link <?php if($halaman == 'daftar pesanan') echo"active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Daftar Pesanan
                </p>
            </a>
        </li> -->
        <!-- <li class="nav-header">Pilih Menu</li> -->
        <!-- <li
            class="nav-item has-treeview <?php if($halaman == 'buku' OR $halaman == 'Edit Buku' OR $halaman == 'Edit Anggota' OR $halaman == 'anggota' OR $halaman == 'Tambah Anggota' OR $halaman == 'lokasi buku' OR $halaman == 'Tambah Lokasi Buku' OR $halaman == 'Edit Lokasi Buku' OR $halaman == 'Update Denda' OR $halaman == 'Edit Denda' OR $halaman == 'guru' OR $halaman == 'Tambah Guru' OR $halaman == 'Edit Guru') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'buku' OR $halaman == 'Edit Buku' OR $halaman == 'Edit Anggota' OR $halaman == 'anggota' OR $halaman == 'Tambah Anggota' OR $halaman == 'lokasi buku' OR $halaman == 'Tambah Lokasi Buku' OR $halaman == 'Edit Lokasi Buku' OR $halaman == 'Update Denda' OR $halaman == 'Edit Denda' OR $halaman == 'guru' OR $halaman == 'Tambah Guru' OR $halaman == 'Edit Guru') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Data Master
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="buku"
                        class="nav-link <?php if($halaman == 'buku' OR $halaman == 'Edit Buku') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Menu</p>
                    </a>
                    <a href="anggota"
                        class="nav-link <?php if($halaman == 'anggota' OR $halaman == 'Edit Anggota' OR $halaman == 'anggota' OR $halaman == 'Tambah Anggota') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Anggota</p>
                    </a>
                    <a href="guru"
                        class="nav-link <?php if($halaman == 'guru' OR $halaman == 'Edit Guru' OR $halaman == 'guru' OR $halaman == 'Tambah Guru') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Guru</p>
                    </a>
                    <a href="lokasibuku"
                        class="nav-link <?php if($halaman == 'Tambah Lokasi Buku' OR $halaman == 'lokasi buku' OR $halaman == 'Edit Lokasi Buku') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lokasi Buku</p>
                    </a>
                    <a href="denda"
                        class="nav-link <?php if($halaman == 'Update Denda' OR $halaman == 'Edit Denda') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Update Denda</p>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="nav-item has-treeview <?php if($halaman == 'Transaksi Pinjam' OR $halaman == 'Tambah Transaksi Pinjam' OR $halaman == 'Data Transaksi Kembali' OR $halaman == 'Transaksi Buku Hilang' OR $halaman == 'Transaksi Ganti Rugi' OR $halaman == 'Transaksi Buku Belum diambil') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'Transaksi Pinjam' OR $halaman == 'Tambah Transaksi Pinjam' OR $halaman == 'Data Transaksi Kembali' OR $halaman == 'Transaksi Buku Hilang' OR $halaman == 'Transaksi Ganti Rugi' OR $halaman == 'Transaksi Buku Belum diambil') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Data Transaksi
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="transaksi"
                        class="nav-link <?php if($halaman == 'Transaksi Pinjam' OR $halaman == 'Tambah Transaksi Pinjam') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Transaksi Pinjam</p>
                    </a>
                    <a href="transaksi-kembali"
                        class="nav-link <?php if($halaman == 'Data Transaksi Kembali') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Transaksi Kembali</p>
                    </a>
                    <a href="transaksi-belumdiambil"
                        class="nav-link <?php if($halaman == 'Transaksi Buku Belum diambil') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Buku belum diambil</p>
                    </a>
                    <a href="transaksi-bukuhilang"
                        class="nav-link <?php if($halaman == 'Transaksi Buku Hilang') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Buku Hilang</p>
                    </a>
                    <a href="transaksi-gantirugi"
                        class="nav-link <?php if($halaman == 'Transaksi Ganti Rugi') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ganti Rugi Buku</p>
                    </a>
                </li>
            </ul>
        </li>

        <li
            class="nav-item has-treeview <?php if($halaman == 'Laporan Data Buku' OR $halaman == 'Laporan Data Anggota' OR $halaman == "Laporan Data Peminjaman Buku" OR $halaman == "Laporan Data Pengembalian Buku" OR $halaman == 'Laporan Ganti Rugi Buku' OR $halaman == 'Laporan Data Buku Hilang') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'Laporan Data Buku' OR $halaman == 'Laporan Data Anggota' OR $halaman == 'Laporan Data Peminjaman Buku' OR $halaman == 'Laporan Data Pengembalian Buku' OR $halaman == 'Laporan Ganti Rugi Buku' OR $halaman == 'Laporan Data Buku Hilang') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Laporan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="laporan-buku"
                        class="nav-link <?php if($halaman == 'Laporan Data Buku') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Buku</p>
                    </a>
                    <a href="laporan-anggota"
                        class="nav-link <?php if($halaman == 'Laporan Data Anggota') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Anggota</p>
                    </a>
                    <a href="laporan-transaksi"
                        class="nav-link <?php if($halaman == 'Laporan Data Peminjaman Buku') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Transaksi Pinjam</p>
                    </a>
                    <a href="laporan-transaksikembali"
                        class="nav-link <?php if($halaman == 'Laporan Data Pengembalian Buku') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Transaksi Kembali</p>
                    </a>
                    <a href="laporan-bukuhilang"
                        class="nav-link <?php if($halaman == 'Laporan Data Buku Hilang') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Buku Hilang</p>
                    </a>
                    <a href="laporan-gantirugi"
                        class="nav-link <?php if($halaman == 'Laporan Ganti Rugi Buku') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Ganti Rugi Buku</p>
                    </a>
                </li>
            </ul>
        </li>
-->
<li
            class="nav-item has-treeview <?php if($halaman == 'daftar pesanan' or $halaman == 'pesanan selesai') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'daftar pesanan' or $halaman == 'pesanan selesai') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Daftar Pesanan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="daftar-pesanan" class="nav-link <?php if($halaman == 'daftar pesanan') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menunggu Antrian</p>
                    </a>
                    <a href="pesanan-selesai" class="nav-link <?php if($halaman == 'pesanan selesai') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pesanan Selesai</p>
                    </a>
                </li>
            </ul>
        </li> 
        
        <li
            class="nav-item has-treeview <?php if($halaman == 'setting' or $halaman == 'uploadfoto' or $halaman == 'profil') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'setting' or $halaman == 'uploadfoto' or $halaman == 'profil') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Pengaturan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="setting-profil" class="nav-link <?php if($halaman == 'profil') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profil</p>
                    </a>
                    <a href="setting-password" class="nav-link <?php if($halaman == 'setting') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>
            </ul>
        </li> 
    </ul>
</nav>
<!-- /.sidebar-menu -->

</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark"><?php echo ucfirst($halaman); ?></h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active"> <?php echo ucfirst($halaman); ?></li>
                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->