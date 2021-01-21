<body>
   <div>
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/banner-productos.png" class="img-fluid">
   </div>
   <div class="container pdtb3">
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-2">
         	<?php foreach ($profile as $profile):?>
         		<?php if($profile['img']==""){?>
         			 <div class="row">
                    <div class="col-md-12 text-center">
                       <form action="Cbartech/upload_image" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <span class="pMSpan1">Sube tu foto de perfil</span>
                                <input type="hidden" name="usuario" value="<?php echo $profile['nombre'];?>">
                                <input name="archivo[]" type="file" class="form-control-file" accept="image/*" >
                            </div>
                            <button class="btn btn-primary btn-md my-0 p" type="submit">Subir</button>
                        </form>
                        </div>
                    </div>
                     <?php }else{?>
            <img width="100%" class="userpic" src="<?php echo $profile['img'];?>" alt="Perfil Imagen" data-toggle="tooltip" data-placement="right" title="Da click para modificar tu imagen" onclick="modimagen();">
             <div id="modificar"></div>
                    <?php }?>
         </div>
         <div class="col-md-7">
            <h5 class="font-weight-bold"><?php echo $profile['nombre']." ".$profile['apellido']; ?></h5>
            <div>
            	<?php if($profile['direccion']==""){?>
            		<a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><p>Agregar direccion</p></a>
            	<?php }else{?>
            		<p>Dirección:<?php echo $profile['direccion']." interior ".$profile['no_int']." exterior ".$profile['no_ext']." colonia ".$profile['colonia']."<br> Municipio: ".$profile['municipio']." Estado:".$profile['estado']?>
            	 <a class="nav-link" id="pills-envio-tab" data-toggle="pill" href="#pills-envio" role="tab" aria-controls="pills-envio">Modificar direccion</a>
                <?php }?>  
               <p>Correo:<span><?php echo $profile['username']; ?></span></p>   
               <a href="<?php echo base_url();?>productos" class="btn btn-primary btn-md my-0 p">Comprar <i class="fas fa-arrow-circle-right"></i></a>            
            </div>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url();?>Bartech/logout">Cerrar sesión</a>
         </div>
         <?php endforeach ?>
      </div>
   </div>


   

   <!--DATOS DE USUARIO-->
   <div class="container text-center justify-center z-depth-3 pddatos">
      <ul class="nav md-pills nav-justified bgphills" id="pills-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link txw  active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
               aria-controls="pills-home" aria-selected="true">Compras</a>
         </li>
         <!--
         <li class="nav-item">
            <a class="nav-link txw" id="pills-cupones-tab" data-toggle="pill" href="#pills-cupones" role="tab"
               aria-controls="pills-cupones" aria-selected="false">Mis cupones</a>
         </li>-->
         <li class="nav-item">
            <a class="nav-link txw" id="pills-personal-tab" data-toggle="pill" href="#pills-personal" role="tab"
               aria-controls="pills-personal" aria-selected="false">Datos personales</a>
         </li>
         <li class="nav-item">
            <a class="nav-link txw" id="pills-envio-tab" data-toggle="pill" href="#pills-envio" role="tab"
               aria-controls="pills-envio" aria-selected="false">Direcciones de envío</a>
         </li>
         <!--
         <li class="nav-item">
            <a class="nav-link txw" id="pills-factura-tab" data-toggle="pill" href="#pills-factura" role="tab"
               aria-controls="pills-factura" aria-selected="false">Direcciones de facturación</a>
         </li>-->
      </ul>

      <div class="tab-content pt-2 pl-1" id="pills-tabContent">
<!--Datos de Inicio-->
         <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container pdtb5">
            	<div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="background-color: #1a365e; color:#fff;">
                <p> Id pedido</p>
                </div>
                <div class="col-md-2" style="background-color: #1a365e; color:#fff;">
                <p>Fecha </p>
                </div>
                <div class="col-md-2" style="background-color: #1a365e; color:#fff;">
                <p>Estatus </p>
                </div>
                <div class="col-md-2" style="background-color: #1a365e; color:#fff;">
                <p>Total</p>
                </div>
                <div class="col-md-2" style="background-color: #1a365e; color:#fff;">
                <p>Tracking</p>
                </div>
                <div class="col-md-2" style="background-color: #1a365e; color:#fff;">
                <p>Detalles</p> 
                </div>  

                <?php foreach ($ordenes as $ordenes): ?>
                <div class="col-md-2">
                <p><?php echo $ordenes['id_ordenes'];?></p>
                </div>
                <div class="col-md-2">
                <p><?php $fecha=$ordenes['fecha'];$separar = (explode(" ",$fecha)); $fecha = $separar[0]; echo $fecha; ?> </p>
                </div>
                <div class="col-md-2">
                <p><?php echo $ordenes['status'];?></p>
                </div>
                <div class="col-md-2">
                <p><?php echo $ordenes['amount'];?></p>
                </div>
                <div class="col-md-2">
                    <?php if($ordenes['Tracking_url']!="'\\'inprocess\\''"){?>
                <a target="_blank" href="<?php echo $ordenes['Tracking_url'];?>">Rastrear</a>
                <?php }else{?>
                    <p>Inprocess</p>
                    <?php } ?>
                </div>
                <div class="col-md-2">
                <a href="#"><p data-toggle="collapse" onclick='det(<?php echo $ordenes['id_ordenes'];?>)' role="button" aria-expanded="false" aria-controls="collapseExample"> Detalles </p> </a>
                </div>
                <?php endforeach ?>              
            </div>
            <div class="col-md-12 invisible" id="det_tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover  table-borderless">
                              <thead class="htproductos">
                                <tr>
                                  <th></th>
                                  <th>Descripción </th>
                                  <th>Precio Unitario</th>
                                  <th>Cantidad</th>
                                  <th>SubTotal</th>
                                </tr>
                              </thead>
                              <tbody id="most_det">
                              </tbody>
                            </table>
                        </div>
                    </div>
            </div>

            </div>




        </div>






<!-- 
               <h5 class="font-weight-bold">Aún no tienes pedidos realizados</h5>
               <p class="txn">Vuelve a lo tradicional y comienza a transformar <span class="txn"> tus espacios con los mejores productos, al mejor precio.</span></p>
               <p class="txn">tus espacios con los mejores productos, al mejor precio.</p> -->
            </div>
         </div>
<!--Datos de cupones-->
         <div class="tab-pane fade" id="pills-cupones" role="tabpanel" aria-labelledby="pills-cupones-tab">
            <div class="pdtb5">
               <p class="font-weight-bold">Aquí puedes ingresas tus códigos de promoción y cupones para tu siguiente compra</p>
               <input type="text" name="cupon">
               <button class="btn btn-primary btn-md my-0 p" type="submit">ingresar cupón   <i class="fas fa-arrow-circle-right"></i></button>
            </div>
         </div>
<!--Datos de personales-->
         <div class="tab-pane fade" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
            <p class="font-weight-bold txn text-left">Direcciones de cuenta</p>
               <p class="font-weight-bold text-left">Para mejorar tu experiencia de compra agrega y edita tus datos personales</p>
                 
                  <div class="container bgdireccion">
                    <form method="post" action="<?php echo base_url();?>bartech/update">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="input-group-prepend pdtb3">
                                    <div class="input-group-text bglabel">
                                    <input type="hidden" name="col_id" value="<?php echo $profile['id_usuario_web'];?>">
                                    <label for="" class="font-weight-bold">Nombre: </label>
                                    </div>
                                    <input type="text" class="form-control" name="nombre" id="namec" value="<?php echo $profile['nombre'];?>" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="input-group-prepend pdtb3">
                                    <div class="input-group-text bglabel">
                                    <label for="" class="font-weight-bold">Apellido: </label>
                                    </div>
                                    <input type="text" name="apellido" value="<?php echo $profile['apellido'];?>" class="form-control" id="apellido" required>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="input-group-prepend pdtb3">
                                    <div class="input-group-text bglabel">
                                    <label for="" class="font-weight-bold">Correo: </label>
                                    </div>
                                    <input type="text" name="email" value="<?php echo $profile['username'];?>" class="form-control" id="mail" readonly>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="input-group-prepend pdtb3">
                                    <div class="input-group-text bglabel">
                                    <label for="" class="font-weight-bold">Telefono: </label>
                                    </div>
                                    <input type="number" name="telefono" value="<?php echo $profile['telefono'];?>" class="form-control" id="telefono" required>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group text-center">
                                <a data-toggle="collapse" href="#collapsepassword" role="button" aria-expanded="false" aria-controls="collapseExample">Cambiar contraseña</a>
                                <div class="collapse" id="collapsepassword">
                                   <label for="inputPassword5">Password</label>
                                   <input type="password" name="passwr" id="password" class="form-control" aria-describedby="passwordHelpBlock">
                                   <button id="pw" class="btn" type="button" onclick="mostrarContrasena()"></button>
                                   <small id="passwordHelpBlock" class="form-text">
                                   Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emoji.
                                   </small>
                                </div>
                            </div>
                          </div>
                           <div class="col-md-6">
                              <div class="input-group-prepend pdtb3">
                                    <div class="input-group-text bglabel">
                                       <button class="btn btn-primary btn-md my-0 p" type="submit">Actualizar datos</button>
                                    </div>
                              </div>
                           </div>
                        </div>
                   </div>
                 </form>
         </div>
<!--Datos de envio-->
         <div class="tab-pane fade" id="pills-envio" role="tabpanel" aria-labelledby="pills-envio-tab">
         	<p class="font-weight-bold txn text-left">Direcciones de envío</p>
            	<p class="font-weight-bold text-left">La dirección de envío seleccionada se utilizará como referente de entrega</p>
              <p class="font-weight-bold text-left">Para actualizar toda la direccion ingresa primero tu CP*</p>

                <form action="<?php echo base_url();?>bartech/update_direccion" method="post">
	               <div class="container bgdireccion">
		               	<div class="row">
                           <div class="col-md-3">
                            <input type="hidden" name="col_md_id" value="<?php echo $profile['id_usuario_web'];?>">
                              <div class="input-group-prepend pdtb3">
                                 <div class="input-group-text bglabel">
                                    <label for="" class="font-weight-bold">C.P: </label>
                                 </div>
                                 <input maxlength="5" onblur="gdireccion();" type="number" id="cp" name="cp" class="form-control" value="<?php echo $profile['cp'];?>">
                              </div>
                           </div>
                           <div class="col-md-3">
                        <div class="input-group-prepend pdtb3">
                                <div class="input-group-text bglabel">
                                  <label for="" class="font-weight-bold">Calle: </label>
                                </div>
                                <input type="text" class="form-control" name="calle" value="<?php echo $profile['direccion'];?>">
                            </div>
                      </div>
                           <div class="col-md-3">
                          <div class="input-group-prepend pdtb3">
                                  <div class="input-group-text bglabel">
                                    <label for="" class="font-weight-bold">No. Exterior: </label>
                                  </div>
                                  <input type="text" class="form-control" name="no_ext" value="<?php echo $profile['no_ext'];?>">
                              </div>
                        </div>
                        <div class="col-md-3">
                        <div class="input-group-prepend pdtb3">
                                <div class="input-group-text bglabel">
                                  <label for="" class="font-weight-bold">No. Interior: </label>
                                </div>
                                <input type="text" class="form-control" name="no_int" value="<?php echo $profile['no_int'];?>">
                            </div>
                      </div>
                        </div>
		               	<div class="row">
		               		<div class="col-md-6">
                        <div class="input-group-prepend pdtb3">
                                <div class="input-group-text bglabel">
                                  <label for="" class="font-weight-bold">Colonia: </label>
                                </div>
                                <select style="height: 70%;" name="colonia" class="form-control rounded-0 binput" id="colonia" readonly>
                                   <option><?php echo $profile['colonia'];?></option>
                                </select>
                            </div>


                         <div class="form-group">
                            
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group-prepend pdtb3">
                                <div class="input-group-text bglabel">
                                  <label for="" class="font-weight-bold">Municipio/Alcaldía: </label>
                                </div>
                                <div class="col-md-8" id="municipio">
                                  <input type="text" name="municipio" class="form-control" value="<?php echo $profile['municipio'];?>">  
                                </div>
                                
                            </div>
                      </div>
		               	</div>
		               	<div class="row">
		               		<div class="col-md-6">
		               			<div class="input-group-prepend pdtb3">
	                           		<div class="input-group-text bglabel">
	                            		<label for="" class="font-weight-bold">Estado: </label>
	                           		</div>
                                <div class="col-md-10" id="estado">
                                  <input type="text" name="estado" class="form-control" value="<?php echo $profile['estado'];?>">    
                                  </div>
                           			
                        		</div>
		               		</div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group-prepend pdtb3">
                                <div class="input-group-text bglabel">
                                  <label for="" class="font-weight-bold">Entre calles: </label>
                                </div>
                                <input type="text" class="form-control" name="entrecalles" value="<?php echo $profile['entrecalles'];?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-group-prepend pdtb3">
                                <div class="input-group-text bglabel">
                                  <label for="" class="font-weight-bold">Informacion Adicional o referencias: </label>
                                </div>
                                <input type="text" class="form-control" name="info_adicional" value="<?php echo $profile['info_adicional'];?>">
                            </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                           <button class="btn btn-primary btn-md my-0 p" type="submit">Actualizar datos</button>
                        </div>
                      </div>
                    </div>
                  </form>
         </div>
<!--Datos de facturacion-->
         <div class="tab-pane fade" id="pills-factura" role="tabpanel" aria-labelledby="pills-factura-tab">
         	<p class="font-weight-bold txn text-left">Direcciones de facturación</p>
            	<p class="font-weight-bold text-left">Información de facturación (Si desea factura)</p>
            <div class="container bgdireccion">
            	
            	<div class="row">
            		
            		<div class="col-md-4">
            			<div class="input-group-prepend pdtb3">
	                    	<div class="input-group-text bglabel">
	                       		<label for="" class="font-weight-bold">RFC: </label>
	                        </div>
                           	<input type="text" class="form-control" placeholder="BTTO9600676879CCJHK">
                        </div>
            		</div>
                  <div class="col-md-4"></div>
            		<div class="col-md-4"></div>
            	</div>
            	<div class="row">
            		<div class="col-md-4">
            			<div class="input-group-prepend pdtb3">
	                    	<div class="input-group-text bglabel">
	                       		<label for="" class="font-weight-bold">Facturar a: </label>
	                        </div>
                           	<input type="text" class="form-control" placeholder="Empresa S.A. de C.V.">
                        </div>
            		</div>
            		<div class="col-md-8">
            			<div class="input-group-prepend pdtb3">
	                    	<div class="input-group-text bglabel">
	                       		<label for="" class="font-weight-bold">Dirección de la empresa: </label>
	                        </div>
                           	<input type="text" class="form-control" placeholder="950 Hillcrest Drive Tukwila, WA 98168 950 Hillcrest Drive Tukwila, WA 98">
                        </div>
            		</div>
            		
            	</div>
            	<div class="row">
            		<div class="col-md-4">
            			<div class="input-group-prepend pdtb3">
	                    	<div class="input-group-text bglabel">
	                       		<label for="" class="font-weight-bold">Correo: </label>
	                        </div>
                           	<input type="text" class="form-control" placeholder="empresa@empresa.com">
                        </div>
            		</div>
            		<div class="col-md-8">
            			<div class="input-group-prepend pdtb3">
	                    	<div class="input-group-text bglabel">
	                       		<label for="" class="font-weight-bold">URL del sitio web (opcional): </label>
	                        </div>
                           	<input type="text" class="form-control" placeholder="">
                        </div>
            		</div>
            	</div>
               <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                     <div class="input-group-prepend pdtb3">
                        <div class="input-group-text bglabel">
                           <button class="btn btn-primary btn-md my-0 p" type="submit">Actualizar datos</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <div style="background-color: #fff">
      	<img class="text-center logodatos" src="<?php echo base_url(); ?>assets/img/logo-redondo.png">
     	<div style="background-color: #d1d5db"></div>
      </div>
   </div>
   <!--/DATOS DE USUARIO-->

   <div class="col-md-12 text-center pdtb5">
		<div class="container">
			<p>Si tienes dudas o necesitas ayuda, puedes llamar al <span class="font-weight-bold">800 00 00 000.</span></p>
			<div class="row">
				<div class="col-md-4 border-right">
					<img src="<?php echo base_url(); ?>assets/img/icono-envio.png" class="img-fluid" alt="Responsive image">
					<h5>Para cualquier momento</h5>
					<p>Prepara tus recetas en cualquier momento del día.</p>
				</div>
				<div class="col-md-4 border-right">
					<img src="<?php echo base_url(); ?>assets/img/icono-mensaje.png" class="img-fluid" alt="Responsive image">
					<h5>Electrodomésticos eficientes</h5>
					<p>Implementación de tecnologías para el ahorro de energía.</p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo base_url(); ?>assets/img/icono-escudo.png" class="img-fluid" alt="Responsive image">
					<h5>Seguros y durables</h5>
					<p>Materiales y componentes que perduran con el paso del tiempo.</p>
				</div>
			</div>
		</div>
	</div>	
</body>

<script type="text/javascript">
	var baseurl="<?php echo base_url();?>";
	$(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
        function modimagen() {
            $("#modificar").empty();
            $("#modificar").append('<form action="Cbartech/upload_image" method="post" enctype="multipart/form-data">'+
                            '<div class="form-group">'+
                                '<span class="pMSpan1">Sube tu foto de perfil</span>'+
                                '<input type="hidden" name="usuario" value="<?php echo $profile['nombre'];?>">'+
                                '<input name="archivo[]" type="file" class="form-control-file" accept="image/*" >'+
                            '</div>'+
                            '<button class="btn btn-primary btn-md my-0 p" type="submit">Subir</button>'+
                            '</form>'+
                        '</div>');
        }
         function det(id) {
        $('#most_det').empty();
        $('#det_tab').removeClass("invisible");
        $.post(baseurl+"Cbartech/detalls_envio",{
                id_order:id},
                function(data) {      
                    var result=JSON.parse(data);
                    $.each(result, function(i,item){          
                        var sub=item.precio_unitario*item.quantity;
                       $('#most_det').append(
                        '<tr>'+
                            '<td class="text-center">'+
                            '<img width="35%" class="img-fluid" src="'+item.img+'"></td>'+
                            '<td>'+item.descripcion_producto+'</td>'+
                            '<td>$'+item.precio_unitario+'MXN</td>'+
                            '<td>'+item.quantity+'</td>'+
                            '<td>$'+(sub).toFixed(2)+'</td>'+
                        '</tr>');
                    })
                });
        }

</script>
<script>
    $( document ).ready(function() {
    var btn=document.getElementById("pw").innerHTML="Mostrar Contraseña";
});
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      var btn=document.getElementById("pw");
      if(tipo.type == "password"){
          tipo.type = "text";
          var btn=document.getElementById("pw").innerHTML="Ocultar Contraseña";
      }else{
          tipo.type = "password";
          btn="Mostrar Contraseña";

      }
  }
  function gdireccion() {
    var col=document.getElementById("colonia");
    var est=document.getElementById("estado");
    var mun=document.getElementById("municipio");   
    $("#municipio").empty();
    $("#estado").empty();
    $("#colonia").empty();
    var codigo=document.getElementById("cp");
    var cp=codigo.value;
    $.ajax({
        url:baseurl+"Cbartech/search_direccion",
        type: "POST",
        dataType: 'json',
        data:{'cp':cp}
    }).then(function(respuesta) {
     $.each(respuesta.response, function(index, elemento) {
        switch(index)
        {
            case "estado":
                estado=elemento;
            break;
            case "municipio":
                municipio=elemento;
            break;
            case "asentamiento":
                asentamiento=elemento;
            break;
        }
      });   

     asentamiento.forEach(element => 
            $("#colonia").append('<option value="'+element+'">'+element+'</option>')
        );
     $("#estado").append('<input readonly type="text" name="estado" id="estad" class="form-control" value="'+estado+'" required/>');
     $("#municipio").append('<input readonly type="text" name="municipio" id="munic" class="form-control" value="'+municipio+'" required/>');
    });
    // $.post(baseurl+'Cbosstech/search_direccion',
 //      {cp:cp},
 //      function(data){
 //       var result=JSON.parse(data);
 //       console.log(result);
 //      }
 //    );
}
</script>
