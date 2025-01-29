<?php
include "koneksi.php"; // Menghubungkan ke database

$id = $_GET['id']; // Mendapatkan ID buku dari URL
$query = mysqli_query($Koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $id_kategori = $_POST['id_kategori'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];

    $update_query = mysqli_query($Koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku='$id'");

    if ($update_query) {
        echo "<script>alert('Ubah Data Buku Berhasil')</script>";
        echo "<script>location.href='?page=buku'</script>";
    } else {
        echo "<script>alert('Ubah Data Buku Gagal')</script>";
    }
}
?>

<h1 class="mt-4">Ubah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="row">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select class="form-control" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                $kategori_query = mysqli_query($Koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($kategori_query)) {
                                    $selected = ($data['id_kategori'] == $kategori['id_kategori']) ? 'selected' : '';
                                    echo "<option value='" . $kategori['id_kategori'] . "' $selected>" . $kategori['kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penulis" value="<?php echo $data['penulis']; ?>" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penerbit" value="<?php echo $data['penerbit']; ?>" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8"><textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea></div>
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