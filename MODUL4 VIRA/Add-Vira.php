<?php

include 'config/insert.php';

session_start();

if (!isset($_SESSION['session_email'])) {
    header("location:Login-Vira.php");
    exit();
} else {
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

    <section>
        <div class="container">
            <div class="container mt-5">
                <h5 class="text-center">
                    Tambah Mobil
                </h5>
                <p class="text-center">
                    Tambah mobil anda ke list show room
                </p>
            </div>
            <div class="col-md-9">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>

                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>

                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="..." class="rounded me-2" alt="...">
                                <strong class="me-auto">Alert</strong>
                                <small>Just Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <?php echo $sukses ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <form class="" action="" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" name="namamobil" id="namamobil">
                    </div>

                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="namapemilik" id="namapemilik">
                    </div>

                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Merk</label>
                        <input type="text" class="form-control" name="merk" id="merk">
                    </div>

                    <div class="mb-3 ">
                        <label for="dateinput" class="form-label">Tanggal Beli</label>
                        <input type="date" class="form-control" name="tanggalbeli" id="tanggalbeli">
                    </div>

                    <div class="mb-3 ">
                        <label for="phone" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                    </div>

                    <div class="mb-3 ">
                        <div class="col">
                            <label for="phone" class="form-label">Foto</label>
                        </div>
                        <input type="file" name="fotomobil" id="fotomobil" value="<?php echo $fotomobil ?>">
                    </div>

                    <div class="mb-3 ">
                        <label class="mb-3">Status Pembayaran</label><br>
                        <input type="radio" id="lunas" value="Lunas" name="status"><label for="lunas">Lunas</label>
                        <input type="radio" id="belum_lunas" value="Belum lunas" name="status"><label for="belum_lunas">Belum Lunas</label>

                    </div>


                    <div class="mb-3">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" style="width: 150px;" id="tambah">
                    </div>


                </form>
            </div>
        </div>
    </section>
    <script>
        const toastTrigger = document.getElementById('tambah')
        const toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>