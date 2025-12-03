<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Ambiflores-Aguachica</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/drift-zoom/drift-basic.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header position-relative">
    <!-- Top Bar -->
    <div class="top-bar py-2 d-none d-lg-block">
      <div class="container-fluid container-xl">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="d-flex align-items-center">
              <div class="top-bar-item me-4">
                <i class="bi bi-telephone-fill me-2"></i>
                <span>Atención al cliente: </span>
                <a href="tel:+1234567890">+57 312 4871633 </a>
              </div>
              <div class="top-bar-item">
                <i class="bi bi-envelope-fill me-2"></i>
                <a href="mailto:support@example.com">distribuciones.ambiflores@gmail.com</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Main Header -->
    <div class="main-header">
      <div class="container-fluid container-xl">
        <div class="d-flex py-3 align-items-center justify-content-between">

          <!-- Logo -->
          <a href="../index.php" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <img src="../assets/img/logo.jpg" alt="AmbiFlores Logo" style="height: 70px; width: auto; margin-right: 15px;">
            <!--<h1 class="sitename">Ambi<span>Flores</span></h1>-->
          </a>

          <!-- Search -->
          <form class="search-form desktop-search-form">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for products...">
              <button class="btn search-btn" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>

          <!-- Actions -->
          <div class="header-actions d-flex align-items-center justify-content-end">

            <!-- Mobile Search Toggle -->
            <button class="header-action-btn mobile-search-toggle d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false" aria-controls="mobileSearch">
              <i class="bi bi-search"></i>
            </button>

            <!-- Account -->
            <div class="dropdown account-dropdown">
              <button class="header-action-btn" data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
                <span class="action-text d-none d-md-inline-block">Iniciar Sesion</span>
              </button>
              <div class="dropdown-menu">
                <div class="dropdown-header">
                  <h6>Bienvenido <span class="sitename">Ambi Flores</span></h6>
                  <p class="mb-0">Ingresa a tu perfil</p>
                </div>
                
                <div class="dropdown-footer">
                  <a href="cuenta.php" class="btn btn-primary w-100 mb-2">Iniciar Sesion</a>
                  <a href="registro.php" class="btn btn-outline-primary w-100">Registrarse</a>
                </div>
              </div>
            </div>


            <!-- Cart -->

            <!-- Mobile Navigation Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>

          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <div class="header-nav">
      <div class="container-fluid container-xl position-relative">
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php" class="active">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="inventario.php">Inventario</a></li>
            <li><a href="empresa.php">Información sobre la empresa</a></li>
            <li><a href="contacto.php">Contact</a></li>

          </ul>
        </nav>
      </div>
    </div>

    <!-- Announcement Bar -->
    <div class="announcement-bar py-2">
      <div class="container-fluid container-xl">
        <div class="announcement-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "effect": "slide",
              "direction": "vertical"
            }
          </script>
        </div>
      </div>
    </div>

    <!-- Mobile Search Form -->
    <div class="collapse" id="mobileSearch">
      <div class="container">
        <form class="search-form">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products...">
            <button class="btn search-btn" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>

  </header>