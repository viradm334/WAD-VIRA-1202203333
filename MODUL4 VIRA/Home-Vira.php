<?php

include 'config/connector.php';

session_start();

if (isset($_SESSION['session_email'])) {
    $login_as = $_SESSION["session_email"];
    $result_login = mysqli_query($koneksi2, "SELECT * FROM user_vira WHERE email = '$login_as'");
    $data_login = mysqli_fetch_assoc($result_login);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>">
        <div class="container py-2">
            <?php if (isset($_SESSION["session_email"])) : ?>
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="ListCar-Vira.php">MyCar</a>
                </div>
                <div class="d-flex">
                    <a href="Add-Vira.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" role="button">Add Car</a>
                    <div class="dropdown ms-4">
                        <button class="btn btn-light dropdown-toggle text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $data_login["nama"]; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="Profile-Vira.php">Profile</a></li>
                            <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="config/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            <?php else : ?>
                <div class="navbar-nav w-100 d-flex justify-content-between">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="Login-Vira.php">Login</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <section>
        <div class="container mt-5">
            <form action="Add-Vira.php">
                <div class="row">
                    <div class="col mt-5">
                        <div class="header-title">
                            <h1>Selamat datang di Show Room <?= isset($_SESSION["session_email"]) ? $data_login['nama'] : "" ?> </h1>
                        </div>
                        <div class="content">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate doloribus minima necessitatibus hic veritatis accusamus autem harum tempore fugit, ut et odio eaque quisquam eos voluptatem veniam maxime est pariatur!</p>
                        </div>
                        <?php
                        if (isset($_SESSION["session_email"])) { ?>
                            <a href="<?php

                                        $sql3 = "select count(*) from mobil";
                                        $q3 = mysqli_query($koneksi, $sql3);
                                        $row = mysqli_fetch_array($q3);
                                        $total = $row[0];

                                        if ($total = 0) {
                                            echo 'Add-Vira.php';
                                        } else {
                                            echo 'ListCar-Vira.php';
                                        }

                                        ?>"><button type="button" class="btn btn-primary" style="width: 100px;">MyCar</button></a>
                        <?php } ?>


                        <div class="row mt-3">
                            <div class="col">
                                <img src="https://i.ibb.co/ZV9YWRw/logo-ead.png" alt="logo-ead" border="0" style="width:100px; height:30px;">
                            </div>
                            <div class="col">
                                <p>Vira_1202203333</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/car-5.png" alt="" style="width: 500px; height:500px">
                    </div>
                </div>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>