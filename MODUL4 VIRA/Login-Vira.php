<?php

session_start();

include 'config/connector.php';

$error = '';
$email = '';
$ingataku = '';

if(isset($_COOKIE['cookie_email'])){
  $cookie_email = $_COOKIE['cookie_email'];
  $cookie_password = $_COOKIE['cookie_password'];

  $sql1 = "select * from user_vira where email = '$cookie_email'";
  $q1 = mysqli_query($koneksi2, $sql1);
  $r1 = mysqli_fetch_array($q1);

  if($r1['password'] == $cookie_password){
    $_SESSION['session_email'] = $cookie_email;
    $_SESSION['session_password'] = $cookie_password;
  }
}

if(isset($_SESSION['session_email'])){
  header("location:Home-Vira.php");
  exit();
}

if (isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $ingataku = $_POST['ingataku'];

  if($username == '' or $password == ''){
    $error .= "<li>Silahkan masukkan username dan password</li>";
  }else{
    $sql4 = "select * from user_vira where email = '$email'";
    $q4 = mysqli_query($koneksi2, $sql4);
    $r4 = mysqli_fetch_array($q4);

    if($r4['email'] == ''){
      $error .= "<li>Email tidak terdaftar</li>";
    }elseif($r4['password'] != $password){
      $error .= "<li>Password Salah</li>";
    }

    if(empty($error)){
      $_SESSION['session_email'] = $email;
      $_SESSION['session_password'] = $password;

      if($ingataku == 1){
        $cookie_name = "cookie_email";
        $cookie_value = $email;
        $cookie_time = time() + (60 * 60 * 24 * 30);
        setcookie($cookie_name, $cookie_value, $cookie_time, "/");

      if($ingataku == 1){
        $cookie_name = "cookie_password";
        $cookie_value = $password;
        $cookie_time = time() + (60 * 60 * 24 * 30);
        setcookie($cookie_name, $cookie_value, $cookie_time, "/");
      }
      header("location:Profile-Vira.php");
    }
  }else{
    echo $error;
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
    <div class="col mb-3">
      <img src="images/login-car.jpg" alt="">
    </div>
    <div class="col mt-3 mb-3">
      <div class="header-title">
        <h4>Login</h4>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="nameinput" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php if(isset($_COOKIE['cookie_email'])){echo $_COOKIE['cookie_email'];};?>">
          </div>
          <div class="mb-3">
            <label for="nameinput" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php if(isset($_COOKIE['cookie_password'])){echo $_COOKIE['cookie_password'];};?>">
          </div>

          <div class="form-check mb-3">
          <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php if($ingataku == '1') echo "checked"?>> Remember Me
          </div>

          <div class="mb-3">
            <input type="submit" name="login" value="Login" class="btn btn-primary" style="width: 150px;">
          </div>

          <div class="mb-3">
            <p>Anda belum punya akun? <a href="Register-Vira.php">Daftar</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>