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
    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <div class="container py-2">
            @if(session()->has('loginId'))
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="home">Home</a>
                <a class="nav-link" href="listcar">MyCar</a>
            </div>
            <div class="d-flex">
                <a href="addcar" class="btn btn-light text-primary" role="button">Add Car</a>
                <div class="dropdown ms-4">
                    <button class="btn btn-light dropdown-toggle text-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(session()->has('loginId'))
                        {{$data->name}}
                        @endif
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-primary" href="profile">Profile</a></li>
                        <li><a class="dropdown-item text-primary" href="logout">Log Out</a></li>
                    </ul>
                </div>
            </div>
            @endif
            @if(!session()->has('loginId'))
            <div class="navbar-nav w-100 d-flex justify-content-between">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="login">Login</a>
            </div>
            @endif
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="container mt-5">
                <h5 class="text-center">
                    Detail Mobil
                </h5>
                <p class="text-center">
                    Informasi lebih lanjut dari mobil
                </p>
            </div>
            <div class="row">
                @foreach($mobil as $row)
                <div class="col">
                    <img src="images/{{$row->image}}" alt="" style="width: 400px; height:300px">
                </div>
                <div class="col">
                    <form class="" action="" enctype="multipart/form-data" method="POST">
                        <div class="mb-3">
                            <label for="nameinput" class="form-label">Nama Mobil</label>
                            <input type="text" disabled class="form-control" name="namamobil" id="namamobil" value="{{$row->name}}">
                        </div>

                        <div class="mb-3">
                            <label for="nameinput" class="form-label">Nama Pemilik</label>
                            <input type="text" disabled class="form-control" name="namapemilik" id="namapemilik" value="{{$row->owner}}">
                        </div>

                        <div class="mb-3">
                            <label for="nameinput" class="form-label">Merk</label>
                            <input type="text" disabled class="form-control" name="merk" id="merk" value="{{$row->brand}}">
                        </div>

                        <div class="mb-3 ">
                            <label for="dateinput" class="form-label">Tanggal Beli</label>
                            <input type="date" disabled class="form-control" name="tanggalbeli" id="tanggalbeli" value="{{$row->purchase_date}}">
                        </div>

                        <div class="mb-3 ">
                            <label for="phone" class="form-label">Deskripsi</label>
                            <input type="text" disabled class="form-control" name="deskripsi" id="deskripsi" value="{{$row->description}}">
                        </div>

                        <div class="mb-3 ">
                            <div class="col">
                                <label for="phone" class="form-label">Foto</label>
                            </div>
                            <input type="text" disabled class="form-control" name="fotomobil" id="fotomobil" value="{{$row->image}}">
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
                            <a href="Edit-Vira.php?op=edit&id=<?php echo $id_mobil ?>" class="btn btn-primary">Edit</a>
                        </div>
                </div>
                </form>
                @endforeach

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>