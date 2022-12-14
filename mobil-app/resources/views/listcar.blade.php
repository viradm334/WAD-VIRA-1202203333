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
                @foreach($mobil as $row)
                <div class="card" style="width: 18rem; margin: 5px; box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.35);">
                        <img src="images/{{$row->image}}" class="card-img-top" alt="..." width="200px" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{$row->name}}</h5>
                            <p class="card-text">{{$row->description}}</p>
                            <a href=""><button type="button" class="btn btn-primary">Detail</button></a>
                            <a href="" onclick="return confirm('Anda yakin untuk menghapus item?')"><button type="button" class="btn btn-danger" id="deleted">Delete</button></a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="position: absolute;">
            <div class="jumlah-mobil" style="padding: 15px; position:absolute; bottom: 0; left: 0;">
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