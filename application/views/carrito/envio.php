<?php $x=1; ?>
<?php foreach ($scm as $clave) {$datas=$clave;} ?>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h6>Selecciona tu envio</h6>
			   <table  style="width:100%;">
				  <thead style="background-color: #1a365e;color: white;">
				     <tr>
				     <th></th>
				     <th></th>
				 	<th>Proveedor</th>
				 	<th>Servicio</th>
				 	<th>Tiempo de entrega estimado</th>
				 	<th>Dia de entrega estimado</th>
				 	<th>Costo</th>
				    </tr>
				  </thead>
				  <tbody>  
					<?php 
					$x=1;
					if($datas!=null){
						foreach ($datas as $datas) {
						$img="https://s3.us-east-2.amazonaws.com/envia-staging/uploads/logos/services/".$datas->carrier."_".$datas->service.".png";?>
						<tr>
						<th> <input class="form-check-input" type="radio" name="gridRadios" id="radio_scm_<?php echo $x; ?>" value="option1" onclick="review(<?php echo $x;?>,'<?php echo $datas->carrier;?>','<?php echo $datas->service;?>', '<?php echo $datas->deliveryEstimate;?>','<?php echo $datas->deliveryDate->date?>','<?php echo number_format($datas->totalPrice,2)?>');">
          
						<th><img style="max-width: 80px; max-height: 50px;" src="<?php echo $img; ?>"></th>
						<th><label style="font-size: 10px"><?php echo $datas->carrier;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->service;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryEstimate;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryDate->date?></label></th>
						<th><label style="font-size: 10px">$<?php echo number_format($datas->totalPrice,2)?></label></th>
						</tr>	
					<?php $x++;}}?>
					<?php foreach ($fedex as $clave) {$datas=$clave;} ?>            
					<?php 
					$x=1;
						foreach ($datas as $datas) {
						$img="https://s3.us-east-2.amazonaws.com/envia-staging/uploads/logos/services/".$datas->carrier."_".$datas->service.".png";?>
						<tr>
						<th><input class="form-check-input" type="radio" name="gridRadios" id="radio_fdx_<?php echo $x; ?>" value="option1"  onclick="review(<?php echo $x;?>,'<?php echo $datas->carrier;?>','<?php echo $datas->service;?>', '<?php echo $datas->deliveryEstimate;?>','<?php echo $datas->deliveryDate->date?>','<?php echo number_format($datas->totalPrice,2)?>');"> </th>
						<th><img style="max-width: 80px; max-height: 50px;" src="<?php echo $img; ?>"></th>
						<th><label style="font-size: 10px"><?php echo $datas->carrier;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->service;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryEstimate;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryDate->date?></label></th>
						<th><label style="font-size: 10px">$<?php echo number_format($datas->totalPrice,2)?></label></th>
						</tr>	
					<?php 
					$x++;}?>
					<?php foreach ($estafeta as $clave) {$datas=$clave;} ?>            
					<?php 
					$x=1;
					if($datas!=null){
						foreach ($datas as $datas) {
						$img="https://s3.us-east-2.amazonaws.com/envia-staging/uploads/logos/services/".$datas->carrier."_".$datas->service.".png";?>
						<tr>
						<th><input class="form-check-input" type="radio" name="gridRadios" id="radio_fdx_<?php echo $x; ?>" value="option1"  onclick="review(<?php echo $x;?>,'<?php echo $datas->carrier;?>','<?php echo $datas->service;?>', '<?php echo $datas->deliveryEstimate;?>','<?php echo $datas->deliveryDate->date?>','<?php echo number_format($datas->totalPrice,2)?>');"> </th>
						<th><img style="max-width: 80px; max-height: 50px;" src="<?php echo $img; ?>"></th>
						<th><label style="font-size: 10px"><?php echo $datas->carrier;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->service;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryEstimate;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryDate->date?></label></th>
						<th><label style="font-size: 10px">$<?php echo number_format($datas->totalPrice,2)?></label></th>
						</tr>	
					<?php 
					$x++;}}?>
					<?php foreach ($carssa as $clave) {$datas=$clave;} ?>            
					<?php 
					$x=1;
					if($datas!=null){
						foreach ($datas as $datas) {
						$img="https://s3.us-east-2.amazonaws.com/envia-staging/uploads/logos/services/".$datas->carrier."_".$datas->service.".png";?>
						<tr>
						<th><input class="form-check-input" type="radio" name="gridRadios" id="radio_fdx_<?php echo $x; ?>" value="option1"  onclick="review(<?php echo $x;?>,'<?php echo $datas->carrier;?>','<?php echo $datas->service;?>', '<?php echo $datas->deliveryEstimate;?>','<?php echo $datas->deliveryDate->date?>','<?php echo number_format($datas->totalPrice,2)?>');"> </th>
						<th><img style="max-width: 80px; max-height: 50px;" src="<?php echo $img; ?>"></th>
						<th><label style="font-size: 10px"><?php echo $datas->carrier;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->service;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryEstimate;?></label></th>
						<th><label style="font-size: 10px"><?php echo $datas->deliveryDate->date?></label></th>
						<th><label style="font-size: 10px">$<?php echo number_format($datas->totalPrice,2)?></label></th>
						</tr>	
					<?php 
					$x++;}}?>
				  </tbody>
				 </table>
		</div>
		
	
		</div>

	</div>
</div>
</div>
<script>
$( document ).ready(function() {
    $("#rx").removeClass("btn1 mb-3");
	$("#rx").addClass("btn btn-light");
	$("#rx").attr("disabled", true);
});
</script>

<div style="padding-bottom: 5%;"></div>

