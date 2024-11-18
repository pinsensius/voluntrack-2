<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-4 input-form p-5">
                <div class="logo d-flex pt-2 pb-2 align-items-center justify-content-center">
                    <img src="../icon/1.svg" alt="icon">
                    <h5>Voluntrack.</h5>
                </div>
                <div class="welcome mt-5 text-center">
                    <h5>Selamat Datang Kembali!</h5>
                    <p>Silahkan Masukkan Akun Anda</p>
                </div>
                <div class="d-flex justify-content-center d-none">
                    <div class="wrong-pw">
                        Kata Sandi Salah
                    </div>
                </div>
                <div class="d-flex justify-content-center d-none">
                    <div class="wrong-Username">
                        Nama Pengguna Salah
                    </div>
                </div>
                <div class="input d-flex flex-column">
                    <form action="login.php" method="post">
                        <label for="emailField">Email <span>*</span></label>
                        <input type="email" class="form-control" id="emailField" name="email" maxlength="255" placeholder="Masukkan email">
                        <label for="passwordField">Kata Sandi <span>*</span></label>
                        <input type="password" class="form-control" id="passwordField" name="password" placeholder="Masukkan kata sandi">
                        <button type="submit" class="btn btn-primary mt-3" name="login" value="ADD RECORD">Masuk</button>
                    </form>
                </div>
                <div class="remember pt-3 pb-3 d-flex align-items-center justify-content-between ">
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="checkbox" id="checkbox">
                        <label for="checkbox" class="ms-1">Ingat Saya</label>
                    </div>
                    <a href="../Forget pw/forgetpw.php">Lupa Kata Sandi?</a>
                </div>
                <p>Tidak punya akun? <a href="{{ route('registerPage') }}">Daftar disini</a></p>
            </div>
            <div class="garis"></div>
            <div class="col-8 d-flex justify-content-center align-items-center">
                <img src="../image/bro.svg" alt="login">
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>