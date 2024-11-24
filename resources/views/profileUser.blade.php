<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile User</title>
    <link rel="stylesheet" href="{{ asset('css/profileUser.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .tags p {
            margin: auto;
            font-size: 12px;
        }

        .diskusi {
            margin-top: -30px !important;
            margin-bottom: -30px !important;
        }

        .diskusi h4 {
            font-size: 20px !important;
        }

        .tags {
            border-radius: 10px;
            text-align: center;
            padding: 10px 0;
            border: 1px solid #E15101;
            color: #E15101;
            background: rgba(229, 103, 33, .1);
            width: 100px;
        }

        .dataTitle {
            margin-bottom: -20px !important;
            margin-top: 35px !important;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <x-navbar />

        <!-- Utama -->
        <main class="mt-5 ">
            <div class="row">
                <img src="../image/backdrop.png" alt="backdrop">
            </div>
            <div class="row profile">
                <div class="col-2">

                    <img src="../image/default.jpg" class="img-fluid border" alt="user" style="width:179px;height:179px;border-radius: 100%">';



                </div>
                <div class="col mt-4">
                    <div class="names ps-5 d-flex justify-content-between pe-5 ">
                        <div class="name">
                            <h4 class="m-0">username</h4>
                            <p>email</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">

                            <button onclick="window.location.href='../User Information/userInfo.php';">Edit Profile</button>
                            <form action="logout.php" method="post">
                                <input type="hidden" class="form-control" id="logoff" name="logout" value="true">
                                <button type="submit" class="btn btn-secondary" value="LOGOUT">Logout</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row profile-detail gap-5">
                <div class="col-4">
                    <h3><span>LV </span>Level 1</h3>

                    <div class="progress" style="width:90%;margin: 5px 0 20px 0;">
                        <div class="progress-bar" role="progressbar" style="width: $expData%" aria-valuenow="$expData" aria-valuemin="0" aria-valuemax="100">$expData XP</div>
                    </div>


                    <div class="datas mt-4">
                        <div class="data">
                            <p>Total Donasi</p>
                            <p>1000000</p>
                        </div>
                        <div class="data">
                            <p>Total Menjadi Relawan</p>
                            <p>1000000</p>
                        </div>
                        <div class="data">
                            <p>Total Membuat Acara </p>
                            <p>10</p>
                        </div>
                    </div>
                    <div class="points d-flex justify-content-between align-items-center mt-4">
                        <div class="point d-flex align-items-center m-0">
                            <img src="../image/poin.svg" alt="poin">
                            <h3 class="m-0 ms-2">Poin</h3>
                        </div>
                        <p class="m-0 me-5 pe-3 fs-4">poin</p>
                    </div>
                </div>
                <div class="col mb-5">

                    <span style="font-size:14.4px;">Kelengkapan data akun</span>
                    <div class="progress" style="width:90%;margin: 5px 0 20px 0;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">$kelengkapanData%</div>
                    </div>

                    <div class="alert alert-success d-flex justify-content-center" style="width:90%" role="alert">
                        Anda bisa menggunakan website dengan penuh
                    </div>

                    <div class="alert alert-danger d-flex justify-content-center" style="width:90%" role="alert">
                        Data akun masih belum lengkap, akses terbatas
                    </div>



                    <h5 class="dataTitle" style="margin-bottom:20px;"><b>RELAWAN KEGIATAN</b></h5>




                    <div class="diskusi d-flex gap-4 mt-5 rounded">
                        <!-- <img src="../image/$imgFile" style="border-radius:100%" alt="crown"> -->
                        <div class="grup">
                            <h4><b></b></h4>
                            <div class="tags d-flex justify-content-center align-items-center">
                                <p></p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </div>
    </main>

    </div>

    <script src="profileUser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>