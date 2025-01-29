<?php
include "koneksi.php"; // Menghubungkan ke database

// Mendapatkan ID pengguna dari URL
$id_user = $_GET['id'];

// Mengambil data pengguna dari database
$query = mysqli_query($Koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
$data = mysqli_fetch_array($query);

// Proses pengubahan data pengguna
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $username = $_POST['username'];
    $level = $_POST['level'];

    $update_query = mysqli_query($Koneksi, "UPDATE user SET nama='$nama', email='$email', no_telepon='$no_telepon', username='$username', level='$level' WHERE id_user='$id_user'");

    if ($update_query) {
        echo "<script>alert('Pengubahan Data Pengguna Berhasil'); location.href='?page=user';</script>";
    } else {
        echo "<script>alert('Pengubahan Data Pengguna Gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengguna</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Ubah Data Pengguna</h1>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" value="<?php echo $data['no_telepon']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" required>
                            <option value="peminjam" <?php echo ($data['level'] == 'peminjam') ? 'selected' : ''; ?>>Peminjam</option>
                            <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="petugas" <?php echo ($data['level'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Simpan Perubahan</button>
                    <a href="?page=user" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>