<?php
include "koneksi.php"; // Menghubungkan ke database
?>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>e-library</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
            <?php
                // Cek apakah user yang login adalah admin
                if ($_SESSION['user']['level'] != 'admin') {
                    ?>
                    <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Ulasan</a>
                    <?php
                }
                ?>
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($Koneksi, "SELECT ulasan.*, user.nama AS user_nama, buku.judul AS buku_judul 
                                                      FROM ulasan 
                                                      JOIN user ON ulasan.id_user = user.id_user 
                                                      JOIN buku ON ulasan.id_buku = buku.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['user_nama']; ?></td>
                            <td><?php echo $data['buku_judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td>
                                <a onclick="return confirm('Apakah Anda Yakin Menghapus Ulasan Ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>