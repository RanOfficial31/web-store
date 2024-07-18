<?php
ob_start();
session_start();
require "../dbconnection.php";

if (isset($_POST['loginbtn'])) {
    $username =  htmlspecialchars(strip_tags(trim($_POST['username'])));
    $password =  htmlspecialchars(strip_tags(trim($_POST['password'])));

    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $countdata = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);
    if ($countdata > 0) {

        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['login'] = true;
            header('location: /web-store/adminpanel/');
        } else {

            $password = true;

        }
    } else {
        
        $no_account = true;
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- FAVICON START -->
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- FAVICON END -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <!-- component -->
    <!-- Container -->
    <div class="flex flex-col h-screen bg-gray-100">
        <!-- Auth Card Container -->
        <div class="grid place-items-center mx-2 my-20 sm:my-auto">
            <div class="mb-5">
            </div>
            <!-- Auth Card -->
            <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 
            px-6 py-10 sm:px-10 sm:py-6 
            bg-gray-100 rounded-lg shadow-[6px_6px_6px_#b1b1b1,-7px_-7pX_7px_#fff]"
                data-aos="zoom-out" data-aos-duration="2000">

                <!-- Card Title -->
                <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                    Login
                </h2>

                <form class="mt-10" action="" method="POST">
                    <!-- Email Input -->
                    <label for="username" class="block text-xs font-semibold text-gray-600 uppercase">username :</label>
                    <input id="username" type="username" name="username" placeholder="for name" class="block w-full py-3 px-1 mt-2 
                    text-gray-800 appearance-none bg-gray-100 
                    border-b-2 border-gray-500
                    focus:text-gray-500 focus:outline-none focus:border-gray-800" required />

                    <!-- Password Input -->
                    <label for="password" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Password
                        :</label>
                    <input id="password" type="password" name="password" placeholder="for password" class="block w-full py-3 px-1 mt-2 mb-4
                    text-gray-800 appearance-none bg-gray-100
                    border-b-2 border-gray-500
                    focus:text-gray-500 focus:outline-none focus:border-gray-800" required />

                    <!-- Auth Buttton -->
                    <button type="submit" name="loginbtn" class="w-full py-3 mt-10 bg-gray-800 rounded-md
                    font-medium text-white uppercase transition ease-in-out delay-0 hover:-translate-1 hover:scale-105 duration-300
                    focus:outline-none hover:bg-gray-900 hover:shadow-none shadow-[5px_5px_4px_#b1b1b1]">
                        Login
                    </button>

                    <!-- Another Auth Routes -->
                    <div class="sm:flex sm:flex-wrap mt-8 sm:mb-4 text-sm text-center">
                        <p class="flex-1 text-gray-500 text-md mx-4 my-1 sm:my-auto">
                            © 2024 Copyright | Web Store.com By apriyana.com
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

<?php if(isset($password)):?>
    <script>
        swal("upps", "username dan email salah", "error");
    </script>
<?php endif;?>
<?php if(isset($no_account)):?>
    <script>
        swal("upps", "akun anda tidak di temukan", "error");
    </script>
<?php endif;?>
</html>