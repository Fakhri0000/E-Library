<?php

include "koneksi.php"; // Include the database connection

$user_level = $_SESSION['user']['level'];
?>
<h1 class="mt-4">Dashboard</h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($Koneksi, "SELECT*FROM kategori"));
                                    ?>   
                                    Total Kategori</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="kategori.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                        <?php
                                            echo mysqli_num_rows(mysqli_query($Koneksi, "SELECT*FROM buku"));
                                        ?>    
                                    Total Buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="buku.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <?php
                                            echo mysqli_num_rows(mysqli_query($Koneksi, "SELECT*FROM ulasan"));
                                        ?>    
                                    Total Ulasan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="ulasan.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <?php
                                        // Hanya tampilkan total user untuk admin dan petugas
                                        if ($user_level == 'admin' || $user_level == 'petugas') {
                                            $result = mysqli_query($Koneksi, "SELECT * FROM user");
                                            echo mysqli_num_rows($result);
                                        } else {
                                            echo "Akses Terbatas"; // Pesan jika bukan admin atau petugas
                                        }
                                        ?>    
                                        Total User
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php if ($user_level == 'admin' || $user_level == 'petugas'): ?>
                                            <a class="small text-white stretched-link" href="user.php">View Details</a>
                                        <?php else: ?>
                                            <span class="small text-white">Akses Terbatas</span> <!-- Pesan untuk peminjam -->
                                        <?php endif; ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="200">Nama</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['nama'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Level User</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['level'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Tanggal Login</td>
                                        <td width="1">:</td>
                                        <td><?php echo date('d-m-y');?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        