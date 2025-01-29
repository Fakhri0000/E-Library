<?php
    session_start();
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login E-Library</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-primary {
            background-color: #122D4F;
            padding: 10px 20px;
            border-radius: 5px;
            width:200px;
        }
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 450px;
            padding: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">
                <i class="fas fa-book"></i> Login E-Library
            </h3>
        </div>
            <div class="card-body">
                <?php
                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $data = mysqli_query($Koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
                        $cek = mysqli_num_rows($data);
                        if ($cek > 0) {
                            $user = mysqli_fetch_array($data);
                            $_SESSION['user'] = $user;
                            header('Location: main.php');
                            exit;
                        } else {
                            echo '<script>alert("Maaf, Username/Password salah")</script>';
                        }
                    }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Username</label>
                        <input class="form-control py-3" id="inputEmailAddress" name="username" placeholder="Enter username" type="text">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-3" id="inputPassword" name="password" placeholder="Enter password" type="password">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 flex-column">
                        <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                        <a class="btn btn-primary mt-2" href="register.php">Register</a>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="small">
                    &copy;2024 E-Library.
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>