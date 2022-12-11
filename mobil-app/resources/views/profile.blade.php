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
    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <div class="container py-2">
            @if(session()->has('loginId'))
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="listcar">MyCar</a>
            </div>
            <div class="d-flex">
                <a href="addcar" class="btn btn-light text-primary" role="button">Add Car</a>
                <div class="dropdown ms-4">
                    <button class="btn btn-light dropdown-toggle text-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$data->name}}
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
    <!-- Akhir Navbar -->

    <div class="container mt-4">
        <h2 class="fw-bold text-center">Profile</h2>
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="mb-3 row position-relative">
                        <label for="nameinput" class="col-sm-2 col-form-label text-muted">Email</label>
                        <div class="col-sm-10">
                            <input type="text" disabled class="form-control" name="email" id="email" value="{{$data->email}}">
                        </div>
                    </div>

                    <div class="mb-3 row position-relative">
                        <label for="nameinput" class="col-sm-2 col-form-label text-muted">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$data->name}}">
                        </div>
                    </div>

                    <div class="mb-3 row position-relative">
                        <label for="nameinput" class="col-sm-2 col-form-label text-muted">Nomor Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{$data->no_hp}}">
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
                                <option value="primary">Primary</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary px-4 button" name="update">Update</button>
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