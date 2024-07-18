<?php
require "session.php";
require "../dbconnection.php";

$id = $_GET['r4n'];
$query = mysqli_query($con, "SELECT * FROM categori WHERE id='$id'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Category detail</title>
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>
<!-- component -->
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12 ">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto animate__animated animate__bounceInUp animate__delay-1s">
		<div
			class="absolute inset-0 bg-gradient-to-r from-sky-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div>
					<h1 class="text-2xl font-semibold text-center">Do You Want To Change This Category?</h1>
				</div>
				<div class="divide-y divide-gray-200">
                    <form action="" method="POST">
					<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						<div class="relative">
							<input autocomplete="off" id="categori" name="categori" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-400 text-gray-500 text- focus:outline-none focus:borer-rose-600" 
                            value="<?php echo $data['nama']?>" />
							<label for="category" class="absolute left-0 -top-3.5 text-gray-600 text-sm font-semibold peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Category :</label>
						</div>
						<div class="relative">
							<button type="submit" name="editbtn" class="bg-sky-500 text-white rounded-md px-2 py-1 w-full shadow-[4px_4px_5px_#b1b1b1]
                            transition ease-in-out delay-0 hover:-translate-1 hover:scale-110 duration-300 hover:bg-sky-400 hover:shadow-none">
                            Edit</button>
                        </div>
                        <div class="relative">
							<button class="bg-transparent px-2 py-1 w-full">
                                <a href="category" class="text-sky-500 hover:text-sky-400 ">Cancel</a>
                            </button>
                        </div>
					</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if(isset($_POST['editbtn'])) {
    $categori = htmlspecialchars($_POST['categori']);
    if($data['nama']==$categori) {
        ?>
        <meta http-equiv="refresh" content="2; url=category"/>
        <?php
    }
    else{
        $query = mysqli_query($con, "SELECT * FROM categori WHERE nama='$categori'");
        $amountData = mysqli_num_rows($query);
        if($amountData > 0 ) {
?>
            <script>
                swal({
                title: "sorry",
                text:"kategori telah ada",
                icon: "error",
                button: false,
                timer: 3000,
                });
            </script>
<?php
        }
        else{
            $querySave = mysqli_query($con,"UPDATE categori SET nama ='$categori' WHERE id='$id'");
                if($querySave){
?>
                                <script>
                                    swal({
                                    title: "success",
                                    text:"Kategori baru berhasil di buat",
                                    icon: "success",
                                    button: false,
                                    timer: 3000,
                                    });
                                </script>
                                <meta http-equiv="refresh" content="2; url=category"/>
<?php
                            }
                else{
 ?>
                            <script>
                                swal({
                                title: "error",
                                text:"Error Internal Server",
                                icon: "error",
                                button: false,
                                timer: 3000,
                                });
                            </script>
<?php
                            }
        }
    }
}
?>

</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>