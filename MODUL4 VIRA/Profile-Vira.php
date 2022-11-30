<?php
require "config/connector.php";
session_start();

$pilihan_warna = [
    "primary" => "Blue",
    "dark" => "Black",
    "success" => "Green",
];

if (isset($_SESSION["session_email"])) {
    $login_as = $_SESSION["session_email"];
    $result_login = mysqli_query($koneksi2, "SELECT * FROM user_vira WHERE email = '$login_as'");
    $data_login = mysqli_fetch_assoc($result_login);
} else {
    header("Location: Login-Vira.php");
    exit;
}

if (isset($_POST["update"])) {
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $password = mysqli_real_escape_string($koneksi2, $_POST["password"]);
    $konfirmasi_password = mysqli_real_escape_string($koneksi2, $_POST["konfirmasi_password"]);
    setcookie("warna_navbar", $_POST["warna_navbar"], time() + 86400, "/");

    if ($password == $konfirmasi_password) {
        $query = "UPDATE user_vira SET
                nama = '$nama',
                no_hp = '$no_hp',
                password = '$password'
              WHERE email = '$email'";
        mysqli_query($koneksi2, $query);
    }

    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- My CSS -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container py-2">
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link" href="ListCar-Vira.php">MyCar</a>
            </div>
            <div class="d-flex">
                <a href="Add-Vira.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" role="button">Add Car</a>
                <div class="dropdown ms-4">
                    <button class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?> dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $data_login["nama"]; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="Profile-Vira.php">Profile</a></li>
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="config/logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container mt-4">
        <h2 class="fw-bold text-center">Profile</h2>
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="mb-3 row position-relative">
                        <label for="nameinput" class="col-sm-2 col-form-label text-muted">Email</label>
                        <div class="col-sm-10">
                            <input type="text" disabled class="form-control" name="email" id="email" value="<?= $data_login["email"]; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row position-relative">
                        <label for="nameinput" class="col-sm-2 col-form-label text-muted">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_login["nama"]; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row position-relative">
                        <label for="nameinput" class="col-sm-2 col-form-label text-muted">Nomor Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $data_login["no_hp"]; ?>">
                        </div>
                    </div>
                    <hr>

                    <div class="mb-3 row position-relative">
                        <label for="dateinput" class="col-sm-2 col-form-label text-muted">Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="konfimasi_password" class="col-sm-2 col-form-label text-muted">Konfirmasi Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control text-muted" id="konfimasi_password" name="konfirmasi_password" placeholder="Konfirmasi Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="warna_navbar" class="col-sm-2 col-form-label text-muted">Warna Navbar</label>
                        <div class="col-sm-10">
                            <select class="form-select text-muted" aria-label="Warna Navbar" id="warna_navbar" name="warna_navbar">
                                <?php foreach ($pilihan_warna as $warna => $value) : ?>
                                    <?php $selected = $warna == $_COOKIE["warna_navbar"] ? "selected" : "" ?>
                                    <option value="<?= $warna; ?>" <?= $selected; ?>><?= $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?> px-4 button" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex align-items-center logo-ead">
            <img src="https://i.ibb.co/ZV9YWRw/logo-ead.png" alt="logo-ead" border="0" style="width:100px; height:30px;">
            <span class="ms-5 text-muted">Vira_1202203333</span>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>