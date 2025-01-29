<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($Koneksi, "DELETE FROM kategori WHERE id_kategori=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href = "index.php?page=kategori";
</script>
