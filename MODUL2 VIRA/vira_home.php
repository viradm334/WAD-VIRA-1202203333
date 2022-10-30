<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <title><?php echo "MODUL2 VIRA"; ?></title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <!--<a class="navbar-brand" href="#">Navbar</a>-->
            <a class="navbar-brand" href="https://ibb.co/g3YPzbX"><img src="https://i.ibb.co/ZV9YWRw/logo-ead.png" alt="logo-ead" border="0" style="width:100px; height:30px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="vira_home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="vira_reservasi.php">Daftar Reservasi</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

        <section id="home">
            <form action = 'vira_reservasi.php' method="POST">
                <div class="container-mt-4">
                <div class="row">
                <div class="row">
                    <div class="col-md-4-mb-3">
                        <div class="section-header text-center pb-5 mt-5">
                            <h2>Rental Mobil EAD</h2>
                            <p>Jenis Mobil</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/car-1.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Toyota Prius</h5>
                            <p class="card-text">Mobil hybrid yang menghemat bensin dan ramah lingkungan.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kapasitas 5 orang</li>
                            <li class="list-group-item">Matic</li>
                            <li class="list-group-item">Rp 300.000/hari</li>
                        </ul>
                        <div class="card-body">
                        <button onclick="location.href='vira_reservasi.php'" type="submit" name="mobil" value="Toyota Prius" class="btn btn-primary ">Book Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/car-2.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Avanza</h5>
                            <p class="card-text">Mobil dengan harga ekonomis yang praktis untuk sehari-hari.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kapasitas 5 orang</li>
                            <li class="list-group-item">Manual</li>
                            <li class="list-group-item">Rp 150.000/hari</li>
                        </ul>
                        <div class="card-body">
                        <button onclick="location.href='vira_reservasi.php'" type="submit" name="mobil" value="Avanza" class="btn btn-primary ">Book Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="images/car-4.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Suzuki Ertiga</h5>
                            <p class="card-text">Mobil ini cocok untuk bepergian ke luar kota dengan keluarga Anda.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kapasitas 5 orang</li>
                            <li class="list-group-item">Manual</li>
                            <li class="list-group-item">Rp 300.000/hari</li>
                        </ul>
                        <div class="card-body">
                        <button onclick="location.href='vira_reservasi.php'" type="submit" name="mobil" value="Suzuki Ertiga" class="btn btn-primary ">Book Now</button>
                        </div>
                    </div>
                </div>
                </div>
            </form>
        
        </section>

        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Created by Vira_1202203333
            </div>
            <!-- Copyright -->
        </footer>
    </body>
</html>