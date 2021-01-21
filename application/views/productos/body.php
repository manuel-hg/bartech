<body>
	<img class="d-block w-100 pd5" src="<?php echo base_url(); ?>assets/img/banner-productos.png" class="img-fluid" alt="Responsive image" alt="First slide">
<div class="col-md-12 bgbanner text-center">
		<div class="container">
			<div class="row pdtb5">
				<div class="col-md-4"><h5>Para cualquier momento</h5><p>Prepara tus recetas en cualquier momento del día.</p>
				</div>
				<div class="col-md-4"><h5>Electrodomésticos eficientes</h5><p>Implementación de tecnologías para el ahorro de energía.</p>
				</div>
				<div class="col-md-4"><h5>Seguros y durables</h5><p>Materiales y componentes que perduran con el paso del tiempo.</p>
				</div>
			</div>
		</div>
	</div>

	<!--Primera fila de productos-->
	<div class="container pd5">
		<div class="row">
				<?php foreach ($productos as $productos) {
						?>
			<div class="col-md-3"><!--Card-->
				<form method="post" action="<?php echo base_url();?>Cbosstech/addcart">
					<input type="hidden" name="id_pr" value="<?php echo $productos['id_producto']?>">
				<div class="card card-cascade card-ecommerce">

				  <!--Card image-->
				  <div class="view view-cascade overlay" style="background-color: #bebebead;">
				  	<a href="<?php echo base_url(); ?>detalle?id=<?php echo $productos['id_producto']?>">
						<img width="100%" src="<?php echo $productos['img_principal']?>" class="img-fluid" alt="Responsive image" alt="First slide">
					</a>
				    <a>
				      
				    </a>
				  </div>
				  <!--/.Card image-->

				  <!--Card content-->
				  <div class="card-body card-body-cascade">
				    <!--Category & Title-->
				    <p class="text-center"><?php echo $productos['nombre_categoria']?>  <strong><a href="<?php echo base_url(); ?>detalle?id=<?php echo $productos['id_producto']?>"><?php echo $productos['nombre_modelo']."<br>".$productos['color']; ?></a></strong></p>

				    <!--Description-->
<!--				    <p class="card-text ">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe
				      eveniet ut et voluptates.
				    </p>
!-->
				    <!--Card footer-->
				    <div class="card-footer">
				      <span class="float-left text-left">$<?php echo $productos['precio']; ?></span>
				      <span class="float-right"><a href="<?php echo base_url(); ?>detalle?id=<?php echo $productos['id_producto']?>"><button type="button" class="btn-success" style="margin:0; font-size:8px;">+ informacion</button></span></a>
				      <!--
				      <span class="float-right"><a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i
				            class="fas fa-heart"></i></a></span> -->
				    </div>

				  </div>
				  <!--/.Card content-->

				</div>
				</form>
				<!--/.Card-->
			</div>
				<?php } ?>
		</div>
	</div>

	<button type="button pd5" class="btn btn-primary btn-lg btn-block">volver arriba</button>

	<div class="col-md-12 text-center pd5">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo base_url(); ?>assets/img/icono-envio.png" class="img-fluid" alt="Responsive image">
					<h5>Para cualquier momento</h5>
					<p>Prepara tus recetas en cualquier momento del día.</p>
				</div>
				<div class="col-md-4">
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
