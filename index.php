<?php
require "dbconnection.php";

$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk ORDER BY id DESC LIMIT 6");
$queryCategori = mysqli_query($con, "SELECT * FROM categori");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Store.com</title>
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

    <!-- b-icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- for carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

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
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York,
                        USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>0812 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>webStore@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="https://twitter.com/?lang=en-id" class="me-3 fw-medium fs-6"><i
                            class="bi bi-twitter text-white"></i>
                    </a>
                    <a href="https://www.instagram.com/" class="me-3 fw-medium fs-6"><i
                            class="bi bi-instagram text-white"></i>
                    </a>
                    <a href="https://web.facebook.com/" class="me-3 fw-medium fs-6"><i
                            class="bi bi-facebook text-white"></i>
                    </a>
                    <a href="https://wa.me/" class="me-3 fw-medium fs-6"><i
                            class="bi bi-whatsapp text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><i class="bi bi-cart3 me-2"></i>Web Store</h1>
            </a>
            <button class="navbar-toggler border border-0" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/web-store/" class="nav-item nav-link active">Home</a>
                    <a href="produk" class="nav-item nav-link">Produk</a>
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

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white fs-4 mb-3 animated slideInDown">~www.Web Store.com~
                            </h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">menjual berbagai produk pilihan
                            </h1>
                            <a href="produk.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lihat
                                Produk</a>
                            <a href="hubungi.php"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Hubungi
                                Kami</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">temukan produk impian anda!</h1>
                            <a href="produk.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Lihat
                                Produk</a>
                            <a href="hubungi.php"
                                class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Hubungi
                                Kami</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


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


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0 d-none d-lg-block">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-search text-primary fs-2"></i>
                        </div>
                        <div class="ps-4">
                            <h1 class="text-white mb-0 fs-6">Pilih Produk</h1>
                            <h1 class="text-white mb-0 fs-6">yang anda sukai !</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-telephone-inbound-fill text-white fs-2"></i>
                        </div>
                        <div class="ps-4">
                            <h1 class="text-primary mb-0 fs-6">Hubungi pada</h1>
                            <h1 class="mb-0 text-primary fs-6">nomor yang tertera !</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-truck text-primary fs-2"></i>
                        </div>
                        <div class="ps-4">
                            <h1 class="text-white mb-0 fs-6">Lakukan pembayaran,</h1>
                            <h1 class="text-white mb-0 fs-6">dan produk siap diantar !</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- Highlight category Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Highlight</h5>
                <h1 class="mb-0">Kategori Terpopuler</h1>
            </div>
            <div class="row g-1 owl-carousel">
                
                <div class=" wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden" style="box-shadow: 8px 8px 8px #cbced1;">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/kategori-pria.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle"
                                    href="produk?categori=Pakaian Pria"><i
                                        class="bi bi-eye-fill w-12 h-12 fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <p class="text-uppercase m-0">kategori</p>
                            <h4 class="text-primary">Pria</h4>
                        </div>
                    </div>
                </div>
                <div class=" wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden" style="box-shadow: 8px 8px 8px #cbced1;">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/kategori-wanita.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle"
                                    href="produk?categori=Pakaian Wanita"><i
                                        class="bi bi-eye-fill w-12 h-12 fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <p class="text-uppercase m-0">kategori</p>
                            <h4 class="text-primary">Wanita</h4>
                        </div>
                    </div>
                </div>
                <div class=" wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden" style="box-shadow: 8px 8px 8px #cbced1;">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/kategori-anak.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle"
                                    href="produk?categori=Pakaian Anak"><i
                                        class="bi bi-eye-fill w-12 h-12 fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <p class="text-uppercase m-0">kategori</p>
                            <h4 class="text-primary">Anak-Anak</h4>
                        </div>
                    </div>
                </div>
                <div class=" wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden" style="box-shadow: 8px 8px 8px #cbced1;">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/kategori-sepatu.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle"
                                    href="produk.php?categori=sepatu"><i
                                        class="bi bi-eye-fill w-12 h-12 fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <p class="text-uppercase m-0">kategori</p>
                            <h4 class="text-primary">Sepatu</h4>
                        </div>
                    </div>
                </div>
                <div class=" wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden" style="box-shadow: 8px 8px 8px #cbced1;">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/kategori-jaket-switer.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle"
                                    href="produk.php?categori=sweeter%20/%20jaket"><i
                                        class="bi bi-eye-fill w-12 h-12 fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <p class="text-uppercase m-0">kategori</p>
                            <h4 class="text-primary">Jaket & Sweater</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Highlight category end -->


    <!-- About us start -->
    <div class="container-fluid bg-primary py-5 wow zoomIn" style="z-index: 999;" data-wow-delay="0.6s">
        <div class="container text-center">
            <div class="section-title text-center position-relative pb-2 mb-2 mx-auto" style="max-width: 600px;">
                <h3 class="fw-bold text-white text-uppercase">Sekilas Tentang Kami</h3>
            </div>
            <p class="text-white-50 fw-semibold fs-6">
                Selamat datang di toko online kami, destinasi terbaik untuk kebutuhan belanja Anda!
                Dengan koleksi produk yang beragam dan berkualitas, kami menyediakan pengalaman
                belanja yang mudah dan menyenangkan. Nikmati kemudahan berbelanja dari kenyamanan
                rumah Anda,<span class="d-none d-lg-block"> dengan layanan pelanggan yang responsif dan pengiriman yang
                    cepat.
                    Temukan berbagai pilihan fashion, elektronik, peralatan rumah tangga, dan banyak lagi.
                    Dengan transaksi aman dan sistem pembayaran yang fleksibel, kami berkomitmen untuk
                    memenuhi kebutuhan konsumen modern. Jelajahi toko online kami dan rasakan kegembiraan
                    belanja tanpa batas, dijamin memuaskan setiap gaya dan kebutuhan Anda!</span>
            </p>
        </div>
    </div>
    <!-- Abour us end -->


    <!-- Product Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Highlight</h5>
                <h1 class="mb-0">Produk Terbaru</h1>
            </div>
            <div class="row g-3">

                <?php while ($data = mysqli_fetch_assoc($queryProduk)) { ?>
                            <!-- Mobile View -->
                            <div class="col-6 d-md-none wow slideInUp" data-wow-delay="0.3s">
                                <div class="blog-item bg-light rounded overflow-hidden shadow-lg">
                                    <a href="produk-detail?nama=<?php echo htmlspecialchars($data['nama']); ?>">
                                        <div class="blog-img position-relative overflow-hidden">
                                            <img class="img-fluid" src="image/<?php echo htmlspecialchars($data['foto']); ?>" alt="">
                                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end py-1 px-1 fs-6 fw-light"
                                                href="">
                                                Rp.
                                                <?php echo htmlspecialchars($data['harga']) ?>
                                            </a>
                                        </div>
                                        <div class="p-4">
                                            <h4 class="mb-3 text-truncate">
                                                <?php echo htmlspecialchars($data['nama']) ?>
                                            </h4>
                                            <a class="text-uppercase"
                                                href="produk-detail?nama=<?php echo htmlspecialchars($data['nama']); ?>">Lihat
                                                Detail <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Desktop View -->
                            <div class="col-md-4 d-none d-md-block wow slideInUp" data-wow-delay="0.3s">
                                <div class="blog-item bg-light rounded overflow-hidden shadow-lg">
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
    <div class="d-flex align-items-center justify-content-center wow zoomIn" data-wow-delay="0.6s">
        <a href="produk" class="btn btn-primary py-3 px-5" style="box-shadow: 4px 4px 4px #b1b1b1">Lihat
            Semua Produk</a>
    </div>
    <!-- Product End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Hubungi Kami</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="bi bi-currency-dollar text-primary me-2 fs-4"></i></i>Dapatkan
                                Penawaran Harga</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>Layanan 24 Jam
                            </h5>
                        </div>
                    </div>
                    <p class="mb-4">Buat pesanan melalui nomor di bawah via WahtsApp,<br> Dan dapatkan penawaran harga
                        menarik dari penjual.</p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Hubungi Melalui Nomor Di Bawah:</h5>
                            <h4 class="text-primary mb-0">0812 345 6789</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn"
                        data-wow-delay="0.9s">
                        <form id="contact-form">
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control border-0" placeholder="Your Name" name="name"
                                        id="name" autocomplete="off" required
                                        style="height: 55px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff; background-color: #ecf0f3;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control border-0" placeholder="Your Email"
                                        name="email" id="email" autocomplete="off" required
                                        style="height: 55px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff; background-color: #ecf0f3;">
                                </div>
                                <div class="col-12">
                                    <input type="number" class="form-control border-0" placeholder="No.Handphone"
                                        name="phone" id="phone" autocomplete="off" required
                                        style="height: 55px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff; background-color: #ecf0f3;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" rows="3" name="message" id="message" require
                                        placeholder="Message"
                                        style="box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff; background-color: #ecf0f3;"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" name="submit" type="button"
                                        id="submitBtn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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


    <!-- Boostraps script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- swite alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Emailjs Library -->
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const submitButton = document.getElementById('submitBtn'); 
            const form = document.getElementById('contact-form'); 

            submitButton.addEventListener('click', function (e) {
                e.preventDefault();

                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const message = document.getElementById('message').value;

                if (!name || !email || !phone || !message) {
                    swal("Warning!", "Please fill in all fields!", "warning");
                    return;
                }

                document.getElementById('contact-form').reset();

                sendEmail(name, email, phone, message);
            });

            function sendEmail(name, email, phone, message) {
                Email.send({
                    SecureToken: "your token",
                    To: 'developer@apriyana.com',
                    From: "developer@apriyana.com",
                    Subject: "Web Store",
                    Body: "Name: " + name + "<br>Email: " + email + "<br>Phone: " + phone + "<br>Message: " + message
                }).then(
                    message => swal("Success!", "Your message has been sent successfully!", "success")
                );
            }
        });
    </script>

    <!-- corousel item -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 3,  // Number of items to display
            loop: true, // Infinite loop
            margin: 10, // Space between items
            autoplay: true, // Autoplay
            autoplayTimeout: 3000, // Autoplay interval in milliseconds
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                }
            }
        });
    });
</script>
</body>

</html>