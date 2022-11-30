<?php

include 'config/connector.php';

if(isset($_POST["register"])) {
    $name = $_POST["nama"];
    $email = strtolower($_POST["email"]);
    $password = mysqli_real_escape_string($koneksi2, $_POST["password"]);
    $konfirmasi_password = mysqli_real_escape_string($koneksi2, $_POST["konfirmasi_password"]);
    $no_hp = $_POST["no_hp"];
    $duplicate = mysqli_query($koneksi2, "SELECT email FROM user_vira WHERE email = '$email'");  
    
    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Email has already taken')</script>";
    }else{
        if($password == $konfirmasi_password){
            $query = "insert into user_vira (nama, email, password, no_hp) values ('$nama', '$email', ' $password', '$no_hp')";
            mysqli_query($koneksi2, $query);
            echo "<script> alert('Registration Successful')</script>";
            header("location:Login-Vira.php");
        }else{
            echo "<script> alert('Password does not match')</script>";
        }
    }

    
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col">
            <img src="images/login-car.jpg" alt="">
        </div>
        <div class="col mt-3 mb-3">
            <div class="header-title">
                <h4>Register</h4>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password">
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="register" value="Daftar" class="btn btn-primary" style="width: 150px;">
                    </div>

                    <div class="mb-3">
                        <p>Anda sudah punya akun? <a href="Login-Vira.php">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>