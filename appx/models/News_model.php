<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_news($slug = FALSE)
        {
        if ($slug === FALSE)
        {
                $query = $this->db->get('clientes');
                return $query->result_array();
        }

        $query = $this->db->get_where('clientes', array('slug' => $slug));
        return $query->row_array();
        }
        
        public function set_news()
        {
            $this->load->helper('url');
        
            $slug = url_title($this->input->post('title'), 'dash', TRUE);
        
            $data = array(
                'fecha' =>$this->input->post('fecha'),
                'nombre_completo' =>$this->input->post('nombre_completo'),
                'pais' =>$this->input->post('pais'),
                'slug' => $slug,
                'email' =>$this->input->post('email'),
                'extranjero' =>$this->input->post('extranjero'),
                'mexicano' =>$this->input->post('mexicano'),
                'moneda_origen' =>$this->input->post('moneda_origen'),
                'moneda_cambio' =>$this->input->post('moneda_cambio'),
                'cantidad' =>$this->input->post('cantidad'),
                'total' =>$this->input->post('total')

            );
        
            return $this->db->insert('clientes', $data);
        }

//API call - get a client by passport ext
public function getpassportbyext($extranjero){  

        $this->db->select('fecha, id, nombre_completo, pais, email, moneda_origen, cantidad, moneda_cambio, total, extranjero, mexicano');

        $this->db->from('clientes');

        $this->db->where('extranjero',$extranjero);

        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {

            return $query->result_array();

        }
        else
        {

          return 0;

       }

   }
//API call - get a client by passport mx
public function getpassportbymxn($mexicano){  

        $this->db->select('fecha, id, nombre_completo, pais, email, moneda_origen, cantidad, moneda_cambio, total, extranjero, mexicano');

        $this->db->from('clientes');

        $this->db->where('mexicano',$mexicano);

        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {

            return $query->result_array();

        }
        else
        {

          return 0;

       }

   }

 //API call - get all passports record
 public function getallpassports(){   

     $this->db->select('fecha, id, nombre_completo, pais, extranjero, mexicano, moneda_origen, cantidad, moneda_cambio, total');

     $this->db->from('clientes');

     $this->db->order_by("id", "nombre_completo"); 

     $query = $this->db->get();

     if($query->num_rows() > 0){

       return $query->result_array();

     }else{

       return 0;

     }

 }

//API call - delete a passport record
 public function delete($id){

    $this->db->where('id', $id);

    if($this->db->delete('clientes')){

       return true;

     }else{

       return false;

     }

}

//API call - add new passport record
 public function add($data){

     if($this->db->insert('clientes', $data)){

        return true;

     }else{

        return false;

     }

 }
 
 //API call - update a passport record
 public function update($id, $data){

    $this->db->where('id', $id);

    if($this->db->update('clientes', $data)){

       return true;

     }else{

       return false;

     }

 }

 //API - export passport
 public function export()
 {
    require_once "mpdf/mpdf.php";
	require_once "php/conectari.php";
		
	$mysqli = conectar();

        $cabecera = "<span><b>Datos de cliente</b></span>";
		$pie = "<span align='center'>
		
		<img aligne='middle' src='C:/xampp/htdocs/CasaCambio/img/OEA-Transparente.png' width='100px' height='50px'/>.......
		<i>Casa de Cambio... version alpha 1.0</i>
		 - <i>Creado ".date("d/m/Y")."</i>.......
		 
		</span>";
		$mpdf=new mPDF();
        $mpdf->SetHTMLHeader($cabecera);
        $mpdf->SetHTMLFooter($pie);

        $sql = "SELECT * FROM  clientes";                       
        $resultado = $mysqli -> query($sql);

        $mpdf->WriteHTML('<table stylle="overflow: auto" class="table-hover table-responsive table-striped">
            <tr>
			<th>FECHA</th>
			<th>ID</th>
			<th>NOMBRE</th>
            <th>MONEDA DE ORIGEN</th>
            <th>MONEDA DE CAMBIO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
            </tr>',2);
        while ($fila = $resultado -> fetch_array()){
			
            $mpdf->WriteHTML('
            	<tr>
                    <td>' .$fila['fecha'] .'</td>
                    <td>' .$fila['id'] .'</td>
                    <td>' .$fila['nombre_completo'] .'</td>
					<td>' .$fila['moneda_origen'] .'</td>
					<td>' .$fila['moneda_cambio'] .'</td>
					<td>' .$fila['cantidad'] .'</td>
					<td>' .$fila['total'] .'</td>
                </tr>
                ', 2);
		}
		
        $mpdf->WriteHTML('</table>',2);           
		$file=$mpdf->Output('','S');
		$file_base64=base64_encode($file);
		$data=[
				'filename'=>'',
				'file_data'=>$file_base64
			  ];	  
		echo json_encode($data);
        exit;
 }

}