<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
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
    include "koneksi.php";
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
<script>
    window.print();
</script>