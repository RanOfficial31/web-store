<?php
require "dbconnection.php";
$queryCategori = mysqli_query($con, "SELECT * FROM categori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Web Store | Hubungi</title>
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
                            <?php while ($data = mysqli_fetch_array($queryCategori)) { ?>
                                <a href="produk.php?categori=<?php echo $data['nama']; ?>" class="dropdown-item">
                                    <?php echo $data['nama']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="tentang-kami" class="nav-item nav-link">Tentang Kami</a>
                    <a href="hubungi" class="nav-item nav-link active">Hubungi</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-contact">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Hubungi Kami</h1>
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


    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                <h1 class="mb-0">Hubungi Kami Melalui Informasi Kontak di bawah.</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Whatsapp/Telepon</h5>
                            <h4 class="text-primary mb-0">0812 345 6789</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Alamat Email</h5>
                            <h4 class="text-primary mb-0">webStore@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Alamat Toko</h5>
                            <h4 class="text-primary mb-0">123 Street, New York, USA</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form id="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control border-0 bg-light px-4" autocomplete='off' 
                                    placeholder="Your Name" style="height: 55px; box-shadow: 8px 8px 8px #cbced1;" required/>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control border-0 bg-light px-4" autocomplete='off' 
                                    placeholder="Your Email" style="height: 55px; box-shadow: 8px 8px 8px #cbced1;" required/>
                            </div>
                            <div class="col-12">
                                <input type="number" name="phone" id="phone" class="form-control border-0 bg-light px-4" autocomplete='off' 
                                    placeholder="No. Handphone" style="height: 55px; box-shadow: 8px 8px 8px #cbced1;" required/>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" name="message" rows="4" autocomplete='off' 
                                    placeholder="Message" id="message"
                                    style="box-shadow: 8px 8px 8px #cbced1;" required></textarea>
                            </div>
                            <!-- <input type="hidden" name="noWa" value="62895606066455"> -->
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="submit" type="button" id="submitBtn"
                                    style="box-shadow: 3px 3px 3px #b1b1b1;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100 border" style="box-shadow: 8px 8px 8px #cbced1;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        allowfullscreen="" loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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
</body>

</html>
