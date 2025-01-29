<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Perpustakaan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            background-image: url(assets/img/bg.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #122D4F;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-primary {
            background-color: #122D4F;
            padding: 10px 20px;
            border-radius: 5px;
            width:200px;
        }
        .register-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 450px;
            padding: 30px;
            margin-top: 0;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
                <h3 class="text-center font-weight-light my-4">
                    <i class="fas fa-book" style="margin-right: 10px;"></i> Register E-Library
                </h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label class="small mb-1" for="inputNama">Nama Lengkap</label>
                        <input class="form-control py-2" id="inputNama" name="nama" placeholder="Enter nama lengkap" type="text" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmail">Email</label>
                        <input class="form-control py-2" id="inputEmail" name="email" placeholder="Enter email" type="email" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputNoTelepon">No. Telepon</label>
                        <input class="form-control py-2" id="inputNoTelepon" name="no_telepon" placeholder="Enter no. telepon" type="text" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputUsername">Username</label>
                        <input class="form-control py-2" id="inputUsername" name="username" placeholder="Enter username" type="text" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-2" id="inputPassword" name="password" placeholder="Enter password" type="password" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputLevel">Level</label>
                        <select class="form-control py-2" id="inputLevel" name="level" required>
                        <option value="peminjam">Peminjam</option>
                        <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary me-2" type="submit" name="register">Register</button>
                        <a class="btn btn-primary" href="login.php">Login</a>
                    </div>
                        </form>
                        <?php
                        if (isset($_POST['register'])) {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $no_telepon = $_POST['no_telepon'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $level = $_POST['level'];

                        $insert = mysqli_query($Koneksi, "INSERT INTO user(nama,email,no_telepon,username,password,level) VALUES('$nama','$email','$no_telepon','$username','$password','$level')");

                        if ($insert) {
                        echo '<script>alert("Selamat, register berhasil, Silahkan Login");location.href="login.php"<script>';
                        } else {
                        echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                        }
                        }
                        ?>
                </div>
            </div>
    </div>
</body>
</html>