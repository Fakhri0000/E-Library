<?php
include "koneksi.php"; // Menghubungkan ke database



// Pastikan pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Cek level pengguna
if ($_SESSION['user']['level'] != 'admin' && $_SESSION['user']['level'] != 'petugas') {
    header('Location: index.php'); 
    exit;
}

// Mendapatkan ID pengguna dari URL
$id_user = $_GET['id'];

// Proses penghapusan data pengguna
if (isset($id_user)) {
    $delete_query = mysqli_query($Koneksi, "DELETE FROM user WHERE id_user='$id_user'");

    if ($delete_query) {
        echo "<script>alert('Penghapusan Data Pengguna Berhasil'); location.href='?page=user';</script>";
    } else {
        echo "<script>alert('Penghapusan Data Pengguna Gagal'); location.href='?page=user';</script>";
    }
} else {
    echo "<script>alert('ID Pengguna Tidak Ditemukan'); location.href='?page=user';</script>";
}
?>