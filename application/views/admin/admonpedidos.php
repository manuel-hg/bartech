<div class="container">
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID_ Pedido</th>
                <th>Fecha</th>
                <th>Estatus</th>
                <th>Tracking URL</th>
                <th>Tracking Number</th>
                <th>Total</th>
                <th>Costo Guia</th>
                <th>Guia</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $ordenes): ?>
            <tr>
                <td><?php echo $ordenes['id_ordenes'];?></td>
                <td><?php $fecha=$ordenes['fecha'];$separar = (explode(" ",$fecha)); $fecha = $separar[0]; echo $fecha; ?> </td>
                <td><?php echo $ordenes['status'];?></td>
                <td><a href="<?php echo $ordenes['Tracking_url'];?>" target="_blank"><?php echo $ordenes['Tracking_url'];?></a></td>
                <td><?php echo $ordenes['TrackingNumber'];?></td>
                <td>$<?php echo $ordenes['amount'];?></td>
                <td>$<?php echo $ordenes['precio_guia'];?></td>
                <td><?php if($ordenes['status']=='inprocess'){?>
                    <button onclick="generate(<?php echo $ordenes['id_ordenes']?>)" type="button" class="btn" style="background-color:#db4f1f; border-color:none; color:#fff;">Generar guía</button>
                <?php }else{?>
                    <button type="button" class="btn" style="background-color:#db4f1f; border-color:none; color:#fff;"><a style="color:#fff;"target="_blank" href="<?php echo $ordenes['label'];?>  ">Visualizar Guia</a></button>
                <?php }?>
                  </td>
            </tr>         
            <?php endforeach ?>
        </tbody>
    </table>
	</div>
    
</div>
<div class="container">
             
            <div class="col-md-3">
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Estatus</option>
                        <option value="1">Pendiente</option>
                        <option value="2">En proceso</option>
                        <option value="3">Entregado</option>
                    </select>
            </div>   
        </div>        
    </div>
</body>
<script>var baseurl="<?php echo base_url();?>";</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable(
         {     
      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5
       } 
        );
} );

function generate(idcompra) {
    $.post(baseurl+"Cbartech/details_envio",{id_order:idcompra},
    function(data) {
        location.replace(baseurl+"admin_pedidos");
    });
}


</script>
</html>
<style>
    body {
    overflow-x: hidden;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
  }
  
  /* Toggle Styles */
  
  #viewport {
    padding-left: 250px;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
  }
  
  #content {
    width: 100%;
    position: relative;
    margin-right: 0;
  }
  
  /* Sidebar Styles */
  
  #sidebar {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 250px;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #37474F;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
  }
  
  #sidebar header {
    background-color: #263238;
    font-size: 20px;
    line-height: 52px;
    text-align: center;
  }
  
  #sidebar header a {
    color: #fff;
    display: block;
    text-decoration: none;
  }
  
  #sidebar header a:hover {
    color: #fff;
  }
  
  #sidebar .nav{
    
  }
  
  #sidebar .nav a{
    background: none;
    border-bottom: 1px solid #455A64;
    color: #CFD8DC;
    font-size: 14px;
    padding: 16px 24px;
  }
  
  #sidebar .nav a:hover{
    background: none;
    color: #ECEFF1;
  }
  
  #sidebar .nav a i{
    margin-right: 16px;
  }
  .pd5{
      padding-top: 5%;
      padding-bottom: 5%;
  }
  .btnn{
    background-color:#db4f1f; border-color:none; color:#fff;
  }
</style>