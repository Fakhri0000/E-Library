<?php
// Koneksi ke database
include "koneksi.php";

// Fungsi untuk menghitung denda
function hitungDenda($tanggalPengembalian, $tanggalBatas) {
    $selisihHari = date_diff(date_create($tanggalPengembalian), date_create($tanggalBatas));
    return $selisihHari->days * 500; // Denda per hari
}

// Cek apakah id peminjaman ada
if (isset($_GET['id'])) {
    $idPeminjaman = $_GET['id'];

    // Query untuk mendapatkan data peminjaman
    $query = "SELECT * FROM peminjaman 
              LEFT JOIN user ON user.id_user = peminjaman.id_user 
              LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
              WHERE peminjaman.id_peminjaman = ?";

    // Preparasi query
    $stmt = $Koneksi->prepare($query);
    $stmt->bind_param("i", $idPeminjaman);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Cek apakah data peminjaman ada
    if ($data) {
        // Hitung denda
        $denda = hitungDenda($data['tanggal_pengembalian'], $data['tanggal_batas']);

        // Proses pengembalian buku
        if (isset($_POST['kembalikan'])) {
            $idPeminjaman = $_POST['id_peminjaman'];
            $tanggalPengembalian = date('Y-m-d');
            $statusPeminjaman = 'dikembalikan';

            // Query untuk mengupdate data peminjaman
            $query = "UPDATE peminjaman 
                      SET tanggal_pengembalian = ?, 
                          status_peminjaman = ?, 
                          denda = ? 
                      WHERE id_peminjaman = ?";

            // Preparasi query
            $stmt = $Koneksi->prepare($query);
            $stmt->bind_param("sssi", $tanggalPengembalian, $statusPeminjaman, $denda, $idPeminjaman);
            $stmt->execute();

            // Cek apakah query berhasil
            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Buku telah dikembalikan! Denda: Rp. $denda'); window.location.href='?page=peminjaman';</script>";
            } else {
                echo "<script>alert('Gagal mengembalikan buku!'); window.location.href='?page=peminjaman';</script>";
            }
        }
    } else {
        echo "<script>alert('Data peminjaman tidak ada!'); window.location.href='?page=peminjaman';</script>";
    }
} else {
    echo "<script>alert('Id peminjaman tidak ada!'); window.location.href='?page=peminjaman';</script>";
}
?>

<h1 class="mt-4">Pengembalian Buku</h1>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <input type="hidden" name="id_peminjaman" value="<?php echo $data['id_peminjaman']; ?>">
            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" value="<?php echo $data['judul']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Peminjaman</label>
                <input type="text" class="form-control" value="<?php echo $data['tanggal_peminjaman']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Pengembalian</label>
                <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-2">Denda</div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="denda" value="<?php echo $denda; ?>" readonly>
                </div>
            </div>
            <button type="submit" name="kembalikan" class="btn btn-success">Kembalikan Buku</button>
        </form>
    </div>
</div>