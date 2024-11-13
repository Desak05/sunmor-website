<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    .navbar .navbar-brand,
    .navbar .nav-link {
        color: white !important;
    }

    .navbar .nav-link:hover {
        color: #FEF3E2 !important;
    }

    .navbar-brand {
        margin-right: auto;
    }

    /* hero section */
    .hero-section {
        background-image: url('../img/imgrem2.png');
        /* Ganti dengan path gambar yang sesuai */
        background-size: cover;
        background-color: #ffffff;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #ffa500;
    }

    .hero-section h1 {
        font-size: 4rem;
        font-weight: bold;
    }

    .hero-section p {
        font-size: 1.2rem;
        color: #ffffff;
        font-family: "Poppins", serif;
    }

    .hero-section .btn {
        background-color: #561C24;
        font-family: 'Times New Roman', Times, serif;
        color: #ffa500;
        font-weight: bold;
        padding: 10px 20px;
        box-shadow: #ffffff;
    }

    .hero-section .btn:hover {
        color: #ffffff;
    }

    /* start class section */

    .section {
        padding: 50px 0;
        height: 100vh;
        background-image: url('../img/home2.png');
    }

    .section h1 {
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .section h2 {
        font-family: 'Times New Roman', Times, serif;
    }

    .section p {
        font-size: 1rem;
        word-spacing: 0.20em;
        line-height: 1.7;
        color: #555;
        font-family: "Poppins", serif;
    }

    .btn-custom {
        background-color: #561C24;
        font-family: 'Times New Roman', Times, serif;
        color: white;
        font-weight: bold;
        padding: 10px 20px;
    }

    .background-leaf {
        position: absolute;
        opacity: 0.3;
        width: 60%;
        height: auto;
        z-index: -1;
        top: 0;
        right: 0;
    }

    /* start bagian menu */
    .menu-title {
        font-size: 2.5rem;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
        color: #5c1b1b;
    }

    .menu-item {
        background-color: #E4E0E1;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        overflow: hidden;
    }

    .menu-item img {
        width: 100%;
        border-radius: 10px;
        transition: transform 0.3s ease;
        /* Smooth zoom effect */
    }

    .menu-item:hover img {
        transform: scale(1.1);
        /* Scale up image on hover */
    }

    .menu-item-name {
        font-size: 1rem;
        font-weight: bold;
        color: #5c1b1b;
        margin-top: 10px;
    }

    .view-all-btn {
        background-color: #5c1b1b;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        color: #fff;
        border-radius: 20px;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    /* start footer */
    /* Footer Styles */

    .footer {
        background-color: #8B0000;
        color: #ffffff;
        padding: 20px 80px;
        width: 100%;
        margin-top: 100px;
        box-sizing: border-box;
        padding-right: 100px;

    }

    .footer-left img {
        max-width: 50%;
        margin-bottom: 10px;
        margin-left: -40px;
    }

    .footer-center {
        font-size: 15px;
    }

    .footer p,
    .footer a {
        color: #ffffff;
        display: inline-block;
    }

    .footer a {
        text-decoration: none;
    }

    .footer-about p {
        color: #c6c4c0;
        font-size: 15px;
        line-height: 1.7;
        font-family: 'Times New Roman', Times, serif;
        word-spacing: 0.20em;
    }


    .footer-about h2 {
        display: block;
        color: rgb(255, 255, 255);
        font-size: 19px;
        font-weight: bold;
        margin-top: -7px;
    }



    .footer .footer-copyright {
        color: #878787;
        text-align: center;
        font-size: 13px;

    }

    /* Responsive Design */
    @media (max-width: 768px) {

        .footer .footer-left,
        .footer .footer-center,
        .footer .footer-right {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
        }

        .footer .footer-center img {
            display: inline-block;
            margin: 5px;
        }
    }

    /* end footer */
</style>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #561C24;">
        <div class="container d-flex align-items-center">
            <a href="#" class="navbar-brand">
                <img src="../img/logo.png" alt="Logo" width="60" height="60" />
            </a>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="utama.html">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.html">MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="riwayat.html">RIWAYAT PESANAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">CONTACT</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-right-to-bracket"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-user"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="hero-section">
        <div>
            <h1>SUNMOR COFFEE</h1>
            <p>Find your favorite coffee</p>
            <button class="btn">Pesan Sekarang</button>
        </div>
    </div>
    <section class="section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image of coffee -->
                <div class="col-md-5 text-center">
                    <img src="../img/imgrem3.png" alt="Coffee" class="img-fluid rounded-circle" style="max-width: 90%;">
                </div>
                <!-- Text content -->
                <div class="col-md-7">
                    <h2 class="mb-3">The Best Coffee Spot in the City</h2>
                    <h1 class="display-4 mb-3">SUNMOR</h1>
                    <p>
                        At SUNMOR, we offer more than just coffee, we create a cozy and inviting experience with the finest brews. Whether you’re looking for a place to relax or connect with friends, SUNMOR is the perfect choice. Visit us and discover what makes SUNMOR the city's favorite.
                    </p>
                    <button class="btn btn-custom mt-4">Pesan Sekarang</button>
                </div>
            </div>
        </div>
        <!-- Background leaf image ini digunakan untuk menambahkan gambar siluet daun, tapi belum muncul :v -->
        <img src="../img/imgrem4.png" alt="Leaf Background" class="background-leaf">
    </section>

    <div class="container text-center my-5">
        <h2 class="menu-title">Menu Kopi Populer Kami</h2>
        <div class="row justify-content-center mt-4">
            <div class="col-md-3 mb-4">
                <div class="menu-item">
                    <img src="../img/2.png" alt="Hot Coffee Americano">
                    <p class="menu-item-name">Hot Coffee Americano</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="menu-item">
                    <img src="../img/4.png" alt="Hot Coffee Latte">
                    <p class="menu-item-name">Hot Coffee Latte</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="menu-item">
                    <img src="../img/6.png" alt="Iced Cappuccino">
                    <p class="menu-item-name">Iced Cappuccino</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="menu-item">
                    <img src="../img/7.png" alt="Iced Macchiato">
                    <p class="menu-item-name">Iced Macchiato</p>
                </div>
            </div>
        </div>
        <a href="menu.php" class="btn view-all-btn">Lihat Semua Menu</a>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="row mt-3">
            <div class="footer-left col-md-4 col-12 text-center">
                <img src="../img/sunmor.png" alt="Sunmor">
            </div>

            <div class="footer-center col-md-4 col-12 mt-4">
                <div>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABPElEQVR4nK2VTytEURiH70JmYcUgi5F/WWE5ZTbyCWTtA0zxBUyaxTRlLQsbsaJ8AeUr2EghG9aKjIWwMXl08qoT73Xf97q/OnU6/d7nqdPtniQxBBgCVoCGrLAftMxmgUeBQ6DL74SzA6CSF14DHsjOPTDvhU8BHQP8O4/ApEdwgj/HVvhcCuADuJWVlhmLYEMZ7AALUWcReFJ6DYtgXxlcVXprSm/PIgif3s/MGq/yyCLYVAaXlN6y0tu2COrK4AXQH3UGgEulV7cIptFzB+zICnst45kCkVzjz7kJLoJWDsG6RzAMvDngL0DZLBDJrkOw5YKLoAK8GuDPwIhbIJJ2oXevCPqAmz/gV0Apt0AktZQX7R2o/gseSbTfR7MQePIl6AXOIvgp0FOYQCRj8kaH53GiUHgkqXrv/RPEIe46me6gcwAAAABJRU5ErkJggg==" alt="Location">
                    <p><span>Jimbaran</span> Jl.Uluwatu</p>
                </div>
                <div>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA50lEQVR4nOXUMS9DURgG4Js2mjD5BWazhcFmaEwikS42Vr+i/A3RoQz4E8RkFBNbV+nczdOcuE2uw0WurwvvepL3yZfvnFMUfzLYxjGW51GeimcZRJd3vc8rNiKBSx9zj1YUcOfzHEYB5zXATRTQqwGOooAOnrPyR7RDgBLZzYCrsPIKcpZd1f1oYAkPFWSCzWhkBaMKMp4HsoqXbJJeedZOtwu3OGj8GLGWIWkn1+Xtyl/8+m8mGfk+CR80+oW97aS6+K9y0nSSRZz+AOg2AmbBDp5qyvtFRLCAPQzTZ4gLbIWUF/8qU4l/F0ojNLh2AAAAAElFTkSuQmCC" alt="Phone">
                    <p>+62 4334 343 34</p>
                </div>
                <div>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA2ElEQVR4nO3UMUoDQRSA4RA7EXuFeAZJ4RmMWNhYmTpXyBVyBVtPIHgKScBOW9noAVKkM3wSeIHgjuvuupAU+8Mwj5l572fewHQ6LXsDrvDh/8wxSAneNMdrSnCKhwaKP+EsJTiK+SauWZX5One71k/BJ24jPsQEXyUKr3CP48i9xntKkLsizvFcUPwFF3H2ZLvFRYI1S4xxgC5GWFTY/1OwYYZ+7PfwGKMXa31MU4llBbkel32jKoINGYa4i7iQOoJKtIJaLarzPfxGlhIMGpJkuMwJWnbGN9dvscxc2GSeAAAAAElFTkSuQmCC" alt="Email">
                    <p><a href="#">sunmor@gmail.com</a></p>
                </div>
            </div>

            <div class="footer-right col-md-4 col-12 mt-4">
                <div class="footer-about">
                    <h2>About</h2>
                    <p>Sunmor Coffee terinspirasi dari filosofi "Sunday Morning" atau pagi hari di hari Minggu. Pagi hari di akhir pekan biasanya identik dengan suasana santai, nyaman, dan menyenangkan.</p>
                </div>
            </div>
            <p class="footer-copyright">&copy; 2024. <b>SUNMOR</b> All Right Reserved.</p>
        </div>


    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
</body>

</html>