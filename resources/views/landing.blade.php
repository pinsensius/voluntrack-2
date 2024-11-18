<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voluntrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <x-navbar />


        <!-- Awal Main -->
        <main id="page1">
            <!-- Page 1 -->
            <div class="row">
                <div class="col left-text">
                    <h1>Lakukan sesuatu untuk membantu sesama dan lingkungan!</h1>
                    <div class="caption">
                        <span style="opacity: .5;">Voluntrack adalah sebuah platform yang dibuat untuk membantu sesama
                            dan lingkungan melalui
                            kegiatan donasi dan pencarian relawan</span>
                    </div>
                    <button type="button">Mari Bantu</button>
                    <div class="data-kegiatan d-flex justify-content-evenly">
                        <div class="data">
                            <h2>400</h2>
                            <p>Event terlaksana</p>
                        </div>
                        <div class="data">
                            <h2>30jt</h2>
                            <p>Donasi setiap hari</p>
                        </div>
                        <div class="data">
                            <h2>50rb</h2>
                            <p>Relawan aktif</p>
                        </div>
                    </div>
                </div>
                <div class="col hero-image">
                    <img src="{{ asset('image/1.png') }}" alt="1">
                </div>
            </div>
        </main>


        <!-- Page 2 -->
        <main id="page2">
            <div class="row categories">
                <div class="col cText">
                    <h5>KATEGORI</h5>
                    <p style="font-family: 'jakartaSansBold'; font-size: 30px;">Kami memiliki beberapa kategori yang
                        bisa kamu pilih
                    </p>
                </div>
                <div class="col cText2 d-flex justify-content-end align-items-end">
                    <p>Lihat Semua &#x2794; </p>
                </div>
            </div>
            <div class="row category">
                <div class="col ms-1">
                    <img src="{{ asset('icon/alam.svg') }}" alt="alam" width="50" height="50">
                    <h5>Bencana Alam</h5>
                    <p>Donasi atau jadi relawan untuk membantu korban bencana alam</p>
                    <a href="#" class="fw-medium">Lihat Lebih Lanjut</a>
                </div>
                <div class="col">
                    <img src="{{ asset('icon/laut.svg') }}" alt="alam" width="50" height="50">
                    <h5>#SELAMATKANLAUT</h5>
                    <p>Donasi atau jadi relawan untuk menyelamatkan laut</p>
                    <a href="#" class="fw-medium">Lihat Lebih Lanjut</a>
                </div>
                <div class="col">
                    <img src="{{ asset('icon/bayi.svg') }}" alt="alam" width="50" height="50">
                    <h5>Balita & Bayi Sakit</h5>
                    <p>Donasi untuk bantu menyembuhkan bayi yang sakit</p>
                    <a href="#" class="fw-medium">Lihat Lebih Lanjut</a>
                </div>
                <div class="col me-1">
                    <img src="{{ asset('icon/panti.svg') }}" alt="alam" width="50" height="50">
                    <h5>Panti Asuhan</h5>
                    <p class="m-0 pt-2">Donasi atau jadi relawan untuk membantu anak-anak panti asuhan</p>
                    <a href="#" class="fw-medium">Lihat Lebih Lanjut</a>
                </div>
            </div>
        </main>

        <!-- Page 3 -->
        <main id="page3">
            <div class="row">
                <div class="col cText">
                    <h5>KEGIATAN</h5>
                    <p style="font-family: 'jakartaSansBold'; font-size: 30px;">Kegiatan yang sedang berlangsung saat
                        ini</p>
                </div>
                <div class="col cText2 d-flex justify-content-end align-items-end">
                    <p>Lihat Semua &#x2794; </p>
                </div>
            </div>
            <div class="row gap-4" style="margin-top: 50px;">
                <div class="col card p-0">
                    <img src="{{ asset('image/gempa.png') }}" alt="gempa">
                    <div class="caption-kegiatan">
                        <div class="caption d-flex">
                            <h5 style="font-family: 'jakartaSansBold'">Bantu Korban Gempa di Sumedang!</h5>
                            <div class="kategori kategori1 d-flex justify-content-center align-items-center">
                                <span>Bencana Alam</span>
                            </div>
                        </div>
                        <p class="pt-3">Bantu para korban gempa sumedang dengan memberikan donasi</p>
                        <div class="progres pt-4">
                            <p class="mb-0">Progress donasi gempa</p>
                            <img src="{{ asset('image/progres1.svg') }}" alt="1" width="100%">
                        </div>
                        <button>Donasi Sekarang</button>
                        <button class="mt-0 mb-0 button2 ">Daftar Relawan</button>
                    </div>
                </div>
                <div class="col card p-0">
                    <img src="{{ asset('image/laut.png') }}" alt="laut">
                    <div class="caption-kegiatan">
                        <div class="caption d-flex">
                            <h5 style="font-family: 'jakartaSansBold'">GAWAT! LAUT BUTUH KITA!</h5>
                            <div class="kategori kategori2 d-flex justify-content-center align-items-center">
                                <span style="color: #057CD2;">#SELAMATKANLAUT</span>
                            </div>
                        </div>
                        <p class="pt-3">Bantu membersihkan laut demi kemakmuran seluruh mahluk hidup dan ekosistem nya!
                        </p>
                        <div class="progres pt-4">
                            <p class="mb-0">Progress donasi laut</p>
                            <img src="{{ asset('image/progres2.svg') }}" alt="1" width="100%">
                        </div>
                        <button>Donasi Sekarang</button>
                        <button class="mt-0 mb-0 button2">Daftar Relawan</button>
                    </div>
                </div>
                <div class="col card p-0">
                    <img src="{{ asset('image/balita.png') }}" alt="balita">
                    <div class="caption-kegiatan">
                        <div class="caption d-flex">
                            <h5 style="font-family: 'jakartaSansBold'">Bantu anak-anak ini agar cepat sembuh!</h5>
                            <div class="kategori kategori3 d-flex justify-content-center align-items-center">
                                <span>Balita & Bayi Sakit</span>
                            </div>
                        </div>
                        <p class="pt-3">Bantu anak-anak yang terkena kanker ini agar cepat sembuh!</p>
                        <div class="progres pt-4">
                            <p class="mb-0">Progress donasi penderita kanker</p>
                            <img src="{{ asset('image/progres3.svg') }}" alt="1" width="100%">
                        </div>
                        <button>Donasi Sekarang</button>
                        <button class="mt-0 mb-0 button2">Daftar Relawan</button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Page 4 -->
        <!-- dihapus -->


        <!-- Page 5 -->
        <main id="page5">
            <div class="row">
                <div class="col hero-image2">
                    <img src="{{ asset('image/2.png') }}" alt="">
                </div>
                <div class="col right-text">
                    <h5>TENTANG KAMI</h5>
                    <h1>Mari Membantu Orang-orang di Seluruh Indonesia</h1>
                    <div class="caption">
                        <span class="fs-5 opacity-50">Voluntrack adalah sebuah platform yang dibuat untuk membantu antar
                            sesama dan lingkungan melalui kegiatan donasi dan pencarian relawan.</span>
                    </div>
                    <button type="button"><a href="{{ route('aboutUs') }}">Pelajari Lebih Lanjut</a></button>
                </div>
            </div>
        </main>

        <footer>
            <div class="container">
                <div class="row pt-5">
                    <div class="col-6">
                        <div class="f-logo d-flex align-items-center ms-2 mb-3">
                            <img src="{{ asset('icon/1.svg') }}" alt="logo">
                            <h5 class="mb-0 ms-2 fw-bold">Voluntrack.</h5>
                        </div>
                        <p class="opacity-75 w-75 fs-6 ">Voluntrack: Platform donasi dan kegiatan relawan untuk lingkungan dan
                            masyarakat. Memberikan edukasi dan kesempatan bagi pengguna untuk berkontribusi melalui
                            donasi atau partisipasi langsung dalam kegiatan..</p>
                    </div>
                    <div class="col-3 d-flex justify-content-end
                ">
                        <div class="menu">
                            <h5 class="fw-bold">Menu</h5>
                            <ul class="list-unstyled opacity-75">
                                <li>Beranda</li>
                                <li>Kategori</li>
                                <li>Kegiatan</li>
                                <li>Edukasi</li>
                                <li>Tentang Kami</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 d-flex justify-content-end
                ">
                        <div class="menu">
                            <h5 class="fw-bold">Legal</h5>
                            <ul class="list-unstyled opacity-75">
                                <li>Privacy</li>
                                <li>Ketentuan</li>
                                <li>Kontak</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 pb-5 d-flex align-items-center">
                    <div class="col-6">
                        <p class="m-0 fw-bold">&copy;2024 VolunTrack. All right reserved.</p>
                    </div>
                    <div class="col-6 d-flex justify-content-center gap-5">
                        <img src="{{ asset('icon/instagram.svg') }}" alt="ig">
                        <img src="{{ asset('icon/github.svg') }}" alt="github">
                        <img src="{{ asset('icon/x.svg') }}" alt="x">
                        <img src="{{ asset('icon/linkedin.svg') }}" alt="linkedin">
                    </div>
                </div>
            </div>
        </footer>


    </div>
    <!-- Akhir Main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>