<?php
require "dbconnection.php";
$queryCategori = mysqli_query($con, "SELECT * FROM categori");

// get product by keyword
if (isset($_GET['keyword'])) {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}

// get product by category 
else if (isset($_GET['categori'])) {
    $queryGetCategoriId = mysqli_query($con, "SELECT id FROM categori WHERE nama = '$_GET[categori]'");
    $categoriId = mysqli_fetch_array($queryGetCategoriId);

    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE categori_id = '$categoriId[id]'");

}

// get product default 
else {

    // Jumlah data per halaman
    $jumlahdataperhalaman = 12;
    // Hitung jumlah data
    $queryCount = mysqli_query($con, "SELECT COUNT(*) AS jumlah FROM produk");
    $resultCount = mysqli_fetch_assoc($queryCount);
    $jumlahdata = $resultCount['jumlah'];
    // Hitung jumlah halaman
    $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
    // Tentukan halaman aktif
    $halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    // Tentukan awal data yang akan ditampilkan pada halaman tersebut
    $awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;




    $queryProduk = mysqli_query($con, "SELECT * FROM produk LIMIT $awaldata, $jumlahdataperhalaman");
    $countData = mysqli_num_rows($queryProduk);
}
$countData = mysqli_num_rows($queryProduk);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Store | Produk</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>
                        123 Street, New York, USA
                    </small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>0812 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>webStore@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="https://twitter.com/?lang=en-id" class="me-3 fw-medium fs-6"><i
                            class="bi bi-twitter text-white"></i>
                    </a>
                    <a href="https://www.instagram.com" class="me-3 fw-medium fs-6"><i
                            class="bi bi-instagram text-white"></i>
                    </a>
                    <a href="https://web.facebook.com" class="me-3 fw-medium fs-6"><i
                            class="bi bi-facebook text-white"></i>
                    </a>
                    <a href="https://wa.me" class="me-3 fw-medium fs-6"><i
                            class="bi bi-whatsapp text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><i class="bi bi-cart3 me-2"></i>Web Store</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/web-store/" class="nav-item nav-link">Home</a>
                    <a href="produk" class="nav-item nav-link active">Produk</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                        <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown">
                            <?php while ($data = mysqli_fetch_array($queryCategori)) { ?>
                                <a href="produk.php?categori=<?php echo $data['nama']; ?>" class="dropdown-item">
                                    <?php echo $data['nama']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="tentang-kami" class="nav-item nav-link">Tentang Kami</a>
                    <a href="hubungi" class="nav-item nav-link">Hubungi</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-produk">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Semua Produk</h1>
                    <div class="col-md-8 offset-md-2 mt-5">
                        <form action="produk.php" method="get">
                            <div class="input-group animated zoomIn">
                                <input type="text" class="form-control" placeholder="Cari Produk"
                                    style="box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff; background-color: #ecf0f3;"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                                <button type="submit" class="btn btn-primary"><i
                                        class="bi bi-search me-2"></i>Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Product not found start -->
    <style>
        .st0 {
            fill: #fff
        }

        .st2 {
            fill: #5d89af
        }

        .st3 {
            fill: #709abf
        }

        .st4,
        .st6 {
            fill: #fff;
            stroke: #b3dcdf;
            stroke-miterlimit: 10
        }

        .st6 {
            stroke: #5d89af;
            stroke-width: 2
        }

        .st7,
        .st8,
        .st9 {
            stroke: #709abf;
            stroke-miterlimit: 10
        }

        .st7 {
            stroke-width: 5;
            stroke-linecap: round;
            fill: none
        }

        .st8,
        .st9 {
            fill: #fff
        }

        .st9 {
            fill: none
        }

        .st10 {}

        #cloud1 {
            animation: cloud003 15s linear infinite;
        }

        #cloud2 {
            animation: cloud002 25s linear infinite;
        }

        #cloud3 {
            animation: cloud003 20s linear infinite;
        }

        #cloud4 {
            animation: float 4s linear infinite;
        }

        #cloud5 {
            animation: float 8s linear infinite;
        }

        #cloud7 {
            animation: float 5s linear infinite;
        }

        #tracks {
            animation: slide 650ms linear infinite;
        }

        #bumps {
            animation: land 10000ms linear infinite;
        }

        @keyframes jig {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(1px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        #car-layers {
            animation: jig 0.35s linear infinite;
        }

        @keyframes land {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(1000px);
            }
        }


        @keyframes slide {
            from {
                transform: translateX(0px);
            }

            to {
                transform: translateX(100px);
            }
        }

        /* @keyframes cloudFloat {
  0% { transform: translateX(0) translateY(3px); }
  100% { transform: translateX(1000px) translateY(0); }
} */

        @keyframes cloud001 {
            0% {
                transform: translateX(-1000px) translateY(3px);
            }

            100% {
                transform: translateX(1000px) translateY(0);
            }
        }

        @keyframes cloud002 {
            0% {
                transform: translateX(-1000px) translateY(3px);
            }

            100% {
                transform: translateX(1000px) translateY(0);
            }
        }

        @keyframes cloud003 {
            0% {
                transform: translateX(-1000px) translateY(3px);
            }

            100% {
                transform: translateX(1000px) translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px) translateX(0);
            }

            50% {
                transform: translateY(8px) translateX(5px);
            }

            100% {
                transform: translateY(0px) translateX(0);
            }
        }

        #bracefront,
        #braceback {
            animation: braces 1s linear infinite;
        }

        @keyframes braces {
            0% {
                transform: translateX(-2px);
            }

            25% {
                transform: translateX(3px);
            }

            50% {
                transform: translateX(-2px);
            }

            75% {
                transform: translateX(3px);
            }

            100% {
                transform: translateX(-2px);
            }
        }
    </style>
    <?php if ($countData < 1) { ?>
        <div class="main container-fluid py-5">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 355">
                    <g id="ocean">
                        <path id="sky" class="st0" d="M0 0h1000v203.1H0z" />
                        <linearGradient id="water_1_" gradientUnits="userSpaceOnUse" x1="500" y1="354" x2="500"
                            y2="200.667">
                            <stop offset="0" stop-color="#fff" />
                            <stop offset="1" stop-color="#b3dcdf" />
                        </linearGradient>
                        <path id="water" fill="url(#water_1_)" d="M0 200.7h1000V354H0z" />
                        <path id="land" class="st0" d="M0 273.4h1000V354H0z" />
                        <g id="bumps">
                            <path class="st0" d="M0 275.2s83.8-28 180-28 197 28 197 28H0z" />
                            <path class="st0" d="M377 275.2s54.7-28 117.5-28 128.6 28 128.6 28H377z" />
                            <path class="st0" d="M623.2 275.2s83.7-28 179.9-28 196.9 28 196.9 28H623.2z" />
                            <path class="st0" d="M-998 275.2s83.8-28 180-28 197 28 197 28h-377z" />
                            <path class="st0" d="M-621 275.2s54.7-28 117.5-28 128.6 28 128.6 28H-621z" />
                            <path class="st0" d="M-374.8 275.2s83.7-28 179.9-28S2 275.2 2 275.2h-376.8z" />
                        </g>
                    </g>
                    <g id="tracks">
                        <path class="st2" d="M9.8 282.4h-3L0 307.6h3z" />
                        <path class="st2" d="M19.8 282.4h-3L10 307.6h3z" />
                        <path class="st2" d="M29.8 282.4h-3L20 307.6h3z" />
                        <path class="st2" d="M39.8 282.4h-3L30 307.6h3z" />
                        <path class="st2" d="M49.8 282.4h-3L40 307.6h3z" />
                        <path class="st2" d="M59.8 282.4h-3L50 307.6h3z" />
                        <path class="st2" d="M69.8 282.4h-3L60 307.6h3z" />
                        <path class="st2" d="M79.8 282.4h-3L70 307.6h3z" />
                        <path class="st2" d="M89.8 282.4h-3L80 307.6h3z" />
                        <path class="st2" d="M99.8 282.4h-3L90 307.6h3z" />
                        <path class="st2" d="M109.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M119.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M129.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M139.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M149.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M159.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M169.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M179.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M189.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M199.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M209.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M219.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M229.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M239.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M249.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M259.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M269.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M279.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M289.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M299.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M309.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M319.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M329.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M339.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M349.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M359.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M369.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M379.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M389.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M399.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M409.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M419.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M429.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M439.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M449.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M459.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M469.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M479.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M489.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M499.8 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M1000 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M990 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M980 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M970 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M960 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M950 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M940 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M930 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M920 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M910 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M900 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M890 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M880 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M870 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M860 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M850 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M840 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M830 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M820 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M810 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M800 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M790 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M780 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M770 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M760 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M750 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M740 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M730 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M720 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M710 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M700 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M690 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M680 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M670 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M660 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M650 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M640 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M630 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M620 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M610 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M600 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M590 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M580 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M570 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M560 282.4h-3l-6.8 25.2h3z" />
                        <g>
                            <path class="st2" d="M-490.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-480.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-470.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-460.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-450.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-440.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-430.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-420.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-410.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-400.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-390.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-380.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-370.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-360.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-350.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-340.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-330.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-320.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-310.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-300.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-290.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-280.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-270.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-260.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-250.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-240.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-230.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-220.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-210.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-200.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-190.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-180.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-170.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-160.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-150.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-140.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-130.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-120.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-110.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-100.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-90.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-80.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-70.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-60.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-50.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-40.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-30.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-20.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-10.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M-.2 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M500 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M490 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M480 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M470 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M460 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M450 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M440 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M430 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M420 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M410 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M400 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M390 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M380 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M370 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M360 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M350 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M340 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M330 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M320 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M310 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M300 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M290 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M280 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M270 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M260 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M250 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M240 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M230 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M220 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M210 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M200 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M190 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M180 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M170 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M160 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M150 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M140 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M130 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M120 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M110 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M100 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M90 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M80 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M70 282.4h-3l-6.8 25.2h3z" />
                            <path class="st2" d="M60 282.4h-3l-6.8 25.2h3z" />
                        </g>
                        <path class="st2" d="M550 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M540 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M530 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M520 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M510 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M550 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M540 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M530 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M520 282.4h-3l-6.8 25.2h3z" />
                        <path class="st2" d="M510 282.4h-3l-6.8 25.2h3z" />
                        <path class="st3" d="M-499.5 300.2H1000v5.1H-499.5z" />
                        <path class="st3" d="M-499.5 283.8H1000v2.8H-499.5z" />
                    </g>
                    <g id="cloudsAll">
                        <path id="cloud1" class="st4"
                            d="M19.5 69.7s-21.3.5-25-12.2c0 0-4.3-21.3 16-21.8 0 0-2.1-12.2 12.2-14.9 0 0 15-3.2 21.3 6.9 0 0 3.6-20.7 17.8-22.3 0 0 24-3 26.6 13.1 0 0 .1 9.5-2.8 13.5 0 0 9.5-15 26.5-4.8 0 0 12.1 7.9 7 20.2 0 0 16 4.8 10.1 18.1 0 0-10.2 8.5-17.1-1.1 0 0-5.5 16-32.5 16 0 0-19.1 2.1-27-13.3 0 0 .5 10.1-13.3 10.6-.1 0-20.3 3.2-19.8-8z" />
                        <path id="cloud3" class="st4"
                            d="M836 132s-18.3 2.1-22.2-4.9c0 0-4.9-11.8 12.5-13.8 0 0-2.5-6.8 9.7-9.6 0 0 12.7-3.1 18.7 2.1 0 0 2-12.2 14-14.3 0 0 16.6-3.3 23.7 2.1 0 0 4.8 3.9 2.4 6.5 0 0 3.1-4.8 18.4-.4 0 0 10.9 3.5 7.2 11 0 0 13.8-1.5 9.7 9.5 0 0-4.1 10.8-15.5 4.8 0 0-3.1 5.6-26.4 7.9 0 0-16.3 2.8-24-5.3 0 0 1 5.7-10.8 7.2-.1.1-17.2 3.6-17.4-2.8z" />
                        <path id="cloud2" class="st4"
                            d="M19.3 159.5s-15.9.6-18.8-5.1c0 0-3.4-9.5 11.7-10.1 0 0-1.7-5.5 9-6.9 0 0 11.2-1.7 16 2.8 0 0 2.5-9.4 13.1-10.3 0 0 17.9-1.8 20 5.4 0 0 .2 4.3-2 6.1 0 0 6.9-6.9 19.8-2.6 0 0 9.1 3.4 5.5 9 0 0 6.5 0 4.5 6.7 0 0-2.6 5.6-9.6 1 0 0-4 7.3-24.2 7.7 0 0-14.2 1.3-20.4-5.5 0 0 .5 4.5-9.8 5 0 .1-15 1.8-14.8-3.2z" />
                        <path id="cloud4" class="st4"
                            d="M370.3 109.5s15.9.6 18.8-5.1c0 0 3.4-9.5-11.7-10.1 0 0 1.7-5.5-9-6.9 0 0-11.2-1.7-16 2.8 0 0-2.5-9.4-13.1-10.3 0 0-17.9-1.8-20 5.4 0 0-.2 4.3 2 6.1 0 0-6.9-6.9-19.8-2.6 0 0-9.1 3.4-5.5 9 0 0-12 1.9-7.7 8 0 0 7.5 4 12.8-.2 0 0 4 7.3 24.2 7.7 0 0 14.2 1.3 20.4-5.5 0 0-.5 4.5 9.8 5 0 0 15.1 1.7 14.8-3.3z" />
                        <path id="cloud5" class="st4"
                            d="M511.7 12.4s-21.3-.3-25 7c0 0-4.3 12.2 16 12.5 0 0-2.1 7 12.2 8.6 0 0 15 1.8 21.3-4 0 0 3.6 11.9 17.8 12.8 0 0 19.5 1.6 27-4.4 0 0 5-4.4 2.1-6.7 0 0 4.1 4.4 21.2-1.5 0 0 12.1-4.6 7-11.6 0 0 16-2.8 10.1-10.4 0 0-10.2-4.9-17.1.6 0 0-5.5-9.2-32.5-9.2 0 0-19.1-1.2-27 7.6 0 0 .5-5.8-13.3-6.1-.1.2-20.3-1.6-19.8 4.8z" />
                    </g>
                    <g id="train">
                        <path fill="#b3dcdf" d="M344.5 248.5h507.2v37.8H344.5z" />
                        <g id="wheels">
                            <circle class="st6" cx="384.1" cy="285.6" r="15.1" />
                            <path class="st2"
                                d="M384.1 295.7c-5.6 0-10.1-4.5-10.1-10.1s4.5-10.1 10.1-10.1 10.1 4.5 10.1 10.1c0 5.5-4.6 10.1-10.1 10.1z" />
                            <circle class="st6" cx="416.1" cy="285.6" r="15.1" />
                            <path class="st2"
                                d="M416.1 295.7c-5.6 0-10.1-4.5-10.1-10.1s4.5-10.1 10.1-10.1 10.1 4.5 10.1 10.1c0 5.5-4.6 10.1-10.1 10.1z" />
                            <circle class="st6" cx="469.1" cy="285.6" r="15.1" />
                            <path class="st2"
                                d="M469.1 295.7c-5.6 0-10.1-4.5-10.1-10.1s4.5-10.1 10.1-10.1 10.1 4.5 10.1 10.1c0 5.5-4.6 10.1-10.1 10.1z" />
                            <circle class="st6" cx="734.1" cy="285.6" r="15.1" />
                            <path class="st2"
                                d="M734.1 295.7c-5.6 0-10.1-4.5-10.1-10.1s4.5-10.1 10.1-10.1 10.1 4.5 10.1 10.1c0 5.5-4.6 10.1-10.1 10.1z" />
                            <circle class="st6" cx="766.1" cy="285.6" r="15.1" />
                            <path class="st2"
                                d="M766.1 295.7c-5.6 0-10.1-4.5-10.1-10.1s4.5-10.1 10.1-10.1 10.1 4.5 10.1 10.1c0 5.5-4.6 10.1-10.1 10.1z" />
                            <circle class="st6" cx="821.1" cy="285.6" r="15.1" />
                            <path class="st2"
                                d="M821.1 295.7c-5.6 0-10.1-4.5-10.1-10.1s4.5-10.1 10.1-10.1 10.1 4.5 10.1 10.1c0 5.5-4.6 10.1-10.1 10.1z" />
                        </g>
                        <path id="bracefront" class="st7" d="M383.2 285.6h88.1" />
                        <path id="braceback" class="st7" d="M733.2 285.6h88.1" />
                        <g id="car-layers">
                            <path id="car" class="st8"
                                d="M321.8 300.7v-32.4s1.2.7-1.5-2.4v-29.1s3.1-11.6 10.7-21.1c0 0 7.6-12 15.5-17.5h1.3s10.2-4.9 30.9-28h.6s-.9-1.4 0-2.7c0 0 10.1-10.5 21-12.3 0 0 9.4-1.8 20.2-1.8h47.7V151H492v-1.1h10.1v1.1h19v2.2s8.2.9 19.2-4.2c0 0 1.4-1.1 28.8-1.1h291.5v6.8h7.5v2.2s12.2-.6 12.2 9.8V177l-10-.1v57.9s14.9-.5 14.9 10.2c0 0 1 9-14.9 8.9v3.8H719.5s-2.4.1-4.3 3l-15 29s-2.9 5.1-10.8 5.1H504.3s-2.9.1-6.1-5l-13.1-25s-4.5-7.1-11.8-7.1H369v2.4s-3.2 1.3-7.1 8.7L351.4 289s-2.9 6.3-6.9 6.4h-17.8l-4.9 5.3z" />
                            <path id="streamline-outine" class="st8"
                                d="M320.3 236.6s1.4-6.8 4.4-11.3c0 0 .1-2.3 23.2-6.3l78-16.6s103.3-21.1 134.9-26.1c0 0 93.3-16 120.5-17.9 0 0 57.6-4.3 100-4.1h88.9v63.4s-10.3 5.4-17.1 5.3c0 0-305.6 4.9-366.3 8.1 0 0-100.3 4.8-119.1 6.8 0-.1-46.6 1.2-47.4-1.3z" />
                            <g id="window-grate">
                                <path class="st9" d="M739.5 182.6H854" />
                                <path class="st9" d="M739.5 177.6H854" />
                                <path class="st9" d="M739.5 172.6H854" />
                                <path class="st9" d="M739.5 167.6H854" />
                                <path class="st9" d="M739.5 161.4H854v26.1H739.5z" />
                            </g>
                            <path class="st9" d="M320.3 257.8h549.9" />
                            <g id="Text">
                                <text transform="translate(377.037 230.025)" class="st8 st10" font-size="21">
                                    Produk
                                </text>
                                <text transform="translate(659.5 213.994)" class="st8 st10" font-size="24.025">
                                    Tidak Di Temukan.
                                </text>
                            </g>
                            <g id="ladders">
                                <g id="ladder-f">
                                    <path id="front-ladder" class="st8" d="M433.8 258.4h17.8v34.8h-17.8z" />
                                    <path id="fb-rung" class="st9" d="M433.8 281.1h17.7" />
                                    <path id="ft-rung" class="st9" d="M433.8 268.6h17.7" />
                                </g>
                                <g id="ladder-b">
                                    <path id="ladder-back" class="st8" d="M851.8 257.8h17.8v34.8h-17.8z" />
                                    <path id="bt-rung" class="st9" d="M851.8 268.6h17.7" />
                                    <path id="bb-rung" class="st9" d="M851.8 281.1h17.7" />
                                </g>
                            </g>
                            <path id="window-front" class="st8"
                                d="M350.5 196.4s-.4 3.9 15.2 4.3l32.3-30.3s-18.2 1.1-19-.8l-28.5 26.8z" />
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <script>
            swal({
                title: "Maaf",
                text: "Produk Yang Anda Cari Tidak Di Temukan.",
                icon: "error",
                button: false,
                timer: 5000,
            });
        </script>
    <?php } ?>
    <!-- Product not found end -->


    <!-- Product Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-2">

                <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                    <!-- MOBILE VIEw -->
                    <div class="col-6 d-md-none wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light shadow-lg rounded overflow-hidden">
                            <a href="produk-detail?nama=<?php echo $data['nama']; ?>">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="image/<?php echo $data['foto']; ?>" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end py-1 px-1 fs-6 fw-normal"
                                        href="">
                                        Rp.
                                        <?php echo $data['harga'] ?>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <h4 class="mb-2 text-truncate">
                                        <?php echo $data['nama'] ?>
                                    </h4>
                                    <a class="text-uppercase"
                                        href="produk-detail?nama=<?php echo $data['nama']; ?>">Lihat
                                        Detail <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- DESKTOP VIEW -->
                    <div class="col-md-4 d-none d-md-block wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light shadow-lg rounded overflow-hidden">
                            <a href="produk-detail?nama=<?php echo $data['nama']; ?>">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="image/<?php echo $data['foto']; ?>" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt- py-2 px-4"
                                        href="">
                                        Rp.
                                        <?php echo $data['harga'] ?>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <h4 class="mb-3 text-truncate">
                                        <?php echo $data['nama'] ?>
                                    </h4>
                                    <a class="text-uppercase"
                                        href="produk-detail?nama=<?php echo $data['nama']; ?>">Lihat
                                        Detail <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Product End -->

            <!-- Pagination start -->
            <div class="wow zoomIn"  data-wow-delay="0.6s">
            <?php if (!isset($_GET['keyword']) && !isset($_GET['categori'])): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <?php if ($halamanaktif > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanaktif - 1; ?> " aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $jumlahhalaman; $i++): ?>
                        <?php if ($i == $halamanaktif): ?>
                            <li class="page-item"><a class="page-link bg-primary text-white" href="?halaman=<?= $i; ?>">
                                    <?= $i; ?>
                                </a></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>">
                                    <?= $i; ?>
                                </a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($halamanaktif < $jumlahhalaman): ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanaktif + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
        </div>
        <!-- pagination end -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php include 'component/mainFooter.php' ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>