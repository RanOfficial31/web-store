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
    <title>Admin Panel | Category deleted</title>
    
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
<style>
</style>

<body>
    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="modal-id">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white 
            animate__animated animate__bounceIn animate__delay-1s">
            <!--content-->
            <form class="" action="" method="POST">
                <!--body-->
                <div class="text-center p-5 flex-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                        <p class="text-sm text-gray-500 px-8">Are you sure you want to delete the category 
                            <br><span class="text-gray-900 font-semibold">"<?php echo $data['nama']?>"</span></p>
                </div>
                <!--footer-->
                <div class="p-3  mt-2 text-center space-x-4 md:block">
                        <button class="mb-2 md:mb-0  bg-white px-4 py-2 text-sm shadow-[3px_3px_3px_#b1b1b1] font-medium tracking-wider border-2 border-gray-500 text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                            <a href="category">
                                Now
                            </a>
                        </button>
                    <button type="submit" name="deletebtn"
                        class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-[3px_3px_3px_#b1b1b1] font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Yes</button>
                </div>
            </form>
        </div>
    </div>

	<!-- DELETE FITUR -->
    <?php
	if(isset($_POST['deletebtn'])){
        $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE categori_id='$id'");
        $dataCount = mysqli_num_rows($queryCheck);

            if($dataCount>0){
?>
                <script>
					swal({
					title: "sorry",
					text:"Tidak dapat di hapus karena terdapat produk di kategori ini.",
					icon: "warning",
					button: false,
					timer: 3000,
					});
			    </script>
<?php
            die();
            }

		$queryDelete = mysqli_query($con, "DELETE FROM categori WHERE id='$id'");
		    if($queryDelete){
?>
				<script>
					swal({
					title: "success",
					text:"kategori berhasil di hapus",
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
?>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</html>