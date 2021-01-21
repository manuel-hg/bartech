<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bartech extends CI_Controller {
	function __construct(){
        parent:: __construct();
        $this->load->model('mdatos');
        $this->load->model('mregister');
  }
   public function login()
  {
  		$data=array();
        $email=$this->input->post("email");
        $password=md5($this->input->post("password"));
        $pagina=$this->input->post("pagina");
        if($email==""||$password==""||$pagina==""){
        	redirect('inicio');
        }else{
        if($pagina=="productos"){
          $data['categoria']=$this->mdatos->Get_categories();
          $data['productos']=$this->mdatos->Get_products();
        }
        if(!empty($_POST)) {
          $logged_user = $this->mdatos->get_login($email,$password);
          if($logged_user) {
            $this->session->set_userdata('bartech_logged', $logged_user);
            redirect($pagina);
          } else {
            $data['nombre']='<a class="nav-link" href="sesion" data-toggle="modal" data-target="#basicExampleModal"><i class="fas fa-user"></i>Iniciar sesión
                  <span class="sr-only">(current)</span>';
            $data['contador']=0;
             echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>jQuery(function(){swal("Verifique su correo y contraseña!", "Si aun no esta registrado, favor de realizarlo", "error");});</script>';
          }
        }
            $this->load->view($pagina."/nav",$data);
            $this->load->view($pagina."/body");
            $this->load->view("inicio/footer");
       }
  }
   public function register_user()
  {
    $datos["nombre"]=$this->input->post("name_uss");
    $datos["apellido"]=$this->input->post("lastname_uss");
    $datos["email"]=$this->input->post("email");    
    $email=$this->input->post("email");   
    $datos["telefono"]=$this->input->post("telefono");    
    $datos["password"]=md5($this->input->post("clave"));
    $password=$this->input->post("clave");   
    $datos["id_privilegios"]=2;
    $val_user=$this->mdatos->get_same_user($datos['email']);
    if($val_user!=null){
      echo json_encode(1);
    }else{      
      $this->mregister->register_usuarios_web($datos);

      $logged_user = $this->mdatos->get_login($email,$password);
      if($logged_user) {
      $this->session->set_userdata('bartech_logged', $logged_user);
      echo json_encode(0);
      }
    }
  }
   public function logout() {
	    $this->session->unset_userdata('bartech_logged');
	    redirect('inicio');
	  }
   public function detalle()
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
        $detalle=$this->input->get("id");
        $data['producto']=$this->mdatos->set_product($detalle);
        $data['detalle']=$this->mdatos->set_detail($detalle);
        $data['inventario']=$this->mdatos->set_inventario($detalle);
        $this->load->view('producindivi/nav',$data);
		$this->load->view('producindivi/body',$data);
		$this->load->view('inicio/footer');	
   }
      public function cotizar()
    { 
      $datos=$this->session->userdata('bartech_logged');                
      foreach ($datos as $clave) {
            $dato=$clave;
          }
      $id=$dato['id_usuario_web'];
      $facturar=$this->input->post("facturar");
      if($facturar==1){
        $data['razonsocial']=$this->input->post("ffiscal");
        $data['rfc']=$this->input->post("frfc");
        $data['domiciliofiscal']=$this->input->post("fdomicilio");
        $data['cfdi']=$this->input->post("fcfdi");
        $data['id_usuario_web']=$dato['id_usuario_web'];
        $this->mregister->facturar_($data);
      }
      $datos=array();
      $v=$this->input->post("estado");
      $datax=file_get_contents('http://queries.envia.com/state?country_code=MX');
      $datax=json_decode($datax, JSON_UNESCAPED_UNICODE);
        foreach ($datax as $clave) {$datos=$clave;}
        foreach ($datos as $datos) {
        if($datos['name']==$v){
            $estado2=$datos['code_2_digits'];
      }}


      $data['email']=$this->input->post("email_receptor");
      $data['name2']=$this->input->post("nombre_receptor")." ".$this->input->post("apellidos_receptor");
      $data['phone']=$this->input->post("rtelefono");
      $data['company2']=$data['name2']=$this->input->post("nombre_receptor")." ".$this->input->post("apellidos_receptor");
      $data['cp2']=$this->input->post("c12Postal");
      $data['street2']=$this->input->post("direccion_entrega");
      $data['number2']=$this->input->post("no_ext")." ".$this->input->post("no_int");
      $data['district2']=$this->input->post("colonia");
      $data['city2']=$this->input->post("municipio");
      $data['state2']=$estado2;
      $data['referencia2']=$this->input->post("informacion_adicional")."  ".$this->input->post("adicional2");
      $data['ext']=$this->input->post("no_ext");
      $data['int']=$this->input->post("no_int");
      $this->mregister->envio_temporal($data,$id);

      $data['carrier']='scm';
      $data['name']="Andres";
      $data['company']="Boss Electrodomesticos";
      $data['street']="Av. Constituyentes";
      $data['number']="3";
      $data['district']="Valle de Oro";
      $data['city']="San Juan del Rio";
      $data['state']="QT";
      $data['cp']=76803;
      $data['referencia']="Bodega";
      $carrito=$this->mdatos->get_details_car_sizes($this->input->post("col_md"));
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
      $data['scm']=$this->mdatos->cotiza($data);     
      $data['carrier']='fedex';
      $data['fedex']=$this->mdatos->cotiza($data);

      $data['carrier']='estafeta';
      $data['estafeta']=$this->mdatos->cotiza($data);

      $data['carrier']='carssa';
      $data['carssa']=$this->mdatos->cotiza($data);

      $data['carrier']='redpack';
      $data['redpack']=$this->mdatos->cotiza($data);

      $data['carrier']='redpack';
      $data['redpack']=$this->mdatos->cotiza($data);
      $this->load->view('carrito/envio',$data);

    }
    public function en_temp()
    {
     $data['id_usuario']=$this->input->post("id_usuario");
     $data['paqueteria']=$this->input->post("paqueteria");
     $data['servicio']=$this->input->post("servicio");
     $this->mregister->servicio_temporal($data);
    }
    public function confirmacion()
    {      
       $datos=$this->session->userdata('bartech_logged');                
        if($datos==null){
         $data['nombre']=null;
         $data['contador']=0;
        }else{
          if($this->input->get('amt')){
        
      foreach ($datos as $clave) {$dato=$clave;}
      $id=$dato['id_usuario_web'];
      $carrito=$this->mdatos->get_id_car($id);
          foreach ($carrito as $clave) {
              $datos=$clave;
            }
      $idcar=$datos['id_carrito'];
      $amount=$this->input->get('amt');
      $method=$this->input->get("metodo");
      $carrito=$this->mdatos->get_details_car($idcar);
      $car=$this->mdatos->get_car($idcar);
      $this->mdatos->new_order($carrito,$car,$amount,$method);
      $data['confirmacion'][]=$this->input->get('amt');
      $data['confirmacion'][]=$this->input->get('cc');
      $data['confirmacion'][]=$this->input->get('st');
      $data['confirmacion'][]=$this->input->get('tx');
      $this->load->view('carrito/confirmaciondepago',$data);
      } else{
       redirect('miperfil');
        
      }
    }
}
  public function sent_mail(){
      $dato['nombre']=$this->input->post("rnombre");
      $dato['telefono']=$this->input->post("rtelefono");
      $dato['info']=$this->input->post("riadicional");
      $config = array(                
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );
    $html='<html lang="en">
          <head>
          </head>
          <body>
            <h3>Contacto desde sitio Web Bartech</h3>
            <br>
            <p>Se ha registrado un correo de '. $dato['nombre'] .' </p>
            <p>Su telefono es: '. $dato['telefono'] .' </p>
            <p>La informacion adicional es: '. $dato['info'] .' </p>
          </body>
          </html>';
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
  $this->email->from('norepply@bartecmx.com', 'Contacto Web Bartech');
  $this->email->to('manuelh.programador@bartecmx.com');
    $this->email->subject('Mensaje de web');
  $this->email->message($html);
  if ($this->email->send()) {
  $this->session->set_flashdata('mailok','<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script>jQuery(function(){swal("Correo enviado!", "Pronto nos pondremos en contacto contigo", "success");});</script>');
  }else{
   $this->session->set_flashdata('mailok','<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script>jQuery(function(){swal("Ha ocurrido un error", "Intente nuevamente", "error");});</script>');
  }
  redirect('preguntas-frecuentes');
  }
  public function update()
    {
     $data['id_usuario_web']=$this->input->post("col_id");
     $data['nombre']=$this->input->post("nombre");
     $data['apellido']=$this->input->post("apellido");
     $data['telefono']=$this->input->post("telefono");
     $password=md5($this->input->post("passwr"));
     $this->mdatos->update_user($data,$password);
     redirect('miperfil');
    }

    public function update_direccion()
    {
      $data['id_usuario_web']=$this->input->post("col_md_id");
      $data['cp']=$this->input->post("cp");
      $data['direccion']=$this->input->post("calle");
      $data['no_ext']=$this->input->post("no_ext");
      $data['no_int']=$this->input->post("no_int");
      $data['colonia']=$this->input->post("colonia");
      $data['municipio']=$this->input->post("municipio");
      $data['estado']=$this->input->post("estado");
      $data['entrecalles']=$this->input->post("entrecalles");
      $data['info_adicional']=$this->input->post("info_adicional");
      $this->mdatos->update_direccion($data);
      redirect('miperfil');
    }

}
?>

