<nav>
    <div class="row navbar pt-3 pb-3">
        <div class="col">
            <div class="judul d-flex pt-2 pb-2 align-items-center">
                <img src="{{ asset('icon/1.svg') }}" alt="icon">
                <h5>Voluntrack.</h5>
            </div>
        </div>
        <div class="col-lg-8 d-flex justify-content-center">
            <div class="navigasi d-flex align-items-center">
                <ul>
                    <li><a href="#page1">Beranda</a></li>
                    <li><a href="#page5">Tentang Kami</a></li>
                    <li><a href="#page2">Kategori</a></li>
                    <li><a href="#page3">Acara</a></li>
                    <li><a href="#page4">Berita</a></li>
                    <li><a href="">Relawan</a></li> <!-- blm berfungsi-->
                </ul>
            </div>
        </div>
        <div class="col d-flex justify-content-end pe-0">
            <div class="akun d-flex">
                <button><a href="{{ route('loginPage') }}" target="_blank">Masuk</a></button>
                <button style="background-color: #AEF161; color: black;"><a href="{{ route('registerPage') }}" target="_blank">Daftar</a></button>
            </div>
        </div>
    </div>
</nav>