<?php

include 'config/delete.php';
$error = '';
$sukses = '';
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
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListCar-Vira.php">MyCar</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a href="Add-Vira.php" class="btn btn-light">Add Car</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container" style="position: relative; min-height:90vh;">
            <div class="container mt-5">
                <h5 class="text-center">
                    My Show Room
                </h5>
                <p class="text-center">
                    List Show Room Vira-1202203333
                </p>
            </div>
            <div class="row">
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
                <?php
                }
                ?>
                <?php
                $sql2 = 'select * from mobil order by id_mobil';
                $q2 = mysqli_query($koneksi, $sql2);

                while ($r2 = mysqli_fetch_array($q2)) {
                    $id_mobil = $r2['id_mobil'];
                    $namamobil = $r2['nama_mobil'];
                    $deskripsi = $r2['deskripsi'];
                    $fotomobil = $r2['foto_mobil'];

                ?>

                    <div class="card" style="width: 18rem; margin: 5px; box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.35);">
                        <img src="images/<?php echo $fotomobil ?>" class="card-img-top" alt="..." width="200px" height="200px">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $namamobil ?></h5>
                            <p class="card-text"><?php echo $deskripsi ?></p>
                            <a href="Detail-Vira.php?op=edit&id=<?php echo $id_mobil ?>"><button type="button" class="btn btn-primary">Detail</button></a>
                            <a href="ListCar-Vira.php?op=delete&id=<?php echo $id_mobil ?>" onclick="return confirm('Anda yakin untuk menghapus item?')"><button type="button" class="btn btn-danger" id="deleted">Delete</button></a>


                        </div>
                    </div>

                <?php
                }

                ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="position: relative;">
        <div class="jumlah-mobil" style="padding: 15px; position:absolute; bottom: 0; left: 0;">
                <?php
                $sql3 = "select count(*) from mobil";
                $q3 = mysqli_query($koneksi, $sql3);
                $row = mysqli_fetch_array($q3);
                $total = $row[0];

                echo "Jumlah mobil : " . $total;
                ?>
            </div>
        </div>
    </section>

    <script>
        const toastTrigger = document.getElementById('deleted')
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