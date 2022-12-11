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
                <form action="add-car" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="nameinput" class="form-label">User Id</label>
                        <select class="form-select text-muted" id="user_id" name="user_id">
                            <option value="1">1</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="owner" id="owner">
                    </div>

                    <div class="mb-3">
                        <label for="nameinput" class="form-label">Merk</label>
                        <input type="text" class="form-control" name="brand" id="brand">
                    </div>

                    <div class="mb-3 ">
                        <label for="dateinput" class="form-label">Tanggal Beli</label>
                        <input type="date" class="form-control" name="purchase_date" id="purchase_date">
                    </div>

                    <div class="mb-3 ">
                        <label for="phone" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>

                    <div class="mb-3 ">
                        <div class="col">
                            <label for="phone" class="form-label">Foto</label>
                        </div>
                        <input type="file" name="image" id="image" value="">
                    </div>

                    <div class="mb-3 ">
                        <label class="mb-3">Status Pembayaran</label><br>
                        <input type="radio" id="lunas" value="Lunas" name="status"><label for="lunas">Lunas</label>
                        <input type="radio" id="belum_lunas" value="Belum Lunas" name="status"><label for="belum_lunas">Belum Lunas</label>

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