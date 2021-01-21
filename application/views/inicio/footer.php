<footer class="bdf">
<div class="col-md-12 text-center pd5">
<img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" width="20%"> 


</div>

<div class="col-md-12 ">
    <div class="container">

        <div class="row">
        <div class="col-md-2">
            <a class="nav-link wf " href="#">Conócenos</a>
        </div>
        <div class="col-md-2">

            <a class="nav-link wf" href="#">Productos</a>
        </div>

        <div class="col-md-3">

            <a class="nav-link wf" href="#">Asistencia Técnica</a>
        </div>

        <div class="col-md-3">

            <a class="nav-link wf" href="#">Preguntas Frecuentes</a>
        </div>

        <div class="col-md-2">

            <a class="nav-link wf" href="#">FAQ</a>
        </div>

        </div>
        </div>

</div>
<div class="col-md-12 text-center pdtb2">
    <div class="row text-center">
    <div class="col-md-4"></div>
    <div class="col-md-4">

    <img src="<?php echo base_url(); ?>assets/img/facebook.png" alt="" width="10%"> 
    <img src="<?php echo base_url(); ?>assets/img/instagram.png" alt="" width="10%"> 
    <img src="<?php echo base_url();?>assets/img/youtube.png" alt="" width="10%">  
    
        </div>
    
        <div class="col-md-4"></div>

 </div>
</div>
<div class="container"></div>
<div class="col-md-12 text-center pdtb2">
<p class="txc"> COPYRIGHT &copy; 2020. BARTEC MÉXICO ELECTRODOMÉSTICOS S.A. DE C.V.<p>
</div>
</footer>

</html>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>



<!--centrado total-->
<!--
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2"></div>
    <div class="col-12 col-md-auto">
      Variable width content
    </div>
    <div class="col col-lg-2"></div>
  </div>
</div>
-->
<!--centrado total-->

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
<form class="text-center border border-light p-5" action="<?php echo base_url();?>Bartech/login" method="post">
  <input type="hidden" name="pagina" value="inicio">
    <img src="<?php echo base_url(); ?>assets/img/logo-redondo.png" class="img-fluid">

    <p class="h4 mb-4">Iniciar sesión</p>

    <!-- Email -->
    <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Correo" >

    <!-- Password -->
    <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Contraseña" >

    <div class="d-flex justify-content-around">
        <!-- <div> -->
            <!-- Remember me --><!--
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Recuerdame</label>
            </div>
        </div>-->
        <div>
            <!-- Forgot password -->
            <a href="">¿Olvidaste contraseña?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btnform btn-block my-4" type="submit">Ingresa</button>

    

    <!-- Social login -->
<!--    <p>o inicia con:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter"></i></a>
</form>
 Default form login -->
        
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
    <form class="text-center border border-light p-5">
        <img src="<?php echo base_url(); ?>assets/img/logo-redondo.png" class="img-fluid">
        <p class="h4 mb-4">Crear cuenta</p>
        <div class="form-row mb-4">
            <div class="col">
                <!-- First name -->
                <input type="text" id="rname_uss" class="form-control" placeholder="Nombre"  >
            </div>
            <div class="col">
                <!-- Last name -->
                <input type="text" id="rlastname_uss"  class="form-control" placeholder="Apellido" >
            </div>
        </div>
        <input type="number" id="rephone" class="form-control mb-4" placeholder="Telefono" >
        <!-- E-mail -->
        <input type="email" id="remail" class="form-control mb-4" placeholder="Correo" >
        <!-- Password -->
        <input type="password" id="rclave" class="form-control" placeholder="Contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock" >
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Al menos 8 caracteres y 1 dígito
        </small>
        

        <!-- Sign up button -->
        
        <p>Haciendo click
            <em>Regístrate</em> estas de acuerdo con nuestros
            <a href="" target="_blank">términos de servicio</a>
            <button type="button" class="btn my-4 btn-block btnform" onclick="register();">Regístrate</button>
    </form>
    <!-- Default form register -->
</div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal registro-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>var baseurl="<?php echo base_url();?>";</script>
<script>
    function register() {
        var name=document.getElementById("rname_uss").value;
        var lastname=document.getElementById("rlastname_uss").value;
        var phone=document.getElementById("rephone").value;
        var mail=document.getElementById("remail").value;
        var password=document.getElementById("rclave").value;
         $.post(baseurl+'Bartech/register_user',
           {name_uss:name,lastname_uss:lastname,email:mail,clave:password,telefono:phone},
           function(data){
            if(data==1){
                swal("Intente nuevamente", "Al parecer este usuario ya esta registrado", "error");
            }else if(data==0){
                swal("Excelente", "Se ha creado la cuenta exitosamente,por favor inicie sesion", "success");
            }
           }
         );
         
         setTimeout(function(){ window.location = "http://localhost/bartech"; }, 3000);

    }
</script>