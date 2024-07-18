<?php
require "dbconnection.php";
$queryCategori = mysqli_query($con, "SELECT * FROM categori");

$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama = '$nama' ");
$produk = mysqli_fetch_array($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Store | Produk Detail</title>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

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

        <div class="container-fluid bg-primary py-5 bg-detail">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Detail Produk</h1>

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

    <!-- Detail Produk Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="image/<?php echo $produk['foto']; ?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">
                            <?php echo $produk['nama']; ?>
                        </h1>
                    </div>
                    <h5 class="fw-bold fs-4 text-primary"><span class="text-dark">status : </span>
                        <?php echo $produk['ketersediaan_stok']; ?>
                    </h5>
                    <h5 class="mb-2 mt-3"><i class="bi bi-eye-fill text-primary me-2"></i>Detail :</h5>
                    <p class="mb-4">
                        <?php echo htmlspecialchars_decode($produk['detail']); ?>
                    </p>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <h4 class="text-primary mb-0">Rp.
                            <?php echo $produk['harga']; ?>
                        </h4>
                    </div>
                    <a href="#myModal" type="button" data-toggle="modal">
                        <button class="btn btn-primary py-2 px-5 wow zoomIn" data-wow-delay="0.9s">Beli
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Detail Produk End -->

    <!-- Main alert start -->
    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }

        .modal-confirm {
            color: #8e8e8e;
            width: 450px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
            justify-content: center;
            border-radius: 5px 5px 0 0;
        }

        .modal-confirm h4 {
            color: #091E3E;
            text-align: center;
            font-size: 30px;
            margin: 0 0 25px;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            background: #fff;
            position: absolute;
            top: 15px;
            right: 15px;
            color: #dc3545;
            text-shadow: none;
            opacity: 0.5;
            width: 30px;
            height: 30px;
            padding: 0;
            border: none;
            font-size: 20px;
            font-weight: 500;
        }

        .modal-confirm .close:hover {
            opacity: 0.8;
        }

        .modal-confirm .icon-box {
            color: #ffc107;
            display: inline-block;
            z-index: 9;
            padding-bottom: 5px;
            text-align: center;
            position: relative;
            transform: scale(1.5);
        }

        .modal-confirm .icon-box i:first-child {
            font-size: 100px;
        }

        .modal-confirm .icon-box i:nth-child(2) {
            font-size: 138px;
            position: absolute;
            left: -19px;
            top: -23px;
            font-weight: bold;
            color: #fff;
        }

        .modal-confirm .icon-box i:last-child {
            font-size: 26px;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
            top: 44px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #03d91f;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border-radius: 3px;
            margin: 30px 0 20px;
            padding: 6px 20px;
            min-width: 150px;
            border: none;
            box-shadow: 5px 5px 5px #b1b1b1;
            transition: all 0.6s ease-in-out;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #00ff22;
            outline: none;
            color: #fff;
            box-shadow: none;
            transform: translateY(-5px);
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

        span.text {
            padding: 0;
            padding-right: 4px;
            border-right: 2px solid #747474;
            animation: blink 0.75s infinite;
        }

        @keyframes blink {
            from {
                border: none;
            }

            to {
                border-color: 2px solid #747474;
            }
        }
    </style>
    <div id="myModal" class="modal fade  animate__animated animate__bounceIn">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box animate__animated animate__fadeIn animate__infinite ">
                        <i class="material-icons">&#xE86B;</i>
                        <i class="material-icons">&#xE86B;</i>
                        <i class="material-icons">&#xE645;</i>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" aria-label="Close"><i
                            class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body text-center">
                    <h4><span class="text blue"></span></h4>
                    <p>Untuk melakukan pembelian anda bisa menghubungi nomor berikut:<br> 
                    <strong>0812 345 6789</strong> <br>
                        atau mengklik tombol di bawah, hal ini bertujuan agar proses transaksi menjadi lebih aman.
                    </p>
                    <a
                        href="https://wa.me">
                        <!-- <a href="https://wa.me/62895606066455?text=Hai,%20kaka%20saya%20tertarik%20dengan%20produk%20yang%20anda%20jual."> -->
                        <button class="btn"><i class="bi bi-whatsapp me-2"></i>Hubungi Penjual</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const words = ["PERHATIAN !!!", "PERHATIAN !!!", "PERHATIAN !!!", "PERHATIAN !!!"],
            colors = ["blue", "green", "yellow", "red"],
            text = document.querySelector(".text");

        // Generator (iterate from 0-3)
        function* generator() {
            var index = 0;
            while (true) {
                yield index++;

                if (index > 3) {
                    index = 0;
                }
            }
        }

        // Printing effect
        function printChar(word) {
            let i = 0;
            text.innerHTML = "";
            text.classList.add(colors[words.indexOf(word)]);
            let id = setInterval(() => {
                if (i >= word.length) {
                    deleteChar();
                    clearInterval(id);
                } else {
                    text.innerHTML += word[i];
                    i++;
                }
            }, 500);
        }

        // Deleting effect
        function deleteChar() {
            let word = text.innerHTML;
            let i = word.length - 1;
            let id = setInterval(() => {
                if (i >= 0) {
                    text.innerHTML = text.innerHTML.substring(0, text.innerHTML.length - 1);
                    i--;
                } else {
                    text.classList.remove(colors[words.indexOf(word)]);
                    printChar(words[gen.next().value]);
                    clearInterval(id);
                }
            }, 300);
        }

        // Initializing generator
        let gen = generator();

        printChar(words[gen.next().value]);

    </script>
    <!-- Main alert end -->


    <?php include 'component/mainFooter.php' ?>
</body>

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


</html>