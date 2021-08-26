<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<!-- Bootstrap 5 -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href= "{{ asset('css/stylesDashboard.css') }}">
		<!-- Google font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla">
	</head>
	<body id="body-pd">
		<div id="loading">
			<div class="text-center interior">
				<img class="rotate" src="{{asset('img/IconoVive.svg')}}" alt="LogoLoader" width="100" height="100">
				<div class="mt-3">
					<div class="line-charger mx-auto">
						<div class="indeterminate"></div>
					</div>
				</div>
			</div>
		</div>
		<header class="header shadow-lg" id="header">
			<!-- boton menu -->
			<div class="header_toggle"><i class='bx bx-menu fas fa-arrow-right' id="header-toggle"></i> </div>
			<!-- input -->
			<div class="input-group ms-5">
				<div class="form-outline">
					<input type="search" placeholder="Buscar..." class="form-control form-search" />
					<button type="button" class="btn bg-button">
					<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
			<div class="dropdown">
				<a type="button" class="dropdown-toggle nav-enlace" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
					<span class="text-white d-none d-lg-inline me-2 fw-bold">{{Auth::user()->nombre}} {{Auth::user()->apellido}}</span>
					<img class="img-profile rounded-circle"  src="{{asset('img/prueba.jpg')}}" width="32" height="32" alt="user">
				</a>
				<ul class="dropdown-menu shadow-lg" aria-labelledby="dropdownMenuOffset">
					<a class="dropdown-item" href="{{ route('profile.show') }}">
						<i class="fas fa-user fa-sm fa-fw ms-2 text-primary"></i>
						Perfil
					</a>
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							this.closest('form').submit();">
							<i class="fas fa-sign-out-alt fa-sm fa-fw ms-2 text-primary"></i>
							Cerrar Sesión
						</a>
					</form>
				</ul>
			</div>
		</header>
		<!-- comienzo navbar -->
		<div class="l-navbar" id="nav-bar">
			<nav class="nav">
				<div>
					<div class="ms-2 mt-3 text-center invisibilidad" id="img-mayor">
						<img src="{{ asset('/img/IconoVive.svg') }}"width="90" height="90" alt="Logo">
					</div>
					<div class="mb-3 mt-1 ms-2" id="img-menor">
						
						<img src="{{ asset('/img/IconoViveR.svg') }}" width="45" height="45" class="logo-image" alt="Logo">
					</div>
					<div class="nav_list mt-5">
					@if(Auth::User()->us_rol_id==1)
						<a href="{{url('admin/usuarios')}}" class="nav_link fw-bold">
							<i class='fas fa-user-plus'></i> <span class="nav_name">Registrar Usuarios</span>
						</a>
						@endif
						
						<a href="{{url('/equipos')}}" class="nav_link fw-bold">
							<i class='fas fa-desktop'></i> <span class="nav_name">Registrar Equipo</span>
						</a>
				
						<a href="{{url('/prestamos')}}" class="nav_link fw-bold">
							<i class='fas fa-money-check-alt '></i> <span class="nav_name">Préstamos</span>
						</a>
						@if(Auth::User()->us_rol_id==1)
						<a href="{{url('admin/auditoria')}}" class="nav_link fw-bold">
							<i class='fas fa-user-tie'></i> <span class="nav_name">Auditoría</span>
						</a>
						@endif
						@if(Auth::User()->us_rol_id!=3)
						<a href="{{url('admin/departamentos')}}"  class="nav_link fw-bold">
							<i class='fas fa-hotel'></i> <span class="nav_name">Departamentos</span>
						</a>
						@endif
					</div>
				</div>
				<div>
					<a href="{{url('config')}}" class="nav_link fw-bold">
						<i class=' fas fa-cog' ></i> <span class="nav_name">Configuración</span>
					</a>
					<a href="{{url('config/ayuda')}}"  class="nav_link fw-bold">
						<i class='fas fa-question-circle'></i> <span class="nav_name">Ayuda</span>
					</a>
				</div>
			</nav>
		</div>
		<main class="height-100 bg-main p-5">				
			@yield('content')
		</main>
		<script src="{{ asset('js/script.js') }}" defer></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>