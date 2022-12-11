<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/style/style.css')}}">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col">
            <img src="{{asset('assets/images/login-car.jpg')}}" alt="">
        </div>
        <div class="col mt-3 mb-3">
            <div class="header-title">
                <h4>Register</h4>
                <form action="{{route('register-user')}}" method="POST">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3" style="width: 600px;">
                        <label for="nameinput" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3" style="width: 600px;">
                        <label for="nameinput" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3" style="width: 600px;">
                        <label for="nameinput" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{old('no_hp')}}">
                        <span class="text-danger">@error('no_hp') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3" style="width: 600px;">
                        <label for="nameinput" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3" style="width: 600px;">
                        <label for="nameinput" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" value="{{old('konfirmasi_password')}}">
                        <span class="text-danger">@error('konfirmasi_password') {{$message}} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="register" value="Daftar" class="btn btn-primary" style="width: 100px;">
                    </div>

                    <div class="mb-3">
                        <p>Anda sudah punya akun? <a href="login">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>