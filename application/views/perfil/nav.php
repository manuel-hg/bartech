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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        




        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo-redondo.png">
    </head>

      <header>
          <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color justify-content-between navdatos">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url(); ?>assets/img/logo.png" class="img-fluid" alt="" width="55%">
        </a>

        <!-- busqueda 

            <form class="form-inline my-2 my-lg-0 ml-auto">
              <input class="form-control bsearch" type="search" placeholder="¿Te podemos ayudar?" aria-label="Search">
              <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit"><i class="fas fa-search"></i></button>
            </form>-->

            <!-- Links -->
            <ul class="navbar-nav">
              <li class="nav-item active" style="padding-right: 15px;">
                <?php foreach ($nombre as $profile):?>
                  <a href="miperfil" class="text-center text-white nav-link active"><?php echo $profile['nombre']." ".$profile['apellido']; ?></a>
                  <span class="sr-only">(current)</span>                
                <?php endforeach ?>
              </li>
              
              <div class="col-md-1" id="line2" style="height: 15px;"></div>
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url();?>Bartech/logout"><i class="fas fa-sign-out-alt"></i>Salir<span class="sr-only">
                </li>
              
              <div class="col-md-1" id="line2" style="height: 15px;"></div>
                <li class="nav-item active">
                <a class="nav-link" data-toggle="modal" ></a>
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
              </li> -->
            </ul>
            <!-- Links -->

        <!-- Collapsible content -->
  </nav>
      <!--/.Navbar-->

      <!--navbar-->
  <nav class="navbar navbar-expand-lg bgnav">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i
        class="fas fa-bars fa-1x"></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav text-center">
        <li class="nav-item">
          <a class="nav-link" href="inicio">Inicio<span class="sr-only"></span></a>
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
          <a class="nav-link" href="carrito"><i class="fas fa-shopping-cart"></i>Carrito</a>
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
    

<!-- Modal iniciar sesion-->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Default form login -->
<form class="text-center border border-light p-5" action="#!">
    <img src="<?php echo base_url(); ?>assets/img/logo-redondo.png" class="img-fluid">

    <p class="h4 mb-4">Iniciar sesión</p>

    <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Correo">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Contraseña">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Recuerdame</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">¿Olvidaste contraseña?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btnform btn-block my-4" type="submit">Ingresa</button>

    

    <!-- Social login -->
    <p>o inicia con:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter"></i></a>
</form>
<!-- Default form login -->
        
      </div>
    </div>
  </div>
</div>
<!-- Modal iniciar sesion-->




<!-- Modal registro-->
<div class="container text-center">
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="basicExampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
    
    <!-- Default form register -->
    <form class="text-center border border-light p-5" action="#!">
        <img src="<?php echo base_url(); ?>assets/img/logo-redondo.png" class="img-fluid">
        <p class="h4 mb-4">Crear cuenta</p>
        <div class="form-row mb-4">
            <div class="col">
                <!-- First name -->
                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Nombre">
            </div>
            <div class="col">
                <!-- Last name -->
                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Apellido">
            </div>
        </div>
        <!-- E-mail -->
        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Correo">
        <!-- Password -->
        <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Al menos 8 caracteres y 1 dígito
        </small>
        

        <!-- Newsletter -->
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
            <label class="custom-control-label" for="defaultRegisterFormNewsletter">Suscríbete a nuestro boletín</label>
        </div>

        <!-- Sign up button -->
        <button class="btn my-4 btn-block btnform" type="submit">Regístrate</button>

        <!-- Social register -->
        <p>o registrate con:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter"></i></a>

        <hr>

        <!-- Terms of service -->
        <p>Haciendo click
            <em>Regístrate</em> estas de acuerdo con nuestros
            <a href="" target="_blank">términos de servicio</a>
    </form>
    <!-- Default form register -->
</div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal registro-->