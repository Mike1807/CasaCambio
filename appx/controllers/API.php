<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Api extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('news_model');
    }

    //API - client sends passport ext and on valid passport ext information is sent back
    function passportByExt_get(){

        $extranjero  = $this->get('extranjero');
        
        if(!$extranjero){

            $this->response("No passport number specified", 400);

            exit;
        }

        $result = $this->news_model->getpassportbyext($extranjero);

        if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid passport number", 404);

            exit;
        }
    } 

 //API - client sends passport mx and on valid passport mx information is sent back
 function passportBymxn_get(){

    $mexicano  = $this->get('mexicano');
    
    if(!$mexicano){

        $this->response("No passport number specified", 400);

        exit;
    }

    $result = $this->news_model->getpassportbymxn($mexicano);

    if($result){

        $this->response($result, 200); 

        exit;
    } 
    else{

         $this->response("Invalid passport number", 404);

        exit;
    }
} 

    //API -  Fetch All passports
    function passports_get(){

        $result = $this->news_model->getallpassports();

        if($result){

            $this->response($result, 200); 

        } 

        else{

            $this->response("No record found", 404);

        }
    }
     
    //API - create a new passport item in database.
    function addpassport_post(){

         $fecha = $this->post('fecha');

         $nombre_completo = $this->post('nombre_completo');

         $pais    = $this->post('pais');

         $email     = $this->post('email');

         $extranjero      = $this->post('extranjero');

         $mexicano  = $this->post('mexicano');

         $moneda_origen  = $this->post('moneda_origen');

         $moneda_cambio  = $this->post('moneda_cambio');

         $cantidad  = $this->post('cantidad');

         $total  = $this->post('total');

        
         if(!$fecha||!$nombre_completo || !$pais || !$email || !$extranjero || !$mexicano || !$moneda_origen || !$moneda_cambio || !$cantidad || !$total ){

                $this->response("Enter complete client information to save", 400);

         }else{

            $result = $this->news_model->add(array("fecha"=>$fecha ,"nombre_completo"=>$nombre_completo, "pais"=>$pais, "email"=>$email, "extranjero"=>$extranjero, "mexicano"=>$mexicano, "moneda_origen"=>$moneda_origen, "moneda_cambio"=>$moneda_cambio, "cantidad"=>$cantidad, "total"=>$total));

            if($result === 0){

                $this->response("client information coild not be saved. Try again.", 404);

            }else{

                $this->response("success", 200);  
           
            }

        }

    }

    
    //API - update a passport 
    function updatepassport_put(){
         
        $fecha = $this->post('fecha');

        $nombre_completo      = $this->post('nombre_completo');

        $email     = $this->post('email');

        $pais    = $this->post('pais');

        $moneda_origen  = $this->post('moneda_origen');

        $cantidad  = $this->post('cantidad');

        $extranjero      = $this->post('extranjero');

        $mexicano  = $this->post('mexicano');
         
        if(!$fecha||!$nombre_completo || !$pais || !$email || !$extranjero || !$mexicano || !$moneda_origen || !$moneda_cambio || !$cantidad || !$total ){

                $this->response("Enter complete client information to save", 400);

         }else{
            $result = $this->news_model->update(array("fecha"=>$fecha ,"nombre_completo"=>$nombre_completo, "pais"=>$pais, "email"=>$email, "extranjero"=>$extranjero, "mexicano"=>$mexicano, "moneda_origen"=>$moneda_origen, "moneda_cambio"=>$moneda_cambio, "cantidad"=>$cantidad, "total"=>$total));

            if($result === 0){

                $this->response("client information coild not be saved. Try again.", 404);

            }else{

                $this->response("success", 200);  

            }

        }

    }

    //API - delete a passport 
    function deletepassport_delete()
    {
        $id  = $this->delete('id');
        if(!$id){
            $this->response("Parameter missing", 404);
        } 
         
        if($this->news_model->delete($id))
        {
            $this->response("Success", 200);
        } 
        else
        {
            $this->response("Failed", 400);
        }
    }

    //API - export passport
    function exportpdf_get()
    {

    $result = $this->news_model->export();

    if($result)
    {
        $this->response($result, 200); 
    } 

    else
    {
        $this->response("No record found", 404);
    }

    }

}