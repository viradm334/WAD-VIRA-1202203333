<?php 
    $nama = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['checkin'];
    $masuk = date('d-m-Y', strtotime($date)) ." ". date('H:i:s', strtotime($time));
    $duration = $_POST['duration'];
    $keluar = date('d-m-Y', strtotime($date)) ." ". date('H:i:s', strtotime($date.' + '.$duration.' hours'));
    $phone = $_POST['phone'];
    $mobil =$_POST['mobil'];
    $harga_service = 0;
    settype($duration, "integer");

    $harga_mobil = array("Toyota Prius" =>"300000", "Avanza" => '150000', "Suzuki Ertiga" => "300000");
    $plus_servis = array("Health protocol" => '25000', 'Driver'=>'100000', 'Fuel filled'=>'250000');

    if (isset($_POST['service'])) {
        $service = $_POST['service'];
    }
    else {
        $service = 0;
    }


    function hitungHarga($jenismobil, $plus_servis, $durasi){
        $totalHarga = $jenismobil*$durasi+$plus_servis;
        echo $totalHarga;
    }

    //jumlah
    if($mobil == "Toyota Prius"){
        $jumlah = $duration*300000;
    }else if($mobil == "Avanza"){
        $jumlah = $duration*150000;
    }else{
        $jumlah = $duration*300000;
    }    

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>MODUL2 VIRA</title>   
    

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

      <div class="container text-center p-3">
          <h5>Thank you <?php echo $name?> for Reserving</h5>
          <h6>Please double check your reservation details</h6>
      </div>

      <div class="container">
        <table class="table table-secondary">
            <tr >
                <th scope="col">Booking Number</th>
                <th scope="col">Name</th>
                <th scope="col">Check-in</th>
                <th scope="col">Check-out</th>
                <th scope="col">Car Type</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Service</th>
                <th scope="col">Total Price</th>
            </tr>

            <tb>
              <tr>
                <td><?php echo rend();?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $masuk;?></td>
                <td><?php echo $keluar;?></td>
                <!-- gedung -->
                <td> 
                    <?php echo $mobil?>
                </td>
                <td><?php echo $phone;?></td>
                <!-- service -->
                <td>
                  <?php
                        if (!empty($service)) {
                            echo '<ul>';
                            foreach (array($service) as $myservice) {
                                if ($myservice == "Health protocol") {
                                    $harga_service += 25000;
                                    echo '<li>' . $myservice . '</li>';
                                }
                                else if($myservice == "Driver") {
                                    $harga_service += 100000;
                                    echo '<li>' . $myservice . '</li>';
                                }
                                else {
                                    $harga_service += 250000;
                                    echo '<li>' . $myservice . '</li>';
                                }
                                
                            }
                            echo '</ul>';
                        } else {
                            echo 'No Service';
                        }
                      ?>
                </td>

                <!-- jumlah -->
                <td>
                    <?php echo 'Rp.' . ($jumlah+$harga_service)?>
                    
                    
                </td>
              </tr>
              
            </tb>
          </table>
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