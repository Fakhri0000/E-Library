<?php
include "koneksi.php"; // Menghubungkan ke database

$id = $_GET['id']; // Mendapatkan ID peminjaman dari URL

// Melakukan query untuk menghapus data peminjaman
$query = mysqli_query($Koneksi, "DELETE FROM peminjaman WHERE id_peminjaman='$id'");

if ($query) {
    echo "<script>
            alert('Hapus data peminjaman berhasil');
            location.href = 'index.php?page=peminjaman'; // Redirect ke halaman peminjaman
          </script>";
} else {
    echo "<script>
            alert('Hapus data peminjaman gagal');
            location.href = 'index.php?page=peminjaman'; // Redirect ke halaman peminjaman
          </script>";
}
?>