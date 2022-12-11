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
                    Edit Mobil
                </h5>
                <p class="text-center">
                    Edit detail mobil disini
                </p>
            </div>
            <div class="row">
                <?php
                $id_mobil = $_GET['id'];
                $q1 = "select * from mobil where id_mobil = '$id_mobil'";
                $result = mysqli_query($koneksi, $q1);

                while ($r2 = mysqli_fetch_array($result)) {
                    $idmobil = $r2['id_mobil'];
                    $namamobil = $r2['nama_mobil'];
                    $merk = $r2['merk_mobil'];
                    $namapemilik = $r2['pemilik_mobil'];
                    $tanggalbeli = $r2['tanggal_beli'];
                    $deskripsi = $r2['deskripsi'];
                    $fotomobil = $r2['foto_mobil'];
                    $status = $r2['status_pembayaran'];
                ?>

                    <div class="col">
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
                        <img src="images/<?php echo $fotomobil ?>" alt="" style="width: 400px; height:300px">
                    </div>
                    <div class="col">
                        <form class="" action="" enctype="multipart/form-data" method="POST">
                            <div class="mb-3">
                                <label for="nameinput" class="form-label">Nama Mobil</label>
                                <input type="text" class="form-control" name="namamobil" id="namamobil" value="<?php echo $namamobil ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nameinput" class="form-label">Nama Pemilik</label>
                                <input type="text" class="form-control" name="namapemilik" id="namapemilik" value="<?php echo $namapemilik ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nameinput" class="form-label">Merk</label>
                                <input type="text" class="form-control" name="merk" id="merk" value="<?php echo $merk ?>">
                            </div>

                            <div class="mb-3 ">
                                <label for="dateinput" class="form-label">Tanggal Beli</label>
                                <input type="date" class="form-control" name="tanggalbeli" id="tanggalbeli" value="<?php echo $tanggalbeli ?>">
                            </div>

                            <div class="mb-3 ">
                                <label for="phone" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo $deskripsi ?>">
                            </div>

                            <div class="mb-3 ">
                                <div class="col">
                                    <label for="phone" class="form-label">Foto</label>
                                </div>
                                <input type="file" name="fotomobil" id="fotomobil" value="<?php echo $fotomobil ?>">
                            </div>

                            <div class="mb-3 ">
                                <label class="mb-3">Status Pembayaran</label><br>
                                <input type="radio" id="lunas" value="Lunas" name="status" <?php if ($status == 'Lunas') {
                                                                                                echo "checked";
                                                                                            } ?>><label for="lunas">Lunas</label>
                                <input type="radio" id="belum_lunas" value="Belum lunas" name="status" <?php if ($status == 'Belum lunas') {
                                                                                                            echo "checked";
                                                                                                        } ?>><label for="belum_lunas">Belum Lunas</label>
                            </div>

                            <div class="mb-3">
                                <button type="button" class="btn btn-secondary" id="liveToastBtn">Show notification</button>
                                <button name="simpan" class="btn btn-primary" style="width: 150px;" id="liveToastBtn">Simpan Data</button>
                                <!--<input id="update" type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" style="width: 150px;">-->

                            </div>
                    </div>
                    </form>

                <?php
                }
                ?>

            </div>
        </div>
    </section>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Alert</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Data berhasil diupdate
            </div>
        </div>
    </div>
    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
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