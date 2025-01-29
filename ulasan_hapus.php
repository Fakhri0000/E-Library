<?php
include "koneksi.php"; // Menghubungkan ke database

// Mendapatkan ID ulasan dari URL
$id = $_GET['id'];

// Melakukan query untuk menghapus ulasan
$query = mysqli_query($Koneksi, "DELETE FROM ulasan WHERE id_ulasan='$id'");

if ($query) {
    echo "<script>
            alert('Ulasan berhasil dihapus');
            location.href = '?page=ulasan'; // Redirect ke halaman ulasan
          </script>";
} else {
    echo "<script>
            alert('Ulasan gagal dihapus');
            location.href = '?page=ulasan'; // Redirect ke halaman ulasan
          </script>";
}
?>