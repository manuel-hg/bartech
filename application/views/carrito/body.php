<div class="">
  <body class="cart-v1 hidden-sn white-skin animated">
    <!--Main Layout-->
    <main>
    <?php if($carrito==null){?>
      <!-- Main Container -->
      <div class="" style="padding: 0">
        <div class="row" style="margin:0">
          <div class="col-md-10" style="padding:0;">
             <section class="section my-5 pb-5">
      <span class="text-center">No hay productos en tu carrito de compras</span>

      <?php 
      }else{?>
        <div class="row" style="margin:0">
          <div class="col-md-12">
        
        <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Producto</th>
                  <th scope="col">Color</th>
                  <th scope="col">Precio</th>
                  <th scope="col">cantidad</th>
                  <th scope="col">subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($carrito as $carrito ) {
                  ?>
                  <tr>
                    <td class="text-center">
                      <img width="20%" src="<?php echo $carrito['img_principal'];?> " alt="" class="img-fluid">
                    </td>
                    <td><?php echo $carrito['nombre_categoria']." ".$carrito['nombre_modelo']." "?></td>
                    <td> <?php echo $carrito['color']; ?></td>
                    <td>$<?php echo number_format($carrito['precio'],2)?> MXN</td>
                    <td class="text-center text-md-left">
                      <?php  echo $carrito['quantity'] ?>
                  </td>
                    <td>$<?php $total=number_format($carrito['precio']*$carrito['quantity'],2); echo $total." MXN";?></td>
                    <td>
                      <button onclick="more(<?php echo $carrito['id_detalle_carrito']?>)" type="button" class="btn btn-sm">+</button>
                      <button onclick="less(<?php echo $carrito['id_detalle_carrito']?>)" type="button" class="btn btn-sm">-</button>
                      <button onclick="rev(<?php echo $carrito['id_detalle_carrito']?>)" type="button" class="btn btn-sm">X</button>
                    </td>
                  </tr>
                  <?php 
                  } ?>
              </tbody>
            </table>  
        </div> 
        </div>
      </div>     
          <!-- Shopping Cart table -->
        </section>
          </div>
          <?php foreach ($car as $clave) {$datos=$clave;}?>
          <input type="hidden" id="car" value="<?php echo $datos['id_carrito'];?>">
          <div class="col-md-2 text-center" style="padding:0;">
          <div class="row text-center" style="margin: 0">
              <div class="col-md-12" style="padding:0;">
                <form action="#">
                <div class="py-3">
                  <h5 class="font-weight-bold text-center">RESUMEN DE COMPRA</h5>
                </div>  
                <div class="row text-center" style="margin: 0">
                  <div class="col-md-6 text-center">
                    <h6>Subtotal: </h6>
                  </div>
                  <div class="col-md-6 text-center">
                    <h6 class="text-center">$<?php echo $datos['total'];?></h6>
                  </div>
                </div>
                <div class="row text-center" style="margin: 0">
                  <div class="col-md-6 text-center">
                    <h6 class="font-weight-bold">Total: </h6>
                  </div>
                  <div class="col-md-6 text-center">
                    <h6 class="text-center font-weight-bold">$<?php echo $datos['total']; ?></h6>
                  </div>
                </div>
                <a href="<?php echo base_url();?>direccion">
                          <button type="button" class="btn btn-primary">CONTINUAR COMPRA</button>
                        </a>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
       <?php } ?>
      <!-- /Main Container -->
    </main>
  </body>
</div>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>


  function rev(iddetalle) {
  Swal.fire({
  title: '¿Estas seguro de eliminar este producto?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#db4f1f',
  confirmButtonText: 'Confirmar'
}).then((result) => {
  if (result.isConfirmed) {
   $.post(baseurl+"Cbartech/delete_carrito",{
    iddetalle:iddetalle},
   function(data){
    location.replace(baseurl+"carrito");
    });
  }
})
  }
  function more(idproduct) {
    var carrito=document.getElementById("car");
    $.post(baseurl+"Cbartech/addone",{
      idproduct:idproduct,car:carrito.value},
      function(data) {        
        if(data==0){
          swal("Cuidado", "Solo tenemos esta cantidad en stock", "info");
          //location.replace(baseurl+"carrito-de-compra");
        }else{
          location.replace(baseurl+"carrito");
        }
      }
    );
  }
  function less(idproduct) {
    var carrito=document.getElementById("car");
    $.post(baseurl+"Cbartech/lessone",{
      idproduct:idproduct,car:carrito.value},
      function(data) {
        location.replace(baseurl+"carrito");
      }
    );
  }
  
</script>