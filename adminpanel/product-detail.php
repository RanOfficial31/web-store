<?php
require "session.php";
require "../dbconnection.php";

// GET QUERY 
$id = $_GET['r4n'];
$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_categori FROM produk a JOIN categori b ON a. 
        categori_id=b.id WHERE a.id='$id'");

$data = mysqli_fetch_array($query);
$queryCategori = mysqli_query($con, "SELECT * FROM categori WHERE id != '$data[categori_id]'");

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

// FUNCTION UPDATE
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
    if ($nama == '' || $categori == '' || $harga == '' || $detail == '' || $ketersediaan_stok == '') {
        echo
            "
        <script> 
            alert ('Internal Server Error');
        </script>
        ";
    } else {
        echo
            "
            <script> 
                alert ('Produk Berhasil Di Update');
                document.location.href = 'product';
            </script>
            ";
        $queryUpdate = mysqli_query($con, "UPDATE produk SET Categori_id='$categori', nama='$nama', harga='$harga',
        detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id=$id");
        if ($nama_file != '') {
            if ($image_size > 500000) {
                echo
                    "
                <script> 
                    alert ('Foto Melebihi Dari (500 kb)');
                </script>
                ";
            } else {
                if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
                    echo
                        "
                        <script> 
                            alert ('Foto Harus Berformat JPG, PNG, JPEG');
                        </script>
                        ";
                } else {
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                    $queryUpdate = mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");
                    if ($queryUpdate) {
                        echo
                            "
                            <script> 
                            alert ('Produk Berhasil Di Update');
                            document.location.href = 'product';
                            </script>
                            ";
                    }
                }
            }
        }
    }
}

// FUNCTION DELETE
if (isset($_POST['delete'])) {
    $queryDelete = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");
    if ($queryDelete) {
        echo
            "
        <script> 
            alert ('data berhasil di hapus');
            document.location.href = 'product';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Product detail</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>


<body class="bg-gray-900 contrast-100">

    <!-- MAIN CONTENT START -->
    <div class="min-h-screen flex items-center justify-center">
        <div
            class="max-w-xl w-full p-6 bg-white rounded-lg shadow-lg">
            <div class="flex justify-end text-xl font-semibold text-red-600"><a href="product"
                    class="hover:text-orange-500"><i class="bi bi-x-lg"></i></a></div>
            <h1 class="text-xl font-semibold text-center text-gray-500 mt- mb-6">Update Your Product</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nama" class="block mb-2 text-sm text-gray-600">Product Name :</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>"
                        class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="categori" class="block mb-2 text-sm text-gray-600">Category :</label>
                    <select id="categori" name="categori"
                        class="border-2 border-gray-400 text-sm text-gray-500 rounded-lg block w-full px-4 py-2"
                        required>
                        <option selected class="bg-gray-500 text-white" value="<?php echo $data['categori_id']; ?>">
                            <?php echo $data['nama_categori']; ?>
                        </option>
                        <?php
                        while ($dataCategori = mysqli_fetch_array($queryCategori)) {
                            ?>
                            <option value="<?php echo $dataCategori['id']; ?>">
                                <?php echo $dataCategori['nama']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="foto" class="block mb-2 text-sm text-gray-600">Current Image :</label>
                    <img src="../image/<?php echo $data['foto']; ?>" alt="" width="300px">
                    <input type="file" id="foto" name="foto"
                        class="w-full px-4 py-2 mt-2 rounded-lg border-2 border-gray-400">
                </div>

                <div class="mb-4">
                    <label for="detail" class="block mb-2 text-sm text-gray-600">Detail :</label>
                    <textarea id="detail" name="detail" rows="4" class="bg-gray-100 block w-full text-md drop-shadow-lg rounded-lg border-2 border-gray-400 
                    focus:ring-orange-500 focus:border-orange-500"><?php echo $data['detail']; ?>
                </textarea>
                </div>

                <div class="mb-4">
                    <label for="ketersediaan_stok" class="block mb-2 text-sm text-gray-600">Product Availability Status
                        :</label>
                    <select id="ketersediaan_stok" name="ketersediaan_stok"
                        class="border-2 border-gray-400 text-sm rounded-lg text-gray-500 block w-full px-4 py-2">
                        <option value="<?php echo $data['ketersediaan_stok']; ?>">
                            <?php echo $data['ketersediaan_stok']; ?>
                        </option>
                        <?php
                        if ($data['ketersediaan_stok'] == 'tersedia') {
                            ?>
                            <option value="habis">habis</option>
                            <?php
                        } else {
                            ?>
                            <option value="tersedia">tersedia</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="harga" class="block mb-2 text-sm text-gray-600">Price :</label>
                    <input type="text" id="harga" name="harga" value="<?php echo $data['harga']; ?>"
                        class="w-full px-4 py-2 border-2 border-gray-400 rounded-lg " required>
                </div>
                <button type="submit" name="simpan" class="w-full text-white py-2 rounded-lg mx-auto block shadow-[5px_5px_5px_#b1b1b1] hover:shadow-none bg-green-600
                    focus:outline-none mb-4">Save</button>
                <button type="submit" name="delete" class="w-full text-white py-2 rounded-lg mx-auto block shadow-[5px_5px_5px_#b1b1b1] hover:shadow-none bg-red-600
                    focus:outline-none mb-4"
                    onclick="return confirm('yakin ingin menghapus data ini?');">Delete</button>
            </form>
            <div class="text-center mt-2">
                <p class="text-md"><a href="product" class="text-sky-500 hover:text-sky-400">cancel</a></p>
            </div>
        </div>
    </div>
    <!-- MAIN CONTENT END -->


</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<!--ck editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#detail'))
        .catch(error => {
            console.error(error);
        });
</script>

</html>