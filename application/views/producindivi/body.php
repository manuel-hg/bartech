<style>
  body { padding-right: 0 !important }
</style>
<?php echo $this->session->flashdata('add-product');foreach ($producto as $producto) { ?>
<body>
  
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">
      

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center mb-4">

        <img width="50%" src="<?php echo $producto['img_principal'];?>" class="img-fluid" alt="" alt="First slide">
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">
          <!--Content-->
          <div class="p-4">
            <p class="lead">
              <span class="mr-1">
              </span>
            </p>
            <p class="lead tltprod"><?php echo $producto['nombre_categoria']." ".$producto['nombre_modelo']." ".$producto['color'];?></p>
            <p>500 watts de poder, vaso de vidrio de 1.5 l, 2 veolcidades con función de pulso, trirura hielo, base de acero inoxidable, cuchilla de 6 navajas.</p>
            <span class="tltprod">$<?php echo $producto['precio']; ?></span>
            <form class="d-flex justify-content-left" method="post"  action="<?php echo base_url();?>Cbartech/add_cart">
              <!-- Default input -->
              <div>
                <div class="row">
                  <div class="col-md-12">
                  <p>Cantidad:</p>
                  <?php foreach ($detalle as $detalle){?>
                  <input type="hidden" name="id_p" value="<?php echo $detalle['id_producto'];?>">
                  <?php } ?>
                  <?php foreach ($inventario as $inventario) {?>
                  <input name="quantity" type="number" value="1" min="1" max="<?php echo $inventario['cantidad']?>" aria-label="Search" class="form-control" style="width: 100px">
                  <?php } ?>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <br>
                    <p>Color: <?php echo $producto['color']?></p>
                  </div>
                </div>
              
              <div class="row">
              <button  id="addpr_" class="btn btn-primary btn-sm my-0 p">Agregar al carrito<i class="fas fa-shopping-cart ml-1"></i>
              </button>
            </form>
            <form class="d-flex justify-content-left" action="<?php echo base_url();?>Cbartech/add_cart2" method="post" style="margin-bottom: 0;">
              <input type="hidden" name="id_pr" value="<?php echo $detalle['id_producto'];?>">
              <button type="submit" style="margin:0;" class="btn btn-primary btn-md my-0 p">Comprar  <i class="fas fa-arrow-circle-right"></i></button>
              </form>
              </div>              
          </div>
          </div>
          <!--Content-->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
  </main>
  <?php } ?>
  <!--Main layout-->
<div class="container pdtb5">
  <ul class="nav nav-tabs nav-justified md-tabs white" id="myTabJust" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
        aria-selected="true">Descripción</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
        aria-selected="false">Información Adicional</a>
    </li>
  </ul>
  <div class="tab-content card pt-5" id="myTabContentJust">
    <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
      <div class="container pdtb5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?php echo $detalle["img_1"];?>" class="img-fluid" alt="Responsive image">
          </div>
          <div class="col-md-2 text-center">
            <img width="100%" class="minibd" src="<?php echo $detalle["img_2"];?>" class="img-fluid" alt="Responsive image">
            <img width="100%"  class="minibd" src="<?php echo $detalle["img_1"];?>" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="font-weight-bold h2title"><?php echo $producto['nombre_categoria']." ".$producto['nombre_modelo']." ".$producto['color'];?></h2>
            <p class="text-justify"><?php echo $producto['descripcion']; ?>
                </p>
            <p class="text-justify">Todas estas características contribuyen a reducir tiempos de preparación,
            permitiendo tener más tiempo para compartir con sus seres queridos.</p> 
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
      <div class="container pdtb5">
        <div class="row">
          <div class="col-md-12 text-center infoadic">
            <p>CARACTERISTICAS</p></div>
          </div>
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Categoria</p></div>
          <div class="col-md-9 infotable"><p><?php echo $producto['nombre_categoria'];?></p></div>
        </div>  
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Modelo</p></div>
          <div class="col-md-9 infotable"><p><?php echo $producto['nombre_modelo'];?></p></div>
        </div>
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Potencia</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Poder'];?></p></div>
        </div>
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Frecuencia</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Frecuencia'];?></p></div>
        </div>
         <div class="row">
          <div class="col-md-3 infotable spandes"><p>Voltaje</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Voltaje'];?></p></div>
        </div>
         <div class="row">
          <div class="col-md-3 infotable spandes"><p>Peso</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Peso'];?></p></div>
        </div>
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Materiales</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Materiales'];?></p></div>
        </div>
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Accesorios</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Accesorios'];?></p></div>
        </div>
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Capacidad</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Capacidad'];?></p></div>
        </div>
         <div class="row">
          <div class="col-md-3 infotable spandes"><p>Velocidades</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Velocidades'];?></p></div>
        </div>
        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Pulsos</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Pulsos'];?></p></div>
        </div>
         <div class="row">
          <div class="col-md-3 infotable spandes"><p>Cuchillas</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Cuchillas'];?></p></div>
        </div>
         <div class="row">
          <div class="col-md-3 infotable spandes"><p>Personalizacion</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Personalizacion'];?></p></div>
        </div>

        <div class="row">
          <div class="col-md-3 infotable spandes"><p>Dimensiones</p></div>
          <div class="col-md-9 infotable"><p><?php echo $detalle['Largo']."cm"."\t/".$detalle['Ancho']."cm"."\t/".$detalle['Alto']."cm";?></p></div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<div class="container pdtb5">
  <h2 class="h2title text-center">Productos que podrían gustarte </h2>
<!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-4 col-md-4 mb-4">

          <img src="<?php echo base_url(); ?>assets/img/licuadora2.jpeg" class="img-fluid" alt="" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-4 mb-4">

          <img src="<?php echo base_url(); ?>assets/img/horno.jpeg" class="img-fluid" alt="" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-4 mb-4">

          <img src="<?php echo base_url(); ?>assets/img/extractor.jpeg" class="img-fluid" alt="" alt="">

        </div>
        <!--Grid column-->
      </div>
<!--Grid row-->
</div>

</body>
<script>var baseurl="<?php echo base_url();?>";
function mod() {
      $('#exampleModalCenter').modal('toggle');
}

</script>


<div class="modal fade" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo base_url(); ?>assets/img/logo-redondo.png">  
        <h5>¡TU PRODUCTO SE AGREGO CON EXITO <br> A TU CARRITO DE COMPRAS!</h5>
      </div>
      <div class="modal-footer">
        <a  type="button" class="btn btn-primary" href="<?php echo base_url();?>carrito">Ir a mi carrito</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="mod()">Seguir comprando</button>
      </div>

    </div>
  </div>
</div>
