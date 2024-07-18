<?php
require "dbconnection.php";
$queryCategori = mysqli_query($con, "SELECT * FROM categori");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Store | Tentang Kami</title>
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
                    <a href="https://twitter.com"
                        class="me-3 fw-medium fs-6"><i class="bi bi-twitter text-white"></i>
                    </a>
                    <a href="https://www.instagram.com"
                        class="me-3 fw-medium fs-6"><i class="bi bi-instagram text-white"></i>
                    </a>
                    <a href="https://web.facebook.com"
                        class="me-3 fw-medium fs-6"><i class="bi bi-facebook text-white"></i>
                    </a>
                    <a href="https://wa.me"
                        class="me-3 fw-medium fs-6"><i class="bi bi-whatsapp text-white"></i>
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
                    <a href="produk" class="nav-item nav-link ">Produk</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                        <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown">
                            <?php while($data = mysqli_fetch_array($queryCategori)) { ?>
                                <a href="produk.php?categori=<?php echo $data['nama']; ?>" class="dropdown-item">
                                    <?php echo $data['nama']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="tentang-kami" class="nav-item nav-link active">Tentang Kami</a>
                    <a href="hubungi" class="nav-item nav-link">Hubungi</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-tentang">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Tentang Kami</h1>
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">~www.Web Store.com~</h5>
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


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">www.web store.com</h5>
                        <h1 class="mb-0">Tentang Kami</h1>
                    </div>
                    <p class="mb-4">
                        www.web store.com adalah destinasi utama bagi para konsumen yang mencari
                        pengalaman berbelanja yang praktis dan menyenangkan. Dengan antarmuka yang
                        intuitif dan ramah pengguna, toko ini menawarkan berbagai produk berkualitas
                        tinggi mulai dari pakaian, aksesori, hingga peralatan rumah tangga.
                        Pelanggan dapat dengan mudah menjelajahi katalog yang luas, menemukan produk
                        yang diinginkan, dan melakukan transaksi dengan cepat dan aman melalui sistem
                        pembayaran yang terpercaya.
                        <br>
                        <br>
                        Selain itu, toko online ini mengutamakan kepuasan pelanggan dengan menyediakan
                        layanan pelanggan yang responsif dan ramah. Tim dukungan pelanggan siap membantu
                        dalam menanggapi pertanyaan, memberikan saran produk, dan menangani masalah apapun
                        dengan efisien. Pengguna juga dapat menikmati promo dan diskon menarik yang
                        teratur, menjadikan toko online ini pilihan utama bagi mereka yang mencari
                        kenyamanan dan nilai tambah dalam berbelanja secara daring.
                    </p>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Hubungi Melalui Nomor Di Bawah:</h5>
                            <h4 class="text-primary mb-0">0812 345 6789</h4>
                        </div>
                    </div>
                    <a href="hubungi" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn"
                        data-wow-delay="0.9s">Hubungi Kami</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Developer Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0">Developer Information</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-3" src="img/rantoon-picsay.png" alt="">
                        <h1 class="mb-4 text-center">Ran Official</h1>
                        <p>Saya adalah seorang developer web dapat memiliki berbagai keahlian, mulai dari pengembangan frontend hingga backend. 
                            Dalam pengembang frontend saya bertanggung jawab untuk membuat tampilan yang interaktif dan menarik bagi pengguna. 
                            Dan bekerja dengan bahasa pemrograman seperti HTML, CSS, dan JavaScript untuk membangun antarmuka 
                            pengguna yang responsif dan estetis.</p>

                        <p>Di sisi lain, dalam pengembang backend saya berfokus pada logika dan fungsionalitas yang terjadi 
                            di belakang layar.Dan bekerja dengan server, database, dan bahasa pemrograman 
                            server-side seperti Python, Ruby, atau PHP. Tugas saya juga termasuk mengelola data, 
                            menangani permintaan server, dan memastikan bahwa situs web berfungsi dengan baik 
                            dari segi teknis.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Skill :</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Design UI/UX</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Web Development</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Frontend Development</a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>Backend Development</a>
                        </div>
                    </div>
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Sosial Media :</h3>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/ig.png" style="width: 60px; height: 60px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">@ranofficial.io
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/fb.png" style="width: 60px; height: 60px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Randi apriyana
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/mail.png" style="width: 60px; height: 60px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">developer@apriyana.com
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/git.png" style="width: 60px; height: 60px; object-fit: cover;" alt="">
                            <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">RanOfficial31
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Developer end -->

    <?php include 'component/mainFooter.php' ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


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
</body>

</html>