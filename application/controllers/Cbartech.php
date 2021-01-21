<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbartech extends CI_Controller {

	function __construct(){
        parent:: __construct();
        $this->load->model('mdatos');
        $this->load->model('mcart');
        $this->load->model('mregister');
	}
	
	public function index()
	{
   $datp=null;
	 $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
        }
        else{
         foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          }
          $nombre=$dato['nombre'];
          $count=$this->mdatos->get_count_products($id);
          foreach ($count as $clave) {
            $datp=$clave;
          }
          if($datp==null){
            $data['contador']=0;  
          }else{
            $data['contador']=$datp['total_articulos'];
          }
          $data['nombre']='<a href="miperfil" class="text-center text-white nav-link active">'.$nombre.'</></a>';
        }

		$this->load->view('inicio/nav',$data);
		$this->load->view('inicio/body');
		$this->load->view('inicio/footer');
	}

	public function conocenos()
	{
		$datp=array();
	 $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
        }
        else{
         foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          }
          $nombre=$dato['nombre'];
          $count=$this->mdatos->get_count_products($id);
          foreach ($count as $clave) {
            $datp=$clave;
          }
          if($datp==null){
            $data['contador']=0;  
          }else{
            $data['contador']=$datp['total_articulos'];
          }
          $data['nombre']='<a href="miperfil" class="text-center text-white nav-link active">'.$nombre.'</></a>';
        }

		$this->load->view('conocenos/nav',$data);
		$this->load->view('conocenos/body');
		$this->load->view('inicio/footer');
	}

	public function productos()
	{
		$datp=array();
	 $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
        }
        else{
         foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          }
          $nombre=$dato['nombre'];
          $count=$this->mdatos->get_count_products($id);
          foreach ($count as $clave) {
            $datp=$clave;
          }
          if($datp==null){
            $data['contador']=0;  
          }else{
            $data['contador']=$datp['total_articulos'];
          }
          $data['nombre']='<a href="miperfil" class="text-center text-white nav-link active">'.$nombre.'</></a>';
        }
        $data['categoria']=$this->mdatos->Get_categories();
        $data['productos']=$this->mdatos->Get_products();
		$this->load->view('productos/nav',$data);
		$this->load->view('productos/body');
		$this->load->view('inicio/footer');
	}

	public function asistencia()
	{
		$datp=array();
	 $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
        }
        else{
         foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          }
          $nombre=$dato['nombre'];
          $count=$this->mdatos->get_count_products($id);
          foreach ($count as $clave) {
            $datp=$clave;
          }
          if($datp==null){
            $data['contador']=0;  
          }else{
            $data['contador']=$datp['total_articulos'];
          }
          $data['nombre']='<a href="miperfil" class="text-center text-white nav-link active">'.$nombre.'</></a>';
        }

		$this->load->view('asistencia/nav',$data);
		$this->load->view('asistencia/body');
		$this->load->view('inicio/footer');
	}

	public function preguntas()
	{
		$datp=array();
	 $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
        }
        else{
         foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          }
          $nombre=$dato['nombre'];
          $count=$this->mdatos->get_count_products($id);
          foreach ($count as $clave) {
            $datp=$clave;
          }
          if($datp==null){
            $data['contador']=0;  
          }else{
            $data['contador']=$datp['total_articulos'];
          }
          $data['nombre']='<a href="miperfil" class="text-center text-white nav-link active">'.$nombre.'</></a>';
        }
		$this->load->view('preguntas/nav',$data);
		$this->load->view('preguntas/body');
		$this->load->view('inicio/footer');
	}
	public function producindivi()
	{
		$this->load->view('producindivi/nav');
		$this->load->view('producindivi/body');
		$this->load->view('inicio/footer');	
	}
	public function carrito()
	{
    $datp=array();
   $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
         $data['carrito']=null;
        }
        else{
         foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          }
          $nombre=$dato['nombre'];
          $count=$this->mdatos->get_count_products($id);
          foreach ($count as $clave) {
            $datp=$clave;
          }
          if($datp==null){
            $data['contador']=0;  
          }else{
            $data['contador']=$datp['total_articulos'];
          }
          $data['nombre']='<a href="miperfil" class="text-center text-white nav-link active">'.$nombre.'</></a>';
          $carrito=$this->mdatos->get_id_car($id);
          foreach ($carrito as $clave) {
              $datos=$clave;
            }
          if($carrito==null){
            $data['carrito']=null;
            $data['car']=null;
          }else{
            $idcar=$datos['id_carrito'];
            $data['carrito']=$this->mdatos->get_details_car($idcar);
            $data['car']=$this->mdatos->get_car($idcar);
          }
        }
		$this->load->view('carrito/nav',$data);
		$this->load->view('carrito/body');
		$this->load->view('inicio/footer');	
	}
	public function checkout()
	{
		$this->load->view('checkout/nav');
		$this->load->view('checkout/body');
		$this->load->view('inicio/footer');	
	}

	public function perfil()
	{

    $datos=$this->session->userdata('bartech_logged');  
      if($datos!=null){
       foreach ($datos as $clave) {$dato=$clave;}
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          }
      $data['nombre']=$this->mdatos->get_user_data($id);
      $data['profile']=$this->mdatos->get_user_data($id);
      $data['ordenes']=$this->mdatos->get_order($id);
      $data['orden']=$data['ordenes'];
      $this->load->view('perfil/nav',$data);
      $this->load->view('perfil/body',$data);
      $this->load->view('inicio/footer'); 
    }else{
      redirect('inicio');
    }
		
	}

  public function add_cart2()
  {
      $p=$this->input->post("id_pr");
      $datos=$this->session->userdata('bartech_logged');                
      if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
         $data['carrito']=null;
         $this->session->set_flashdata('add-product','<script>$( document ).ready(function() {var x = document.getElementById("basicExampleModal");x.classList.remove("fade");x.classList.add("show");x.style.display = "block";}); </script>');
          redirect('detalle?id='.$p);
        }else{
        foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $quantity=1;
          $this->mcart->add_cart($id,$p,$quantity);
          $this->session->set_flashdata('add-product','<script>$( document ).ready(function() {var x = document.getElementById("exampleModalCenter");x.classList.remove("fade");x.classList.add("show");x.style.display = "block";}); </script>');
          redirect('detalle?id='.$p);
  }
}
  public function add_cart()
  {
    $datos=$this->session->userdata('bartech_logged');                
      $p=$this->input->post("id_p");
      $q=$this->input->post("quantity");
       if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
         $data['carrito']=null;
         $this->session->set_flashdata('add-product','<script>$( document ).ready(function() {var x = document.getElementById("basicExampleModal");x.classList.remove("fade");x.classList.add("show");x.style.display = "block";}); </script>');
          redirect('detalle?id='.$p);
        }else{
        foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $this->mcart->add_cart($id,$p,$q);
          $this->session->set_flashdata('add-product','<script>$( document ).ready(function() {var x = document.getElementById("exampleModalCenter");x.classList.remove("fade");x.classList.add("show");x.style.display = "block";}); </script>');
          redirect('detalle?id='.$p);
  }
  }

  public function direccion_envio()
      {
       $datp=array();
        $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
          $data['nombre']='<span id="loginBtn" class="moreSpan">Ingresar</>';
          $data['contador']=0;
          $data['carrito']=null;
          $data['car']=null;
          $data['id_usuario_web']=null;
        }else{
         foreach ($datos as $clave) {
            $dato=$clave;
          }
          $id=$dato['id_usuario_web'];
          $name=$this->mdatos->get_user_name($id);
          foreach ($name as $clave) {
            $dato=$clave;
          } 
          $nombre=$dato['nombre'];
          $count=$this->mdatos->get_count_products($id);
          foreach ($count as $clave) {
            $datp=$clave;
          }
           if($datp==null){
              $data['contador']=0;  
            }else{
            $data['contador']=$datp['total_articulos'];
            }
          $data['nombre']='<a href="miperfil" class="lang text-white" id="nav-active">'.$nombre.'</></a>';
          $carrito=$this->mdatos->get_id_car($id);
          foreach ($carrito as $clave) {
              $datos=$clave;
            }
          if($carrito==null){
            $data['carrito']=null;
            $data['car']=null;
          }else{
            $data['id_usuario_web']=$id;
            $idcar=$datos['id_carrito'];
            $data['carrito']=$this->mdatos->get_details_car($idcar);
            $data['car']=$this->mdatos->get_car($idcar);
            $data['direccion']=$this->mdatos->get_direccion($id);
            
          }
          }
      $this->load->view('carrito/nav',$data); 
      $this->load->view('carrito/direccion',$data);   
      $this->load->view('inicio/footer');  
      }

        public function search_direccion()
     {
        $dapt=array();
        $cp=$this->input->post("cp");
        $data = json_decode(file_get_contents('https://api-sepomex.hckdrk.mx/query/info_cp/'.$cp."?type=simplified"), true );
        echo json_encode($data);
        
     }  

     public function upload_image()
    {
      $datos=$this->session->userdata('bartech_logged');  
      if($datos!=null){
      $data['nombre']=$this->input->post("usuario");
      $servidor="http://localhost/bartech/";
      $destino="usuarios/".$_FILES["archivo"]["name"][0];
      $data['destino']=$servidor."".$destino;
    if(move_uploaded_file($_FILES["archivo"]["tmp_name"][0],$destino) ) {
      $x=$this->mdatos->upload_image($data);
      redirect('miperfil');
    }else{
      $reg="<script type='text/javascript'>alert('Error');</script>";
        echo  json_encode($reg);
      }
    }else{
      redirect('inicio');
    }
    }
     public function detalls_envio()
    {
      $datos=$this->session->userdata('bartech_logged');    
    if($datos!=null){
      $id_order=$this->input->post("id_order");
      $result_details=$this->mdatos->get_order_details($id_order);
      echo json_encode($result_details);
    }else{
      redirect('inicio');
    }
    }

    public function get_car()
    {
      $id=$this->input->post("id");
      $carrito=$this->mdatos->get_id_car($id);
          foreach ($carrito as $clave) {
              $datos=$clave;
            }
      $idcar=$datos['id_carrito'];
      $data['carrito']=$this->mdatos->get_car($idcar);
      echo json_encode($data['carrito']);
    }
        public function details_car()
    {
      $id=$this->input->post("id");
      $carrito=$this->mdatos->get_id_car($id);
          foreach ($carrito as $clave) {
              $datos=$clave;
            }
      $idcar=$datos['id_carrito'];
      $data['carrito']=$this->mdatos->get_details_car($idcar);
      echo json_encode($data['carrito']);
    }
     public function admin_pedidos()
    {
      $data['orders']=$this->mdatos->get_orders();
      $this->load->view('admin/nav');
      $this->load->view('admin/admonpedidos',$data);
    }
    public function details_envio()
    {
      $id_order=$this->input->post("id_order");
      $orden=$this->mdatos->get_order_sent($id_order);
      foreach ($orden as $clave) {$result_orden=$clave;}
      $result_details=$this->mdatos->get_order_details($id_order);

      $data['name']="Andres";
      $data['company']="Boss Electrodomesticos";
      $data['street']="Av. Constituyentes";
      $data['number']="3";
      $data['district']="Valle de Oro";
      $data['city']="San Juan del Rio";
      $data['state']="QT";
      $data['cp']=76803;
      $data['referencia']="Bodega";

      $data['email']=$result_orden['email'];
      $data['name2']=$result_orden['nombre'];
      $data['phone']=$result_orden['telefono'];
      $data['company2']=$result_orden['nombre'];
      $data['cp2']=$result_orden['cp'];
      $data['street2']=$result_orden['direccion'];
      $data['number2']=$result_orden['exterior'];
      $data['district2']=$result_orden['colonia'];
      $data['city2']=$result_orden['municipio'];
      $data['state2']=$result_orden['estado'];
      $data['referencia2']=$result_orden['referencia'];
      $data['ext']=$result_orden['exterior'];
      $data['int']=$result_orden['interior'];
      $data['carrier']=$result_orden['paqueteria'];
      $data['service']=$result_orden['servicio'];
      $carrito=$this->mdatos->get_details_order_sizes($id_order);
      $c=count($carrito);
      $x=1;
        $contenido="[\n";
        foreach ($carrito as $carrito) {
            $d="{\n\"content\": \"".$carrito['nombre_categoria']." ".$carrito['nombre_modelo']."\",\n\"amount\":".$carrito['quantity'].",\n\"type\": \"box\",\n\"dimensions\": {\n\"length\":".$carrito['Largo'].",\n\"width\": ".$carrito['Ancho'].",\n\"height\": ".$carrito['Alto']."\n},\n\"weight\": ".$carrito['peso'].",\n\"insurance\": 0,\n\"declaredValue\": ".$carrito['precio'].",\n\"weightUnit\": \"KG\",\n\"lengthUnit\": \"CM\"\n}";
            $contenido .=$d;
            if($x<$c){
              $contenido .=",";
            }
            $x++;
        }
        $contenido .="]";
        $data['content']= $contenido;
        $data['resultado']=$this->mdatos->generar_guia($data); 
        $resultado=$data['resultado'];
        foreach ($resultado as $dato) {
          $arreglo=$dato;
        }
        echo json_encode($arreglo);
        $TrackingNumber=$arreglo[0]->trackingNumber;
        $Tracking_url=$arreglo[0]->trackUrl;
        $label=$arreglo[0]->label;
        $precio_guia=$arreglo[0]->totalPrice;
        $status='en despacho';
        $this->mregister->update_order($id_order,$TrackingNumber,$Tracking_url,$label,$precio_guia,$status);  
        $data['orders']=$this->mdatos->get_orders();
        $this->load->view('admin/nav');
        $this->load->view('admin/admonpedidos',$data);
    }
     public function delete_carrito()
      {
        $detalle=$this->input->post("iddetalle");
        $cantidad_act=$this->mdatos->cantidad_carrito_producto($detalle);
        foreach ($cantidad_act as $clave) {
            $dato=$clave;
          }
        $idproducto=$dato['product_id'];
        $idcarrito=$dato['id_carrito'];
        $quantity=$dato['quantity'];
        $update=$this->mcart->delete_carrito($detalle,$idproducto,$idcarrito,$quantity);
      }
      public function lessone()
    {
       $datos=$this->session->userdata('bartech_logged');  
      if($datos!=null){
      $data['id_detalle']=$this->input->post("idproduct");
      $data['carrito']=$this->input->post("car");
      $detalle=$this->mcart->findquantity_by_id($data);
      foreach ($detalle as $clave) {
              $datos=$clave;
      }
      $update=$this->mcart->updatecarr($datos,$data);
    }else{
      redirect('inicio');
    }}
    public function addone()
    {
       $datos=$this->session->userdata('bartech_logged');  
      if($datos!=null){
      $data['id_detalle']=$this->input->post("idproduct");
      $data['carrito']=$this->input->post("car");
      $detalle=$this->mcart->findquantity_by_id($data);
      foreach ($detalle as $clave) {
              $datos=$clave;
      }
      $update=$this->mcart->updatecar($datos,$data);
      echo json_encode($update);
      if($update==0){
        echo 0;
      }else{
        echo 1;
      }
      }else{
        redirect('inicio');
      }
    }

}
?>