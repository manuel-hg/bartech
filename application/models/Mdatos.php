<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdatos extends CI_Model  {
	function get_login($email, $password) {
		$query=$this->db->query("SELECT * FROM `login_web` WHERE username = '".$email."' AND password= '".$password."'");
		return $query->result_array();
	}
	public function get_user_name($id_usuario_web)
	{
		$query=$this->db->query("SELECT CONCAT(nombre, ' ' , apellido) AS nombre FROM usuario_web WHERE id_usuario_web=".$id_usuario_web);
		return $query->result_array();
	}
	public function get_count_products($id)
	{
		$query=$this->db->query("SELECT total_articulos FROM carrito WHERE id_usuario_web=".$id);
		return $query->result_array();	
	}
	public function Get_categories()
	{
		$query=$this->db->query("SELECT * FROM categorias");
		return $query->result_array();
	}
	public function Get_products()
	{
		$query=$this->db->query("SELECT a.id_producto, b.nombre_categoria,c.nombre_modelo,a.color, a.img_principal,a.origen,a.precio FROM producto_ a INNER JOIN categorias b ON a.id_categoria=b.id_categoria INNER JOIN modelo c ON a.id_modelo=c.id_modelo");
		return $query->result_array();
	}
	public function set_product($id)
	{
		$query=$this->db->query("SELECT a.id_producto, b.nombre_categoria,c.nombre_modelo,a.color, a.img_principal,a.origen,a.precio,d.descripcion FROM producto_ a INNER JOIN categorias b ON a.id_categoria=b.id_categoria INNER JOIN modelo c ON a.id_modelo=c.id_modelo INNER JOIN descripciones d ON a.id_descripciones=d.id_descripciones WHERE id_producto=".$id);
		return $query->result_array();
	}
	public function set_detail($id){
		$query=$this->db->query("SELECT * FROM detalle_producto WHERE id_producto=".$id);
		return $query->result_array();
	}
	public function set_inventario($id)
	{
		$query=$this->db->query("SELECT cantidad FROM inventario WHERE id_producto=".$id);
		return $query->result_array();
	}
	public function get_id_car($iduser)
	{
			$query=$this->db->query('SELECT id_carrito FROM carrito WHERE id_usuario_web='.$iduser.' AND status="inprocess"');
			return $query->result_array();
	}
	public function get_details_car($idcar)
	{
			$query=$this->db->query("SELECT a.id_detalle_carrito,a.product_id,c.nombre_categoria,e.nombre_modelo,b.precio,b.img_principal,a.quantity,d.cantidad, b.color FROM detalle_carrito a INNER JOIN producto_ b ON a.product_id=b.id_producto INNER JOIN categorias c ON b.id_categoria=c.id_categoria INNER JOIN inventario d ON a.product_id=d.id_producto INNER JOIN modelo e ON b.id_modelo=e.id_modelo WHERE id_carrito=".$idcar);
			return $query->result_array();
	}
	public function get_car($idcar)
	{
		$query=$this->db->query("SELECT * FROM carrito WHERE id_carrito=".$idcar);
		return $query->result_array();
	}
	
	public function get_direccion($id)
	{
		$query=$this->db->query("SELECT * FROM direcciones WHERE id_usuario_web=".$id);
		return $query->result_array();
	}
	public function cotiza($data){  
  	$curl = curl_init();
   curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.envia.com/ship/rate/?",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\n    
      \"origin\": {\n        
        \"name\": \"".$data['name']."\",\n        
        \"company\": \"".$data['company']."\",\n        
        \"email\": \"osgosf8@gmail.com\",\n        
        \"phone\": \"8116300800\",\n        
        \"street\": \"".$data['street']."\",\n        
        \"number\": \"".$data['number']."\",\n        
        \"district\": \"".$data['district']."\",\n        
        \"city\": \"".$data['city']."\",\n        
        \"state\": \" ".$data['state']."\",\n    
        \"country\": \"MX\",\n        
        \"postalCode\": \"".$data['cp']."\",\n       
        \"reference\": \"\"\n    },\n    

      \"destination\": {\n        
        \"name\": \"".$data['name2']."\",\n        
        \"company\": \"".$data['company2']."\",\n        
        \"email\": \"osgosf8@gmail.com\",\n        
        \"phone\": \"8116300800\",\n        
        \"street\": \"".$data['street2']."\",\n        
        \"number\": \"".$data['number2']."\",\n        
        \"district\": \"".$data['district2']."\",\n        
        \"city\": \"".$data['city2']."\",\n        
        \"state\": \" ".$data['state2']."\",\n    
        \"country\": \"MX\",\n        
        \"postalCode\": \"".$data['cp2']."\",\n       
        \"reference\": \"\"\n    },\n        
          \"packages\":".$data['content'].",\n    

                    \"shipment\": {\n        
                      \"carrier\": \"".$data['carrier']."\",\n        
                      \"type\": 1\n    
                    }\n}",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "Authorization: Bearer 02dc9052483b511b02ebd7eb3ba5c73b1639fa9c87c5cbf1c68c771494b8f338" 
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  return json_decode($response);  
}

public function get_details_car_sizes($idcar)
	{
			$query=$this->db->query("SELECT a.id_detalle_carrito,c.nombre_categoria,e.nombre_modelo,b.precio,a.quantity, b.color,d.peso,d.Largo,d.Ancho,d.Alto FROM detalle_carrito a INNER JOIN producto_ b ON a.product_id=b.id_producto INNER JOIN categorias c ON b.id_categoria=c.id_categoria INNER JOIN modelo e ON b.id_modelo=e.id_modelo INNER JOIN detalle_producto d ON b.id_producto=d.id_producto WHERE id_carrito=".$idcar);
			return $query->result_array();
	}
public function get_user_data($id)
	{
		$query=$this->db->query("SELECT a.id_usuario_web,a.nombre,a.apellido,a.telefono,a.img,b.username,c.cp,c.direccion,c.no_int,c.no_ext,c.colonia,c.municipio,c.estado,c.entrecalles,c.info_adicional FROM usuario_web a LEFT JOIN login_web b ON a.id_usuario_web=b.id_usuario_web LEFT JOIN direcciones c ON a.id_usuario_web=c.id_usuario_web WHERE a.id_usuario_web=".$id);
		return $query->result_array();
	}
public function upload_image($data)
	{
		 $this->db->where('nombre', $data['nombre']);
    	 $this->db->set('img', $data['destino']);
    	return $this->db->update('usuario_web');
	}
	public function get_order($id)
	{
		$query=$this->db->query("SELECT * FROM ordenes WHERE id_usuario=".$id);
		return $query->result_array();
	}
public function get_order_details($id_orden)
	{
		$query=$this->db->query("SELECT * FROM `detalle_ordenes` WHERE id_ordenes=".$id_orden);
		return $query->result_array();
	}
public function update_user($data,$password)
	{

		$this->db->where('id_usuario_web', $data['id_usuario_web']);
		$this->db->update('usuario_web',$data);
		if($password!=""){
			$d['password']=$password;
			$this->db->where('id_usuario_web', $data['id_usuario_web']);
			$this->db->update('login_web',$d);
		}
	}
	public function update_direccion($data)
	{
		$query=$this->db->query("SELECT * FROM direcciones WHERE id_usuario_web=".$data['id_usuario_web']);
		$arreglo=$query->result_array();
		if($arreglo==null){
			$this->db->insert('direcciones',$data);
		}else{
			$this->db->where('id_usuario_web', $data['id_usuario_web']);
		$this->db->update('direcciones',$data);	
		}
	}
public function new_order($carrito,$car,$amount,$method)
	{
		$deta=$carrito;
		foreach ($car as $clave) {$carro=$clave;}
		$id_usuario_web=$carro['id_usuario_web'];


		$query=$this->db->query("SELECT * FROM envio_temporal WHERE id_usuario_web=".$id_usuario_web);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$dato=$clave;}

		$query=$this->db->query("SELECT * FROM servicio_temporal WHERE id_usuario=".$id_usuario_web);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$dat=$clave;}

		$query=$this->db->query("SELECT * FROM usuario_web WHERE id_usuario_web=".$id_usuario_web);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$personales=$clave;}		


		$envio=array(
			'id_usuario_web' => $dato['id_usuario_web'],
			'email' => $dato['email'],
			'nombre' => $dato['nombre'],
			'telefono' => $dato['telefono'],
			'cp' => $dato['cp'],
			'direccion' => $dato['direccion'],
			'exterior' => $dato['exterior'],
			'interior' => $dato['interior'],
			'colonia' => $dato['colonia'],
			'municipio' => $dato['municipio'],
			'estado' => $dato['estado'],
			'referencia' => $dato['referencia'],
			'paqueteria' => $dat['paqueteria'],
			'servicio' => $dat['servicio']
		);
		$this->db->insert('envio',$envio);

		$this->db->where('id_usuario_web', $id_usuario_web);
		$this->db->delete('envio_temporal');
		$this->db->where('id_usuario', $id_usuario_web);
		$this->db->delete('servicio_temporal');

		$query=$this->db->query("SELECT MAX(id_envio) FROM envio WHERE id_usuario_web=".$id_usuario_web);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$da=$clave;}


		$data=array(
			'id_usuario'=>intval($carro['id_usuario_web']),
			'status'=>'inprocess',
			'amount'=>$amount,
			'articulos'=>$carro['total_articulos'],
			'id_envio'=>$da['MAX(id_envio)'],
			'metodo_pago'=>$method);
		
		$this->db->insert('ordenes',$data);
		$this->db->where('id_usuario_web', $carro['id_usuario_web']);
		$this->db->delete('carrito');

		$query=$this->db->query("SELECT MAX(id_ordenes) FROM ordenes WHERE id_usuario=".$carro['id_usuario_web']);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$dato=$clave;}
		foreach ($carrito as $clave) {
			$descripcion=$clave['nombre_categoria'].' '.$clave['nombre_modelo'].' '.$clave['color'];
			$max=intval($dato['MAX(id_ordenes)']);
			$detcar=array(
				'id_ordenes'=>intval($dato['MAX(id_ordenes)']),
				'descripcion_producto'=>$descripcion,
				'id_producto'=>$clave['product_id'],
				'quantity'=>$clave['quantity'],
				'precio_unitario'=>$clave['precio'],
				'img'=> $clave['img_principal']);
			$this->db->insert('detalle_ordenes',$detcar);

		}
		$this->db->where('id_carrito', $dato['MAX(id_ordenes)']);
		$this->db->delete('detalle_carrito');
		$config = array(                
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );
		$html='<!DOCTYPE html>
		<html lang="en">
		<head>
		    <meta charset="UTF-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title>Pedido Bosstech</title>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		</head>

		<style type="text/css">
		.pdtb5{
		    padding-top:5%;
		    padding-bottom:5%
		} 
		.pdtb2{
		    padding-top:2%;
		    padding-bottom:2%
		}
		.txb{
		    font-weight: bold;

		}

		</style>

		<body>
		<!-- Large modal -->

	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	        <div class="container text-center pdtb5">
	        <h4>Tu orden esta siendo procesada</h4>
	        </div>
	            <div class="col-md-12">
                <div class="row">
                   
                    <div class="col-md-12">
                    	<img width="100%" src="https://i.ibb.co/nmhD2yM/logo.png" alt="">
                        <p class="txb">Detalle de pedido</p>
                       <div class="container pdtb2">
                       	<img width="100%" src="https://i.ibb.co/SNcTw0L/logo-redondo.png" alt="">
                            <p>Nombre de Cliente:'.$envio['nombre'].'</p>
                            <p>Telefono:'.$envio['telefono'].'</p>
                            <p>Dirección de entrega:'.$envio['direccion']." ".$envio['exterior']." ".$envio['interior']." ".$envio['colonia']." ". $envio['municipio']." ".$envio['estado']." ".$envio['cp'].'</p>
                            <p>Número de pedido:'.$max.'</p>

                        </div>

                        <table class="table table-bordered table-responsive ">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Costo Unitario</th>
                                </tr>
                            </thead>
                            <tbody>';
                            $x=1;
                            foreach ($deta as $clave) {
                            $html.='<tr><td scope="row">'.$x.'</td>'.
                            '<td><img src="'.$clave['img_principal'].'" alt="" width="25%"" ></td>';
							$descripcion=$clave['nombre_categoria'].' '.$clave['nombre_modelo'].' '.$clave['color'];
							$html.='<td>'.$descripcion.'</td>';
							$html.='<td>'.$clave['quantity'].'</td>';
							$html.='<td>'.$clave['precio'].'</td>';
							$html.='</tr>';
                            $x++;}
                            $html.='
                            </tbody>
                            </table>
                            <div class="container pdtb2">
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4">
                                        <p>Costo total:'.$amount.'</p>
                                    </div>
                                </div>
                            </div>
                            <p class="txb">En breve recibiras un correo electronico con el numero de guia en tu paqueteria de preferencia</p>
                    </div>
                </div>
            </div>
            <footer class="container text-center">
                <small>COPYRIGHT © 2020. BARTEC MÉXICO ELECTRODOMÉSTICOS S.A. DE C.V.</small>
            </footer>
	    </div>
	</body>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</html>';
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
	$this->email->from('norepply@bartecmx.com', 'Detalle de pedido Bartech');
	$this->email->to($envio['email']);
    $this->email->subject('Mensaje de envio');
	$this->email->message($html);
	$this->email->send();
	}
	public function get_orders()
	{
		$query=$this->db->query("SELECT * from ordenes");
		return $query->result_array();
	}
	public function get_order_sent($id_orden)
	{
		$query=$this->db->query("SELECT a.id_ordenes,a.id_usuario,a.status,a.amount,a.articulos,a.Tracking_url,a.TrackingNumber,a.label,a.precio_guia,a.fecha,b.estado,b.municipio,b.colonia,b.cp,b.direccion,b.email,b.exterior,b.interior,b.nombre,b.referencia,b.telefono,b.paqueteria,b.servicio FROM ordenes a INNER JOIN envio b ON a.id_envio=b.id_envio WHERE id_ordenes=".$id_orden);
		return $query->result_array();
	}
	public function get_details_order_sizes($idorder)
	{
		$query=$this->db->query("SELECT a.id_detalle_ordenes,c.nombre_categoria,e.nombre_modelo,b.precio,a.quantity, b.color,d.peso,d.Largo,d.Ancho,d.Alto FROM detalle_ordenes a INNER JOIN producto_ b ON a.id_producto=b.id_producto INNER JOIN categorias c ON b.id_categoria=c.id_categoria INNER JOIN modelo e ON b.id_modelo=e.id_modelo INNER JOIN detalle_producto d ON b.id_producto=d.id_producto WHERE id_ordenes=".$idorder);
		return $query->result_array();
	}
	public function generar_guia($data){  
  	$curl = curl_init();
   curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.envia.com/ship/generate/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\n    
      \"origin\": {\n        
        \"name\": \"".$data['name']."\",\n        
        \"company\": \"".$data['company']."\",\n        
        \"email\": \"contacto@bartecmx.com\",\n        
        \"phone\": \"5579755478\",\n        
        \"street\": \"".$data['street']."\",\n        
        \"number\": \"".$data['number']."\",\n        
        \"district\": \"".$data['district']."\",\n        
        \"city\": \"".$data['city']."\",\n        
        \"state\": \" ".$data['state']."\",\n    
        \"country\": \"MX\",\n        
        \"postalCode\": \"".$data['cp']."\",\n       
        \"reference\": \"\"\n    },\n    

      \"destination\": {\n        
        \"name\": \"".$data['name2']."\",\n        
        \"company\": \"".$data['company2']."\",\n        
        \"email\": \"".$data['email']."\",\n        
        \"phone\": \"".$data['phone']."\",\n        
        \"street\": \"".$data['street2']."\",\n        
        \"number\": \"".$data['number2']."\",\n        
        \"district\": \"".$data['district2']."\",\n        
        \"city\": \"".$data['city2']."\",\n        
        \"state\": \" ".$data['state2']."\",\n    
        \"country\": \"MX\",\n        
        \"postalCode\": \"".$data['cp2']."\",\n       
        \"reference\": \"\"\n    },\n        
        \"packages\":".$data['content'].",\n    
        \"shipment\": {\n        
              \"carrier\": \"".$data['carrier']."\",\n   
              \"service\": \"".$data['service']."\",\n   
               \"type\": 1\n    
                 },\n  
        \"settings\": {\n  
              \"printFormat\": \"PDF\",\n   
              \"printSize\": \"STOCK_4X6\",\n 
              \"comments\": \"comentarios\"\n 
 				}\n}",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "Authorization: Bearer 02dc9052483b511b02ebd7eb3ba5c73b1639fa9c87c5cbf1c68c771494b8f338"
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  return json_decode($response);  
}

public function get_same_user($email)
	{
		$query=$this->db->query("SELECT * FROM login_web WHERE username='".$email."'");
		return $query->result_array();
	}
public function cantidad_carrito_producto($iddetalle)
	{
		$query=$this->db->query("SELECT * FROM detalle_carrito WHERE id_detalle_carrito=".$iddetalle);
		return $query->result_array();
	}
}
?>