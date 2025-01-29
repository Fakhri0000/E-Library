<?php
include "koneksi.php"; // Menghubungkan ke database

// Proses penambahan ulasan
if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_SESSION['user']['id_user']; // Mengambil ID user dari session atau input
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $query = mysqli_query($Koneksi, "INSERT INTO ulasan(id_buku, id_user, ulasan, rating) VALUES ('$id_buku', '$id_user', '$ulasan', '$rating')");

    if ($query) {
        echo "<script>alert('Ulasan berhasil ditambahkan'); location.href='?page=ulasan';</script>";
    } else {
        echo "<script>alert('Ulasan gagal ditambahkan');</script>";
    }
}
?>

<h1 class="mt-4">Tambah Ulasan</h1>
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
                                    echo "<option value='" . $buku['id_buku'] . "'>" . $buku['judul'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">Ulasan</div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="ulasan" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Rating</div>
                        <div class="col-md-8">
                            <select class="form-control" name="rating" required>
                                <option value="">Pilih Rating</option>
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan Ulasan</button>
                            <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>