<?php
include "koneksi.php"; // Menghubungkan ke database

$id = $_GET['id']; // Mendapatkan ID buku dari URL

// Periksa koneksi MySQL
if (!$Koneksi) {
    die("Koneksi MySQL gagal: " . mysqli_connect_error());
}

// Atur waktu tunggu untuk menjalankan query
mysqli_query($Koneksi, "SET wait_timeout = 300"); // 5 menit

try {
    // Melakukan query untuk menghapus data buku
    $stmt = $Koneksi->prepare("DELETE FROM buku WHERE id_buku=?");
    $stmt->bind_param("i", $id);
    $query = $stmt->execute();

    if ($query) {
        echo "<script>
                alert('Hapus data buku berhasil');
                location.href = 'index.php?page=buku'; // Redirect ke halaman buku
              </script>";
    } else {
        throw new Exception("Gagal menghapus data buku");
    }
} catch (mysqli_sql_exception $e) {
    echo "<script>
            alert('Gagal menghapus data buku: " . $e->getMessage() . "');
            location.href = 'index.php?page=buku'; // Redirect ke halaman buku
          </script>";
}
?>