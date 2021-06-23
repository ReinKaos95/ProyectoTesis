<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<!-- Bootstrap 5 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="{{ mix('css/generalStyles.css') }}">
		<link rel="stylesheet" href="{{ mix('css/stylesDashboard.css') }}">
	</head>
	<body>
		<header class="header" id="header">
			<!-- boton menu -->
			<div class="header_toggle"><i class='bx bx-menu fas fa-arrow-right' id="header-toggle"></i> </div>
			<!-- input -->
			<div class="input-group ms-5">
				<div class="form-outline">
					<input type="search" placeholder="Buscar..." class="form-control" />
					<button type="button" class="btn bg-button">
					<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
			<!-- fin de input -->
			<div class="header_img "> <img class="rounded-circle" src="#" alt="imagen-header"> </div>
		</header>
		<!-- comienzo navbar -->
		<div class="l-navbar" id="nav-bar">
			<nav class="nav">
				<div>
					<div class="ms-2 mt-3 text-center invisibilidad" id="img-mayor">
						<img src="img/IconoVive.svg" width="90" height="90" alt="Logo">
					</div>
					<div class="mb-3 mt-1 ms-2" id="img-menor">
						<img  src="img/IconoViveR.svg" width="45" height="45" class="logo-image" alt="Logo">
					</div>
					<div class="nav_list mt-5">
						<a href="#" class="nav_link fw-bold">
							<i class='fas fa-user-plus'></i> <span class="nav_name">Registrar Usuarios</span>
						</a>
						<a href="#" class="nav_link fw-bold">
							<i class='fas fa-desktop'></i> <span class="nav_name">Registrar Equipo</span>
						</a>
						<a href="#" class="nav_link fw-bold">
							<i class='fas fa-money-check-alt '></i> <span class="nav_name">Préstamos</span>
						</a>
						<a href="#" class="nav_link fw-bold">
							<i class='fas fa-user-tie'></i> <span class="nav_name">Auditoría</span>
						</a>
						<a href="#" class="nav_link fw-bold">
							<i class='fas fa-hotel'></i> <span class="nav_name">Departamentos</span>
						</a>
					</div>
				</div>
				<div>
					<a href="#" class="nav_link fw-bold">
						<i class=' fas fa-cog' ></i> <span class="nav_name">Configuración</span>
					</a>
					<a href="#" class="nav_link fw-bold">
						<i class='fas fa-question-circle'></i> <span class="nav_name">Ayuda</span>
					</a>
				</div>
			</nav>
		</div>
		<main class="height-100 bg-main  p-5">
			@yield('content')
		</main>
		<script src="{{ mix('js/script.js') }}" defer></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>