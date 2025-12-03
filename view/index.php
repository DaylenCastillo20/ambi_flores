<?php include 'header.php'; ?>

<main class="main">

    <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
    </div>

     <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../assets/img/product/creolina.jpg" alt="Creolina desinfectante" class="d-block" style="width:50%">
      </div>
      <div class="carousel-item">
        <img src="../assets/img/product/extractoAromatizador.jpg" alt="Chicago" class="d-block" style="width:50%">
      </div>
      <div class="carousel-item">
        <img src="../assets/img/product/jabonLiquido.jpg" alt="New York" class="d-block" style="width:500%"> 
      </div>

     <div class="carousel-item">
        <img src="../assets/img/product/ambitel.jpg" alt="Chicago" class="d-block" style="width:100%">
      </div>

      <div class="carousel-item">
        <img src="../assets/img/product/mechaTrapero.jpg" alt="Chicago" class="d-block" style="width:100%">
      </div>
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Fin del Carousel -->


  
 </main>
<?php include 'footer.php'; ?>