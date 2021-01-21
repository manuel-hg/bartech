<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mcart extends CI_Model{
public function add_cart($iduser,$idproduct,$quantity)
	{
		$sql='SELECT * FROM `carrito` WHERE id_usuario_web = '.$iduser.' AND status = "inprocess"';
		$query=$this->db->query($sql);
		$resultado=$query->result_array();
		if($resultado==null){
			$query=$this->db->query("SELECT precio FROM producto_ WHERE id_producto=".$idproduct);
			$price=$query->result_array();
			foreach ($price as $clave) {
            	$dato=$clave;
          	}
			$dato['precio'];
			$data=array(
				'id_usuario_web'=>$iduser,
				'total_articulos'=>$quantity,
				'total'=>$dato['precio']*$quantity,
				'status'=>'inprocess');
			$this->db->insert('carrito',$data);
			$last_id = $this->db->insert_id();
			$data=array(
				'id_carrito'=>$last_id,
				'product_id'=>$idproduct,
				'quantity'=>$quantity);
			$this->db->insert('detalle_carrito',$data);
			$this->session->set_flashdata('add-product','<script type="text/javascript">
            var cartM = document.getElementById("cartModal");
            cartM.style.display = "block";</script>');
		}else{
			$datox=array();
			$newcant=0;

			//metodo de busqueda si in process or paid
			$query=$this->db->query('SELECT id_carrito FROM carrito WHERE id_usuario_web='.$iduser.' AND status="inprocess"');
			$result=$query->result_array();
			foreach ($resultado as $clave) {
             	$datos=$clave;
           	}
           	$carrito=$datos['id_carrito'];  //id carrito
           	foreach ($resultado as $clave) {
             	$datos=$clave;
           	}
           	$totalant=$datos['total'];     //total de acumulado$$$$$$$$$$$$$$$$$$$4
           	$totalartant=$datos['total_articulos']; //total de articulos en cantidad


           	//busqueda de precio de producto
           	$query=$this->db->query("SELECT precio FROM producto_ WHERE id_producto=".$idproduct);
           	$price=$query->result_array();
         	foreach ($price as $clave) {
            	$dato=$clave;
          	}

          	//cantidad de producto actual de ese item
          	$precio_producto=$dato['precio'];
          	$sql="SELECT quantity FROM detalle_carrito WHERE product_id=".$idproduct;
          	$query=$this->db->query("SELECT quantity FROM detalle_carrito WHERE product_id=".$idproduct);
          	$cantidad=$query->result_array();  
          	foreach ($cantidad as $clave) {
            	$datox=$clave;
          	}


          	if($datox==null){
          		//cantidad 0 
          		$cantidadact=0;					
          		$data=array(
				'id_carrito'=>$carrito,
				'product_id'=>$idproduct,
				'quantity'=>$quantity);				
				$this->db->insert('detalle_carrito',$data);
          	}else{
          		//cantidad +de1
          		$precio_cantidad=$datox['quantity']+$quantity;		
          		$data=array(
				'id_carrito'=>$carrito,
				'product_id'=>$idproduct,
				'quantity'=>$precio_cantidad);
				$this->db->where('product_id', $idproduct);
				$this->db->update('detalle_carrito',$data);
          	}
			$totalant=$totalant+($precio_producto*$quantity);
			echo $totalant;
			$totalartant=$totalartant+$quantity;
			$data_carrito=array(
				'id_usuario_web'=>$iduser,
				'total_articulos'=>$totalartant,
				'total'=>$totalant,
				'status'=>'inprocess');
			$this->db->where('id_usuario_web', $iduser);
			$this->db->update('carrito', $data_carrito);
			$this->session->set_flashdata('add-product','<script type="text/javascript">
            var cartM = document.getElementById("cartModal");
            cartM.style.display = "block";</script>');
		}

	}
	public function delete_carrito($iddetalle,$idproducto,$idcarrito,$quantity)
		{
			$query=$this->db->query("SELECT * FROM carrito WHERE id_carrito=".$idcarrito);
			$carrito=$query->result_array();  
			foreach ($carrito as $clave) {
            	$datos=$clave;
          	}
			$cantidad_actual=$datos['total_articulos'];
			$total_actual=$datos['total'];

			$query=$this->db->query("SELECT precio FROM producto_ WHERE id_producto=".$idproducto);
			$precio=$query->result_array();  
			foreach ($precio as $clave) {
            	$datos=$clave;
          	}
          	$precio=$datos['precio'];
          	$descontar=$quantity*$precio;
          	$final_total=$total_actual-$descontar;
          	$final_cantidad=$cantidad_actual-$quantity;
			$query=$this->db->query("UPDATE carrito SET total_articulos=".$final_cantidad.", total=".$final_total." WHERE id_carrito=".$idcarrito);
          	$this->db->where('id_detalle_carrito', $iddetalle);
			$this->db->delete('detalle_carrito');
		}
		public function findquantity_by_id($data)
		{
			$query=$this->db->query("SELECT * FROM detalle_carrito WHERE id_detalle_carrito=".$data['id_detalle']);
			return $query->result_array();
		}
		public function updatecar($datos,$datas)
		{
			$id_carrito=$datos['id_carrito'];
			$producto=$datos['product_id'];
			$quantity=$datos['quantity'];
			$query=$this->db->query("SELECT minimo FROM inventario WHERE id_producto=".$producto);
			$minimo=$query->result_array();
			foreach ($minimo as $clave) {
            	$data=$clave;
          	}
          	$min=$data['minimo'];
          	if($quantity<$min){
          					$query=$this->db->query("SELECT precio FROM producto_ WHERE id_producto=".$producto);
			$precio=$query->result_array();
			foreach ($precio as $clave) {
            	$data=$clave;
          	}
          	$precio=$data['precio'];
          	$query=$this->db->query("SELECT * FROM carrito WHERE id_carrito=".$id_carrito);
          	$carrito=$query->result_array();
			foreach ($carrito as $clave) {
            	$data=$clave;
          	}
          	$total=$data['total']+$precio;
          	$articulos=$data['total_articulos']+1;

          	//update detalle carrito quantity=quantity++
          	$quantity=$quantity+1;
          $query=$this->db->query("UPDATE detalle_carrito SET quantity=".$quantity." WHERE id_detalle_carrito=".$datas['id_detalle']);
          $query=$this->db->query("UPDATE carrito SET total=".$total." , total_articulos=".$articulos." WHERE id_carrito=".$id_carrito);
          return 1;
          	}else{
          		return 0;
          	}
		}
		public function updatecarr($datos,$datas)
		{
			$id_carrito=$datos['id_carrito'];
			$producto=$datos['product_id'];
			$quantity=$datos['quantity'];
			$query=$this->db->query("SELECT precio FROM producto_ WHERE id_producto=".$producto);
			$precio=$query->result_array();
			foreach ($precio as $clave) {
            	$data=$clave;
          	}
          	$precio=$data['precio'];
          	$query=$this->db->query("SELECT * FROM carrito WHERE id_carrito=".$id_carrito);
          	$carrito=$query->result_array();
			foreach ($carrito as $clave) {
            	$data=$clave;
          	}
          	$total=$data['total']-$precio;
          	$articulos=$data['total_articulos']-1;

          	//update detalle carrito quantity=quantity++
          	$quantity=$quantity-1;
          	if($quantity==0){
          		$this->db->where('id_detalle_carrito', $datas['id_detalle']);
				$this->db->delete('detalle_carrito');
          	}else{
          		$query=$this->db->query("UPDATE detalle_carrito SET quantity=".$quantity." WHERE id_detalle_carrito=".$datas['id_detalle']);
          	}
          $query=$this->db->query("UPDATE carrito SET total=".$total." , total_articulos=".$articulos." WHERE id_carrito=".$id_carrito);
		}

}?>