<DOCTYPE html>
    <html lang= "en">
    <title>Bartech</title>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!--bootstrap -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/mdb.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo-redondo.png">
    </head>

      <header>
          <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color justify-content-between">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#"><a class="navbar-brand">
            <img src="<?php echo base_url(); ?>assets/img/logo.png" class="img-fluid" alt="" width="55%">
        </a>

        <!-- Collapsible content -->

            <form class="form-inline my-2 my-lg-0 ml-auto">
              <input class="form-control bsearch" type="search" placeholder="¿Te podemos ayudar?" aria-label="Search">
              <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit"><i class="fas fa-search"></i></button>
            </form>

            <!-- Links -->
  <ul class="navbar-nav mr-auto">
              <li class="nav-item active" style="padding-right: 15px;">
                <?php if($nombre==null){ ?>
                <a class="nav-link" href="sesion" data-toggle="modal" data-target="#basicExampleModal"><i class="fas fa-user"></i>Iniciar sesión
                  <span class="sr-only">(current)</span>
                </a>
              <?php }else{?>
                <?php echo $nombre ?>
                  <span class="sr-only">(current)</span>                
                <?php } ?>
              </li>
              
              <div class="col-md-1" id="line2" style="height: 15px;"></div>
                <li class="nav-item active">
                  <?php if($nombre==null){ ?>
                <a class="nav-link" data-toggle="modal" data-target="#basicExampleModal1"><i class="fas fa-user"></i>Registrate<span class="sr-only">(current)</span></a>
                <?php }else{ ?>
                  <a class="nav-link" href="<?php echo base_url();?>Bartech/logout"><i class="fas fa-sign-out-alt"></i>Salir<span class="sr-only">(
                <?php } ?>
                </li>
              <!-- Dropdown -->
              <!--
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Idiomas</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">México-Español</a>
                  <a class="dropdown-item" href="#">EU-English</a>
                </div>
              </li>-->
    </ul>
            <!-- Links -->

        <!-- Collapsible content -->
  </nav>
      <!--/.Navbar-->

      <!--navbar-->
  <nav class="navbar navbar-expand-lg bgnav">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav text-center">
        <li class="nav-item active">
          <a class="nav-link active" href="#">Inicio<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="conocenos">Conócenos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asistencia-tecnica">Asistencia Técnica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="preguntas-frecuentes">Preguntas frecuentes</a>
        </li>
      </ul >
      <ul class="navbar-nav text-center">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>carrito"><i class="fas fa-shopping-cart"></i>Carrito(<?php echo $contador ?>)</a>
        </li>
        <div class="col-md-1" id="line" style="height: 15px;"></div>

        <li class="nav-item">
          <a class="nav-link" href="#">Siguenos en:</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
    