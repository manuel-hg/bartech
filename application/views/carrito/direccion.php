 <script
    src="https://www.paypal.com/sdk/js?client-id=Ac1UVE1yjwkr3jOARVXBOrp-54632E0HRYrBx6Nn2gScIsIzHl31F0W34katP3WIunyx8GskQt1P7T51&currency=MXN"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>
    



<input type="hidden" id="col_md_id_u" value=<?php if($id_usuario_web!=null){ echo json_encode($id_usuario_web);}?>> 
	<div class="container font">	
		<div class="py-5">
        	<h4><b>FINALIZA TU COMPRA</b></h4>
        	<small class="text-muted font-weight-bold">*Estos campos son obligatorios</small><br>
        	<span>
						<a id="navActive" href="<?php echo base_url();?>productos">Productos</a> / 
						<a id="navActive" href="<?php echo base_url();?>carrito">Carrito</a> / 
						<span>Envio</span></span>
      	</div>
    </div>
    <?php if($carrito!=null){ ?>
	<div class="container font">
		<div class="row">
			<div class="col-md-7">
				<form>
				<div class="row">
				  <div class="col-md-6">
    				<h6 class="mb-3 font-weight-bold">Datos de quien recibe</h6>
						    <div class="form-group">
							    <input type="email" name="email_receptor" class="form-control rounded-0 binput" id="rcorreo" aria-describedby="emailHelp" placeholder="*Correo" required>
							</div>
						    <div class="row">
						      <div class="col-md-6">
						      	<div class="form-group">
						      		<input type="text" name="nombre_receptor" class="form-control rounded-0 binput" id="rnombre" placeholder="*Nombre(s):" required>
						      	</div>
						      </div>
						      <div class="col-md-6">
						      	<div class="form-group">
						      		<input type="text" name="apellidos_receptor" class="form-control rounded-0 binput" id="rapellido" placeholder="*Apellidos:" required>
						      	</div>
						      </div>
						    </div>
						    <div class="form-group">
						      <input type="number" name="telefono_receptor" class="form-control rounded-0 binput" id="rtelefono" placeholder="*Teléfono:" required>
						    </div>   	
							<!--mi prueba de checkbox-->
							<div class="custom-control custom-checkbox">
							  <input type="checkbox"  data-toggle="collapse" class="custom-control-input" id="rfacturae" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							  <label class="custom-control-label" for="rfacturae"> Deseo Factura para mi empresa.</label>
							</div>
						<div class="collapse" id="collapseExample">
						  <div class="card card-body">
						   	<div class="form-group">
								<div class="row">
								 	<div class="col-md-12">	
										<input type="text" class="form-control rounded-0 binput" id="ffiscal" name="" placeholder="*Nombre Fiscal o Razon Social">
								   	</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="text" class="form-control rounded-0 binput" id="frfc" name="" placeholder="*RFC">
									</div>
								</div>
								<div class="row">
								     <div class="col-md-12">
								      	<input type="text" class="form-control rounded-0 binput" id="fdomicilio" name="" placeholder="*Domicilio Fiscal Completo">
								      </div>
								</div>
								<div class="row">
								     <div class="col-md-12">
								      	<div class="form-group">
											<select class="form-control binput" id="fcfdi" readonly>
											    <option>Seleccione uso de CFDI</option>
											    <option value="G01">G01 - Adquisición de Mercancías</option>
											    <option value="G02">G02 - Devoluciones, Descuentos o Bonificaciones</option>
											    <option value="G03">G03 - Gastos en General</option>
											</select>
										</div>
								      </div>
							      	</div>
						 		</div>
							</div>
						</div>
    				</div>

    				<div class="col-md-6">
    				<?php if($direccion!=null){?>
										<?php foreach ($direccion as $direccion) {?>
											<div class="form-group ">
										      	<div class="row">
										      		<div class="col-md-4">
										      			<div class="form-group">
													      <p class="form-text font-weight-bold">*Código Postal:</p>
													    </div>
										      		</div>
										      		<div class="col-md-8">	
											    		<input maxlength="5" onblur="gdireccion();" type="number" class="form-control rounded-0 binput" id="cp" name="c12Postal" value="<?php echo $direccion['cp'];?>" required>
											    	</div>
										      	</div>
											</div>
											<small class="text-muted">Dirección de entrega</small>
											<div class="form-group">
												<input value="<?php echo $direccion['direccion'];?>"  name="direccion_entrega" type="text" class="form-control rounded-0 binput" id="edireccion" placeholder="*Dirección:">
											</div>
										    <div class="row">
										      	<div class="col-md-6">
										      		<div class="form-group">
										      			<input name="no_ext" value="<?php echo $direccion['no_ext'];?>" type="text" class="form-control rounded-0 binput" id="enexterior" placeholder="*No. Exterior:">
										      		</div>
										      	</div>
										      	<div class="col-md-6">
										      		<div class="form-group">
										      			<input value="<?php echo $direccion['no_int'];?>" name="no_int" type="text" class="form-control rounded-0 binput" id="eninterior" placeholder="*No. Interior:">
										      		</div>
										      	</div>
										    </div>
										     <div class="row">
										      <div class="col-md-6">
										      	<div class="form-group">
										      	      <div class="form-group">
													    <select name="colonia" class="form-control binput" id="colonia" readonly>
													      <option value="<?php echo $direccion['colonia'];?>"><?php echo $direccion['colonia'];?></option>
													    </select>
													  </div>
										      	</div>
										      </div>
										      <div class="col-md-6">
										      	<div class="form-group">
										      	      	<div id="municipio">
										      	      		<input name="municipio" value="<?php echo $direccion['municipio'];?>" readonly="readonly" type="text" id="munic" class="form-control rounded-0 binput" placeholder="*Municipio/Alcaldía:" required="">	
										      	      	</div>
										      	</div>
										      </div>
										    </div>
										     <div class="form-group">
										    	<div id="estado">
										    		<input type="text" name="estado" value="<?php echo $direccion['estado'];?>" class="form-control rounded-0 binput" id="estad" placeholder="*Estado:" readonly>
										    	</div>
											</div>
											<small class="text-muted">Entre que calles se encuentra la entrega</small>
											<div class="row">
										      	<div class="col-md-12">
										      		<div class="form-group">
										      			 <input name="entrecalles" type="text" value="<?php echo $direccion['entrecalles'];?>" class="form-control rounded-0 binput" id="entrecalles" placeholder="Entre calles:">
										      		</div>
										      	</div>
									   		 </div>
									   		<small class="text-muted">Información adicional de entrega</small>
										    <div class="form-group">
												<textarea name="informacion_adicional" class="form-control rounded-0 binput" rows="3" id="eiadicional" required ><?php echo $direccion['info_adicional'];?></textarea>
											</div>

										    <small class="text-muted">¿Necesitamos un código de seguridad o un número de teléfono para acceder a este edificio?</small>
										    <div class="form-group">
												<textarea value="" name="adicional2" class="form-control rounded-0 binput" rows="1" id="adicional2"></textarea>
											</div>
										<?php } } else{?>
											<div class="form-group ">
										      	<div class="row">
										      		<div class="col-md-4">
										      			<div class="form-group">
													      <p class="form-text font-weight-bold">*Código Postal:</p>
													    </div>
										      		</div>
										      		<div class="col-md-8">	
											    		<input maxlength="5" onblur="gdireccion();" type="number" class="form-control rounded-0 binput" id="cp" name="c12Postal" required placeholder="CP*">
											    	</div>
										      	</div>
											</div>
											<small class="text-muted">Dirección de entrega</small>
											<div class="form-group">
												<input  name="direccion_entrega" type="text" class="form-control rounded-0 binput" id="edireccion" placeholder="*Dirección:">
											</div>
										    <div class="row">
										      	<div class="col-md-6">
										      		<div class="form-group">
										      			<input name="no_ext" type="text" class="form-control rounded-0 binput" id="enexterior" placeholder="*No. Exterior:">
										      		</div>
										      	</div>
										      	<div class="col-md-6">
										      		<div class="form-group">
										      			<input  name="no_int" type="text" class="form-control rounded-0 binput" id="eninterior" placeholder="*No. Interior:">
										      		</div>
										      	</div>
										    </div>
										     <div class="row">
										      <div class="col-md-6">
										      	<div class="form-group">
										      	      <div class="form-group">
													    <select name="colonia" class="form-control binput" id="colonia" readonly>
													      <option>Seleccione la colonia</option>
													    </select>
													  </div>
										      	</div>
										      </div>
										      <div class="col-md-6">
										      	<div class="form-group">
										      	      	<div id="municipio">
										      	      		<input name="municipio" readonly="readonly" type="text" id="munic" class="form-control rounded-0 binput" placeholder="*Municipio/Alcaldía:" required="">	
										      	      	</div>
										      	</div>
										      </div>
										    </div>
										     <div class="form-group">
										    	<div id="estado">
										    		<input type="text" name="estado" class="form-control rounded-0 binput" id="estad" placeholder="*Estado:" readonly>
										    	</div>
											</div>
											<small class="text-muted">Entre que calles se encuentra la entrega</small>
											<div class="row">
										      	<div class="col-md-12">
										      		<div class="form-group">
										      			 <input name="entrecalles" type="text" value="<?php echo $direccion['entrecalles'];?>" class="form-control rounded-0 binput" id="entrecalles" placeholder="Entre calles:">
										      		</div>
										      	</div>
									   		 </div>
									   		<small class="text-muted">Información adicional de entrega</small>
										    <div class="form-group">
												<textarea name="informacion_adicional" class="form-control rounded-0 binput" rows="3" id="eiadicional" placeholder="Proporciónanos detalles como la descripción del edificio, un punto de referencia cercano o alguna otra señal para llegar." required></textarea>
											</div>

										    <small class="text-muted">¿Necesitamos un código de seguridad o un número de teléfono para acceder a este edificio?</small>
										    <div class="form-group">
												<textarea name="adicional2" class="form-control rounded-0 binput" rows="1" id="adicional2"></textarea>
											</div>
										<?php } foreach ($car as $clave) {$datos=$clave;}?>

										<input type="hidden" id="car" name="col-md" value="<?php echo $datos['id_carrito'];?>">
										<button id="rx" type="button" onclick="colmdservice();" style="width: 100%" class="btn btn-primary">Continuar</button>
						</div>					
					</div>
				</form>
			</div>
			<div class="col-md-5 text-center">
    				<div class="row">
    					<div id="sents"></div>
    				</div>
    				<div class="row">
						<div class="col-sm-12 bresumen">
								<div class="py-3">
									<h5 class="font-weight-bold text-center">RESUMEN DE COMPRA</h5>
								</div>
								<div class="row">
									<div class="col-md-2"> 
									</div>
									<div class="col-md-3">
										<p class="text-center"><b>Producto</b></p>
									</div>			
									<div class="col-md-2">
										<p class="text-center"><b>Color</b></p>
									</div>
									<div class="col-md-3">
										<p class="text-center"><b>Precio Unitario</b></p>
									</div>	
									<div class="col-md-2">
										<p class="text-center"><b>Cantidad</b></p>
									</div>			
								</div>
								<div class="row">
									
							<?php foreach ($carrito as $carrito) {?>
								<input type="hidden" value="">
								<div class="row">
									<div class="col-md-2">
										<img src="<?php echo $carrito['img_principal'] ?>" width='70%px'>
									</div>
									<div class="col-md-3">
										<p class="text-center"><?php echo $carrito['nombre_categoria']." ".$carrito['nombre_modelo'] ?></p>
									</div>			
									<div class="col-md-2">
										<p class="text-center"><?php echo $carrito['color']?></p>
									</div>
									<div class="col-md-3">
										<p class="text-center"><?php echo $carrito['precio']?></p>
									</div>	
									<div class="col-md-2">
										<p class="text-center"><?php echo $carrito['quantity']?></p>										
									</div>
								</div>
								<?php } ?>
								<div class="col-12">
										<div id="paypal-button-container" style="display:none"></div>
								</div>
							</div>
								<?php foreach($car as $car){?>
								<input type="hidden" id="col_nd_6" value="<?php echo $car['id_carrito'] ?>">
								<div class="row">
									<div class="col-sm-6">
										<h6 class="font-weight-bold">Subtotal: </h6>
									</div>
									<div class="col-sm-6">
										<h6 class="text-right font-weight-bold">$<?php echo $car['total']." MXN";?></h6>
										<input id="precio_fin" type="hidden" value="<?php echo $car['total']?>">
									</div>
								</div>
								<div id="envio">
									
								</div>
								<div class="row">
									<div class="col-sm-6">
										<h6 class="font-weight-bold">Total: </h6>
									</div>
									<div class="col-sm-6">
										<div id="final_price">

											<h6 class="text-right font-weight-bold">$<?php echo $car['total']." MXN";?></h6>
											<input id="total" type="hidden" value="<?php echo $car['total']?>">
										</div>
									</div>
								</div>
							<?php } ?>
					</div>
			</div>
	</div>	
	<?php }else{ ?>	
	<div class="container font">
		<h5>No hay productos en tu carrito de compras</h5>
	</div>
	<?php } ?>

<div class="loader"></div>
</div></div>

<script>

  /*paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '500.00'
          }
        }]
      });
    })
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
      	if(details.status=='COMPLETED'){
      		location.href()
      	}
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.*/
</script>
<style>
	.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo base_url();?>assets/img/loading.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
<script>var baseurl="<?php echo base_url();?>";</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<script>
	$( document ).ready(function() {
		var tot,tot_envio;	
	     $(".loader").hide();
	     var id_u=document.getElementById("col_md_id_u").value;
	});
	function review(id,paqueteria,servicio,tiempo_entrega,deliveryDate,price) {
		$("#paypal-button-container").empty();
		$("#paypal-button-container").css('display', 'block');
		var id_u=document.getElementById("col_md_id_u").value;
		var tot_id=document.getElementById("col_nd_6").value;
		$.post(baseurl+"Bartech/en_temp",{
						id_usuario:id_u,paqueteria:paqueteria,servicio:servicio});
		var final_price=document.getElementById("precio_fin").value;
		$("#envio").empty();
		price = price.replace(/,/g, "");
		$("#envio").append('<div class="row"><div class="col-sm-6"><h6 class="font-weight-bold">Envio:</h6></div><div class="col-sm-6"><h6 class="text-right font-weight-bold">$'+
			price+' MXN</h6>'+'</div></div>');
		var totalfinal=(Number(final_price)+Number(price));
		var costo=parseFloat(totalfinal);
		$("#costo_envio").empty();
		$("#costo_envio").val(price);
		$("#final_price").empty();
		$("#final_price").append('<h6 class="text-right font-weight-bold">$'+costo+' MXN</h6><input id="total" type="hidden" value="'+costo+'"');
		$("#paypal-button-container").removeAttr("disabled", true);

        paypal.Buttons({
	    createOrder: function(data, actions) {
	        return actions.order.create({

	            purchase_units: [
	            {
	                reference_id: tot_id,
	                description: "Tienda Bartech",

	                custom_id: tot_id,
	                soft_descriptor: "Tienda Bartech",
	                amount: {
	                    currency_code: "MXN",
	                    value: costo,
	                    breakdown: {
	                        item_total: {
	                            currency_code: "MXN",
	                            value: costo
	                        }
	                    }
	                },

	            }]
	            });
	},
	onApprove: function(data, actions) {
	    return actions.order.capture().then(function(details) {
	    	if(details.status=="COMPLETED"){
	    	var df="confirmacion?amt="+costo+"&metodo=paypal";
			window.location.href=baseurl+df;
	    	}
	    });
	}
	}).render('#paypal-button-container');

	}

	function colmdservice() {
		var rcorreo=document.getElementById("rcorreo").value;
		var rnombre=document.getElementById("rnombre").value;
		var rapellido=document.getElementById("rapellido").value;
		var rtelefono=document.getElementById("rtelefono").value;
		if( $('#rfacturae').prop('checked') ) {
    			var ffiscal=document.getElementById("ffiscal").value;
				var frfc=document.getElementById("frfc").value;
				var fdomicilio=document.getElementById("fdomicilio").value;
				var fcfdi=document.getElementById("fcfdi").value;
				if(ffiscal=="" || frfc=="" || fdomicilio=="" || fcfdi==""){
					swal({
					  title: "Cuidado!",
					  text: "Leene todos los campos de facturacion",
					  icon: "warning",
					  dangerMode: true,
					});
					return false;
				}else{
					var facturar=1;
					var cp=document.getElementById("cp").value;
					var edireccion=document.getElementById("edireccion").value;
					var enexterior=document.getElementById("enexterior").value;
					var eninterior=document.getElementById("eninterior").value;
					var colonia=document.getElementById("colonia").value;
					var munic=document.getElementById("munic").value;
					var estado=document.getElementById("estad").value;
					var ecalle1=document.getElementById("entrecalles").value;
					var eiadicional=document.getElementById("eiadicional").value;
					var adicional2=document.getElementById("adicional2").value;
					var car=document.getElementById("car").value;
					if(rcorreo=="" || rnombre=="" || rapellido=="" || rtelefono=="" || cp=="" || edireccion=="" ||  enexterior=="" || eninterior=="" || colonia=="" || eiadicional=="" || adicional2==""){
						swal({
					  title: "Cuidado!",
					  text: "Leene todos los campos",
					  icon: "warning",
					  dangerMode: true,
					});
						return false;
					}else{
						$(".loader").show();
					$.post(baseurl+"Bartech/cotizar",{
						estado:estado,
						email_receptor:rcorreo,
						nombre_receptor:rnombre,
						apellidos_receptor:rapellido,
						rtelefono:rtelefono,
						c12Postal:cp,
						direccion_entrega:edireccion,
						no_ext:enexterior,
						no_int:eninterior,
						colonia:colonia,
						municipio:munic,
						informacion_adicional:eiadicional,
						adicional2:adicional2,
						col_md:car,
						facturar:facturar,
						ffiscal:ffiscal,
						frfc:frfc,
						fdomicilio:fdomicilio,
						fcfdi:fcfdi},
						function(data) {
							$('#sents').html(data);
							$(".loader").hide();
						}
					);}
				}
    		}else{
    			var facturar=0;
					var cp=document.getElementById("cp").value;
					var edireccion=document.getElementById("edireccion").value;
					var enexterior=document.getElementById("enexterior").value;
					var eninterior=document.getElementById("eninterior").value;
					var colonia=document.getElementById("colonia").value;
					var munic=document.getElementById("munic").value;
					var estado=document.getElementById("estad").value;
					var ecalle1=document.getElementById("entrecalles").value;
					var eiadicional=document.getElementById("eiadicional").value;
					var adicional2=document.getElementById("adicional2").value;
					var car=document.getElementById("car").value;
					
					if(rcorreo=="" || rnombre=="" || rapellido=="" || rtelefono=="" || cp=="" || edireccion=="" ||  enexterior=="" || eninterior=="" || colonia=="" || eiadicional=="" || adicional2==""){
						swal({
						  title: "Cuidado!",
						  text: "Leene todos los campos",
						  icon: "warning",
						  dangerMode: true,
						});
						return false;
					}else{
						$(".loader").show();
					$.post(baseurl+"Bartech/cotizar",{
						estado:estado,
						email_receptor:rcorreo,
						nombre_receptor:rnombre,
						apellidos_receptor:rapellido,
						rtelefono:rtelefono,
						c12Postal:cp,
						direccion_entrega:edireccion,
						no_ext:enexterior,
						no_int:eninterior,
						colonia:colonia,
						municipio:munic,
						informacion_adicional:eiadicional,
						adicional2:adicional2,
						col_md:car},
						function(data) {
							$('#sents').html(data);
							$(".loader").hide();
						}
					);}
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
	 $("#estado").append('<input readonly type="text" name="estado" id="estad" class="c12SRow form-control rounded-0 binput" value="'+estado+'" required/>');
	 $("#municipio").append('<input readonly type="text" name="municipio" id="munic" class="c12SRow c12SRow form-control rounded-0 binput" value="'+municipio+'" required/>');
	});
}
</script>


