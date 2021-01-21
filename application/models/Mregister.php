<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mregister extends CI_Model  {

	public function register_usuarios_web($datos)
	{
		$data=array(
			'nombre' => $datos['nombre'],
			'apellido' => $datos['apellido'],
			'telefono' => $datos['telefono']);
		$this->db->insert('usuario_web',$data);
		$query=$this->db->query("SELECT * FROM usuario_web ORDER BY id_usuario_web DESC LIMIT 1");
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$dato=$clave;}		
		$datas=array(
			'username' => $datos['email'],
			'password' => $datos['password'],
			'id_privilegios' => $datos['id_privilegios'],
			'id_usuario_web' => $dato['id_usuario_web']);
		$this->db->insert('login_web',$datas);
	}
	public function facturar_($datos)
	{	
		$dato=array();
		$query=$this->db->query("SELECT id_facturacion FROM facturacion_temporal WHERE id_usuario_web=".$datos['id_usuario_web']);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$dato=$clave;}
		$data=array(
			'id_usuario_web' => $datos['id_usuario_web'],
			'razonsocial'=>$datos['razonsocial'],
			'rfc'=>$datos['rfc'],
			'domiciliofiscal'=>$datos['domiciliofiscal'],
			'cfdi'=>$datos['cfdi'],
			'estatus'=>0);

		if($arreglo==null){
		$this->db->insert('facturacion_temporal',$data);
		}else{
			$this->db->where('id_facturacion', $dato['id_facturacion']);
			$this->db->update('facturacion_temporal',$data);
		}
	}
	public function add_address($data)
	{
		$query=$this->db->query("SELECT * FROM `direcciones` WHERE id_usuario_Web=".$data['id_usuario_web']);
		$arreglo=$query->result_array();
		if($arreglo!=null){
			$this->db->where('id_usuario_web', $data['id_usuario_web']);
			$this->db->update('direcciones',$data);
		}else{
			$this->db->insert('direcciones',$data);
		}

	}
	public function envio_temporal($data,$id)
	{
		$dato=array();
		$query=$this->db->query("SELECT id_envio_temporal FROM envio_temporal WHERE id_usuario_web=".$id);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$dato=$clave;}
		$dat=array(
			'id_usuario_web' => $id,
			'email'  => $data['email'],
			'nombre' => $data['name2'],
			'telefono' => $data['phone'],
			'cp' => $data['cp2'],
			'direccion' => $data['street2'],
			'exterior' => $data['ext'],
			'interior' => $data['int'],
			'colonia' => $data['district2'],
			'municipio' => $data['city2'],
			'estado' => $data['state2'],
			'referencia' => $data['referencia2']);
		if($arreglo!=null){
			$this->db->where('id_usuario_web', $dat['id_usuario_web']);
			$this->db->update('envio_temporal',$dat);
		}else{
			$this->db->insert('envio_temporal',$dat);
		}
	}
	public function servicio_temporal($data)
	{
		$dato=array();
		$query=$this->db->query("SELECT id_servicio_temporal FROM servicio_temporal WHERE id_usuario=".$data['id_usuario']);
		$arreglo=$query->result_array();
		foreach ($arreglo as $clave) {$dato=$clave;}
		if($arreglo!=null){
			$this->db->where('id_usuario',$data['id_usuario']);
			$this->db->update('servicio_temporal',$data);
		}else{
			$this->db->insert('servicio_temporal',$data);
		}
	}
	public function update_order($id_order,$TrackingNumber,$Tracking_url,$label,$precio_guia,$status)
	{
		$data=array(
			'TrackingNumber'=>$TrackingNumber,
			'Tracking_url'=>$Tracking_url,
			'label'=>$label,
			'precio_guia'=>$precio_guia,
			'status'=>$status);
		$this->db->where('id_ordenes',$id_order);
		$this->db->update('ordenes',$data);
	}
}?>
