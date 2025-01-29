<?php
include "koneksi.php"; // Menghubungkan ke database

// Mengambil data pengguna dari database
$query = mysqli_query($Koneksi, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Daftar Pengguna</h1>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['no_telepon']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                            <td>
                                <a href="?page=user_ubah&&id=<?php echo $data['id_user']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');" href="?page=user_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>