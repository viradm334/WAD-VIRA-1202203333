<?php 
  $nama_mobil = isset($_POST['mobil']) ? $_POST['mobil'] : " ";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Daftar Reservasi</title>
    
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


      <div class="container mt-5">
        <h5 class="text-center">
            Rent your car now!
        </h5>
      </div>

      <div class="container mb-6">
          <div class="card mt-3">
            <div class="row">

                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                  <div>
                    <img src="
                          <?php
                            if($namamobil == "Toyota Prius"){
                              echo "images/car-1.png";
                            }
                            else if ($namamobil == "Avanza"){
                              echo "images/car-2.png";
                            }
                            else{
                              echo "images/car-4.png";
                            }
                          ?>
                          
                      " class="img-fluid rounded">
                  </div>
                </div>
  
  
                <div class="col-md-6">
                    <form class="m-4" action="vira_mybooking.php" method="POST">
                        <div class="mb-3">
                          <label for="nameinput" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" id="nameinput" readonly="readonly" value="VIRA_1202203333">
                        </div>

                        <div class="mb-3 ">
                            <label for="dateinput" class="form-label">Book Date</label>
                            <input type="date" class="form-control" name="date" id="dateinput">
                        </div>

                        <div class="mb-3 ">
                            <label for="time" class="form-label">Start Time</label>
                            <input type="time" class="form-control" name="checkin" id="time">
                        </div>

                        <div class="mb-3 ">
                            <label for="duration" class="form-label">Duration (Days)</label>
                            <input type="number" class="form-control" name="duration" id="duration">
                        </div>

                        <div class="mb-3 ">
                          <label for="selection" class="form-label">Car Type</label>
                          <select name="mobil" class="form-select" aria-label="Default select example">
                                <option selected disabled>==PILIH==</option>
                                <option <?php if($namamobil == "Toyota Prius"){echo "selected";}?> value="Toyota Prius">Toyota Prius</option>
                                <option <?php if($namamobil == "Avanza"){echo "selected";}?> value="Avanza">Avanza</option>
                                <option <?php if($namamobil == "Suzuki Ertiga"){echo "selected";}?> value="Suzuki Ertiga">Suzuki Ertiga</option>
                              </select>

                        </div>

                        <div class="mb-3 ">
                          <label for="phone" class="form-label">Phone Number</label>
                          <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        
                        <div class="mb-3">
                          <label for="service" class="form-label">Add Service(s)</label>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="service" value="Health protocol" id="Health protocol">
                            <label class="form-check-label" for="Health protocol">
                              Health protocol / Rp. 25.000
                            </label>
                          </div>
  
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="service" value="Driver" id="Driver" >
                            <label class="form-check-label" for="Driver">
                              Driver / Rp. 100.000
                            </label>
                          </div>
  
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="service" value="Fuel filled" id="Fuel filled" >
                            <label class="form-check-label" for="Fuel filled">
                              Fuel filled / Rp. 250.000
                            </label>
                          </div>
                        </div>


                        <div class="d-grid gap-2 mb-3">
                          <button type="submit" name="submit" class="btn btn-success">Book</button>
                        </div>
                        

                    </form>
                </div>
            </div>
          </div>
      </div>

      <br><br>
      <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Created by Vira_1202203333
            </div>
            <!-- Copyright -->
        </footer>
      

  </body>
</html>