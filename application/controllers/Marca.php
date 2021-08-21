<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('text');
	}

    public function index($marca_meta_link = NULL)
    {
        if(!$marca_meta_link || !$marca = $this->core_model->get_by_id('marcas', array('marca_meta_link' => $marca_meta_link))){

            redirect('/');

        }else{
            $data = array(
                'titulo' => 'Produtos da Marca'. $marca->marca_nome,
                'marca' => $marca->marca_nome,
                'produtos' => $this->produtos_model->get_all_by(array('marca_meta_link' => $marca_meta_link)),
            );

           
            //echo '<pre>';
            //print_r($data);
            //exit();


            $this->load->view('web/layout/header', $data);
            $this->load->view('web/marca');
            $this->load->view('web/layout/footer');
        }
    }



}


