<?php
include "koneksi.php"; // Menghubungkan ke database

// Pastikan pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Cek level pengguna
if ($_SESSION['user']['level'] != 'admin' && $_SESSION['user']['level'] != 'petugas') {
    header('Location: index.php');
    exit;
}
?>

<h1 class="mt-4">Laporan Peminjaman</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- Tombol Cetak Laporan -->
                <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</a>
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Denda</th>
                       
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($Koneksi, "SELECT peminjaman.*, user.nama AS user_nama, buku.judul AS judul 
                                                      FROM peminjaman 
                                                      JOIN user ON peminjaman.id_user = user.id_user 
                                                      JOIN buku ON peminjaman.id_buku = buku.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['user_nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status_peminjaman']; ?></td>
                            <td><?php echo $data['denda']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>