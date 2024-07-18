<?php
require "session.php";
require "../dbconnection.php";

$queryCategori = mysqli_query($con, "SELECT * FROM categori");
$numberOfCategori = mysqli_num_rows($queryCategori);
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel | Category</title>

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
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<!-- POPUP LINK -->
	<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- DATA TABLES LINK -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

</head>

<body class="bg-gray-200 l:flex">
	<!-- MAIN NAVBAR START -->
	<nav class="bg-white border-b border-gray-300 sticky top-0 z-40 shadow-[3px_3px_5px_#b1b1b1]">
		<div class="flex justify-between items-center px-9">
			<!-- Ícono de Menú -->
			<button id="menu-button" class="lg:hidden">
				<i class="fas fa-bars text-sky-500 text-lg"></i>
			</button>
			<!-- Logo -->
			<div class="ml-1 text-center my-3 flex">
				<h1 class="font-sans text-3xl font-bold text-sky-700"><i class="bi bi-cart3 me-2"></i>Admin <span
						class="text-sky-500">Panel</span></h1>
			</div>

			<!-- Ícono de Notificación y Perfil -->
			<div class="space-x-4">
				<!-- Botón de Perfil -->
				<a href="logout"
					class="px-3 py-1.5 bg-sky-700 text-white flex items-center justify-center text-sm font-semibold rounded-md">
					Logout
				</a>
			</div>
		</div>
	</nav>

	<!-- Barra lateral -->
	<div id="sidebar" 
		class="lg:block hidden bg-white w-64 h-screen fixed rounded-none border-none fixed shadow-[3px_3px_5px_#b1b1b1] z-40">
		<!-- Items -->
		<div class="p-4 space-y-4">
			<a href="/web-store/adminpanel/" aria-label="dashboard"
				class="relative px-4 py-3 flex items-center space-x-4 text-gray-500 font-semibold text-lg
				hover:border-r-[6px] border-sky-500 <?= $page == "index.php" ? 'border-r-[6px] border-sky-500 text-sky-500' : ''; ?> transition ease-in-out delay-0 hover:-translate-x-1 hover:scale-100 duration-300">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					class="bi bi-speedometer2 font-semibold" viewBox="0 0 16 16">
					<path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 
						.707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 
						.5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 
						1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 
						1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
					<path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 
						8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 
						7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 
						1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
				</svg>
				<span class="-mr-1 font-medium">Dashboard</span>
			</a>
			<a href="category" aria-label="dashboard"
				class="relative px-4 py-3 flex items-center space-x-4 text-gray-500 font-semibold text-lg
				hover:border-r-[6px] hover:text-sky-500 border-sky-500 transition ease-in-out delay-0 hover:-translate-x-1 hover:scale-100 duration-300">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					class="bi bi-tags font-semibold" viewBox="0 0 16 16">
					<path
						d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z" />
					<path
						d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z" />
				</svg>
				<span class="-mr-1 font-medium">Category</span>
			</a>
			<a href="product" aria-label="dashboard"
				class="relative px-4 py-3 flex items-center space-x-4 text-gray-500 font-semibold text-lg
				hover:border-r-[6px] hover:text-sky-500 border-sky-500 transition ease-in-out delay-0 hover:-translate-x-1 hover:scale-100 duration-300">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					class="bi bi-basket font-semibold" viewBox="0 0 16 16">
					<path
						d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
				</svg>
				<span class="-mr-1 font-medium">Product</span>
			</a>
			<a href="/web-store/" aria-label="dashboard"
				class="relative px-4 py-3 flex items-center space-x-4 text-gray-500 font-semibold text-lg
				hover:border-r-[6px] hover:text-sky-500 border-sky-500 transition ease-in-out delay-0 hover:-translate-x-1 hover:scale-100 duration-300">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
					class="bi bi-eye font-semibold" viewBox="0 0 16 16">
					<path
						d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
					<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
				</svg>
				<span class="-mr-1 font-medium">View Web</span>
			</a>

		</div>
	</div>
	<!-- MAIN NAVBAR END -->

	<!-- MAIN CONTENT START -->
	<div class="l:w-full lg:ml-64 px-6 py-8">
		<div>
			<h1 class="sm:text-4xl text-3xl font-medium  mb-2 text-gray-900">
				Category
			</h1>
			<div class="h-1 w-32 bg-sky-500 rounded"></div>
		</div>


		<!-- Main input -->
		<main class="py-10">
			<div class="container mx-auto">
				<form action="" method="POST">
					<div class="mb-4 flex items-center">
						<input type="text" name="categori" id="categori" class="form-control w-full rounded-lg border border-gray-400 p-2
						shadow-[3px_3px_5px_#b1b1b1]" placeholder="Add New Category" required />
						<button type="submit" name="save" class=" bg-sky-500 hover:bg-sky-400 ml-2 rounded-lg p-2 text-white  border-none
						shadow-[5px_5px_5px_#b1b1b1] hover:shadow-xl">Create</button>
					</div>
				</form>
			</div>
		</main>
		<?php if (isset($_POST['save'])) {
			$categori = htmlspecialchars($_POST['categori']);
			$queryCategori = mysqli_query($con, "SELECT nama FROM categori WHERE nama='$categori'");
			$categoriData = mysqli_num_rows($queryCategori);

			if ($categoriData > 0) {
				?>
				<script>
					swal({
						title: "warning",
						text: "Category Now Available",
						icon: "warning",
						button: false,
						timer: 1000,
					});

				</script>
				<meta http-equiv="refresh" content="0; url=category.php" />
				<?php
			} else {
				$querySave = mysqli_query($con, "INSERT INTO categori (nama) VALUES ('$categori')");
				if ($querySave) {
					?>
					<script>
						swal({
							title: "success",
							text: "Category Saved Successfully",
							icon: "success",
							button: false,
							timer: 3000,
						});
						document.location.href = 'category.php';
					</script>
					<?php
				} else {
					?>
					<script>
						swal({
							title: "error",
							text: "Error Internal Server",
							icon: "error",
							button: false,
							timer: 3000,
						});
					</script>
					<?php
				}
			}
		}
		?>
		<div class="bg-gray-100 drop-shadow-xl">
			<div class="p-2 my-4 table-responsive-xl">
				<table id="data" class="table table-striped table-hover table-xl text-center ">
					<thead class="table-light border-b-2">
						<tr>
							<th class="w-24 text-center">No.</th>
							<th class="text-center">Name Category</th>
							<th class="w-48 text-center">Action</th>
						</tr>
					</thead />
					<tbody>
						<?php
						$number = 1;
						while ($data = mysqli_fetch_array($queryCategori)) {
							if ($numberOfCategori == 0) {
								?>
								<tr>
									No Data in Category
								</tr>
								<?php
							} else {
								?>
								<tr>
									<td>
										<?php echo $number; ?>
									</td>
									<td>
										<?php echo $data['nama']; ?>
									</td>
									<td>
										<a class="btn text-white bg-green-600 hover:bg-green-400 shadow-[3px_3px_3px_#b1b1b1] m-1 transition ease-in-out delay-0 hover:-translate-1 hover:scale-110 duration-300"
											href="category-detail?r4n=<?php echo $data['id']; ?>">
											<i class="bi bi-pencil-square"></i></a>
										<a class="btn text-white bg-red-600 hover:bg-red-400 shadow-[3px_3px_3px_#b1b1b1] m-1 transition ease-in-out delay-0 hover:-translate-1 hover:scale-110 duration-300"
											href="category-deleted?r4n=<?php echo $data['id']; ?>">
											<i class="bi bi-trash3"></i></a>
									</td>
								</tr>
								<?php
							}
							$number++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<p class="mx-auto mt-8 text-gray-600 text-center lg:max-w-2xl lg:mb-6 md:px-16">
			© 2024 Copyright | Web Store.com
		</p>
	</div>
	<!-- MAIN CONTENT END -->

</body>

<script type="text/javascript">
	new DataTable('#data');
</script>

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

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
	AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
	crossorigin="anonymous"></script>
<!-- PUPUP LINK -->
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

</html>