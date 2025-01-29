<?php
include "koneksi.php"; // Menghubungkan ke database
?>

<h1 class="mt-4">Tambah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $deskripsi = $_POST['deskripsi'];

                        $query = mysqli_query($Koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES ('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                        if ($query) {
                            echo "<script>alert('Tambah Data Buku Berhasil')</script>";
                        } else {
                            echo "<script>alert('Tambah Data Buku Gagal')</script>";
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select class="form-control" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                $kategori_query = mysqli_query($Koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($kategori_query)) {
                                    echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="judul" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penulis" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penerbit" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8"><textarea class="form-control" name="deskripsi" required></textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>