<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('text');
	}

    public function index()
    {
        $busca = html_escape($this->input->post('busca'));

        $data = array(
            'titulo' => 'Busca pelo produto'. (!empty($busca) ? $busca : 'Nenhuma busca feita'),
            'termo_digitado' => (!empty($busca) ? $busca : 'Nenhuma busca feita'),
           
        );
        if($busca){
            if($produtos = $this->produtos_model->get_all_by_busca($busca)){
                $data['produtos'] = $produtos;
            }
        }
       

        $this->load->view('web/layout/header', $data);
        $this->load->view('web/busca');
        $this->load->view('web/layout/footer');

        
    }



}


