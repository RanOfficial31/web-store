<?php
require "session.php";
require "../dbconnection.php";

$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
$query = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($query);
$queryCategori = mysqli_query($con, "SELECT * FROM categori");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

    if (isset($_POST['simpan'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $categori = htmlspecialchars($_POST['categori']);
        $harga = htmlspecialchars($_POST['harga']);
        $detail = htmlspecialchars($_POST['detail']);
        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

        $target_dir = "../image/";
        $nama_file = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $nama_file;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $image_size = $_FILES["foto"]["size"];
        $random_name = generateRandomString(20);
        $new_name = $random_name . "." . $imageFileType;
        if ($nama == '' || $categori == '' || $harga == '') {
            echo
                "
                <script> 
                    alert ('Internal Server Error');
                </script>
                ";
        } else {
            // VALIDATION IMAGE
            if ($nama_file != '') {
                if ($image_size > 1000000) {
                    echo 
                    "
                        <script> 
                            alert ('Foto melebihi dari 500 (kb)');
                        </script>
                    ";
                } else {
                    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
                        echo 
                        "
                            <script> 
                                alert ('Gambar Harus Berformat JPG, PNG, JPEG');
                            </script>
                        ";
                    } else {
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                    }
                }
            }
            // INSERT QUERY
            $queryTambah = mysqli_query($con, "INSERT INTO produk
                    (categori_id, nama, harga, foto, detail, ketersediaan_stok)
                    VALUES ('$categori', '$nama', '$harga', '$new_name', '$detail', '$ketersediaan_stok')");

            if ($queryTambah) {
                echo 
                "
                    <script> 
                        alert ('Product Berhasil Di Tambah !!!');
                        document.location.href = 'product';
                    </script>
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Product Add</title>

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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-gray-900 contrast-100">

    <!-- MAIN CONTENT START -->
    <div class="min-h-screen flex items-center justify-center">
        <div
            class="max-w-xl w-full p-6 bg-white rounded-lg shadow-lg">
            <div class="flex justify-end text-xl font-semibold text-red-600"><a href="product"
                    class="hover:text-orange-500"><i class="bi bi-x-lg"></i></a></div>
            <div class="flex justify-center mb-8">
                <h1 class="font-sans text-3xl font-bold text-sky-700"><i class="bi bi-cart3 me-2"></i>Admin <span
                        class="text-sky-500">Panel</span></h1>
            </div>
            <h1 class="text-xl font-semibold text-center text-gray-500 mt- mb-6">Create Your New Product</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nama" class="block mb-2 text-sm text-gray-600">Product Name :</label>
                    <input type="text" id="nama" name="nama" placeholder="Proudct Name"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg  " required>
                </div>

                <div class="mb-4">
                    <label for="categori" class="block mb-2 text-sm text-gray-600">Category :</label>
                    <select id="categori" name="categori"
                        class="border-2 border-gray-300 text-sm text-gray-500 rounded-lg block w-full px-4 py-2"
                        required>
                        <option selected class="bg-gray-500 text-white">Select For Category</option>
                        <?php while ($data = mysqli_fetch_array($queryCategori)) {
                            ?>
                            <option value="<?php echo $data['id']; ?>">
                                <?php echo $data['nama']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="foto" class="block mb-2 text-sm text-gray-600">Image :</label>
                    <input type="file" id="foto" name="foto"
                        class="w-full px-4 py-2 rounded-lg border-2 border-gray-300">
                </div>

                <div class="mb-4">
                    <label for="detail" class="block mb-2 text-sm text-gray-600">Detail :</label>
                    <textarea id="detail" name="detail" rows="4" class="bg-gray-100 block w-full text-md drop-shadow-lg rounded-lg border-2 border-gray-400 
                    focus:ring-orange-500 focus:border-orange-500">
                </textarea>
                </div>

                <div class="mb-4">
                    <labebl for="ketersediaan_stok" class="block mb-2 text-sm text-gray-600">Product Availability Status
                        :</labebl>
                    <select id="ketersediaan_stok" name="ketersediaan_stok"
                        class="border-2 border-gray-300 text-sm rounded-lg text-gray-500 block w-full px-4 py-2">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">habis</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="harga" class="block mb-2 text-sm text-gray-600">Price :</label>
                    <input type="text" id="harga" name="harga" placeholder="Determine The Price"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg " required>
                </div>
                <button type="submit" name="simpan" class="w-full bg-sky-500 text-white py-2 rounded-lg mx-auto block shadow-[5px_5px_5px_#b1b1b1] hover:shadow-none hover:bg-sky-400
                    focus:outline-none  mb-2">Save</button>
            </form>
            <div class="text-center mt-2">
                <p class="text-md"><a href="product" class="text-sky-500 hover:text-sky-400">cancel</a></p>
            </div>
        </div>
    </div>
    <!-- MAIN CONTENT END -->
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var menuButton = document.getElementById('menu-button');
        var sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('lg:block');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<!-- -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#detail'))
        .catch(error => {
            console.error(error);
        });
</script>

</html>