<?php
include "koneksi.php"; // Menghubungkan ke database

$id_peminjaman = $_GET['id']; // Mendapatkan ID peminjaman dari URL
$query = mysqli_query($Koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$id_peminjaman'");
$data = mysqli_fetch_array($query);

// Proses pengubahan data peminjaman
if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_SESSION['user']['id_user']; // Mengambil ID user dari session
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    $status_peminjaman = 'dipinjam';

    $update_query = mysqli_query($Koneksi, "UPDATE peminjaman SET id_buku='$id_buku', id_user='$id_user', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE id_peminjaman='$id_peminjaman'");

    if ($update_query) {
        echo "<script>alert('Pengubahan Peminjaman Berhasil'); location.href='?page=peminjaman';</script>";
    } else {
        echo "<script>alert('Pengubahan Peminjaman Gagal');</script>";
    }
}
?>

<h1 class="mt-4">Ubah Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="row">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select class="form-control" name="id_buku" required>
                                <option value="">Pilih Buku</option>
                                <?php
                                $buku_query = mysqli_query($Koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($buku_query)) {
                                    $selected = ($data['id_buku'] == $buku['id_buku']) ? 'selected' : '';
                                    echo "<option value='" . $buku['id_buku'] . "' $selected>" . $buku['judul'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_peminjaman" value="<?php echo $data['tanggal_peminjaman']; ?>" required id="tanggal_peminjaman">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_pengembalian" value="<?php echo $data['tanggal_pengembalian']; ?>" required id="tanggal_pengembalian">
                        </div>
                    </div>
                    <script>
                        document.getElementById('tanggal_peminjaman').addEventListener('change', function() {
                            var tanggal_peminjaman = new Date(this.value);
                            var tanggal_pengembalian = new Date(tanggal_peminjaman.getTime() + 4 * 24 * 60 * 60 * 1000);
                            var tahun = tanggal_pengembalian.getFullYear();
                            var bulan = tanggal_pengembalian.getMonth() + 1;
                            var hari = tanggal_pengembalian.getDate();
                            var tanggal_pengembalian_string = tahun + '-' + (bulan < 10 ? '0' : '') + bulan + '-' + (hari < 10 ? '0' : '') + hari;
                            document.getElementById('tanggal_pengembalian').value = tanggal_pengembalian_string;
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="status_peminjaman" value="Dipinjam" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan Perubahan</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>