<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
        $this->load->helper('text');
        if(!$this->ion_auth->is_admin()){
            redirect('login');
        }
		
	}

    public function index()
    {
      
        $data = array(
            'titulo' => 'Pedidos Realizados',
            'styles' => array(
                'bundles/datatables/datatables.min.css',
                'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',
             ),
             'scripts' => array (
                 'bundles/datatables/datatables.min.js',
                 'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
                 'bundles/jquery-ui/jquery-ui.min.js',
                 'js/page/datatables.js',
                 
                 
             ),
            'pedidos' => $this->pedidos_model->get_all(),
        );


       /*  echo '<pre>';
        print_r($data['pedidos']);
        exit(); 
 */
        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/pedido/index');
        $this->load->view('restrita/layout/footer');
        
    }

    public function imprimir($pedido_codigo = NULL)
    {
      if(!$pedido_codigo || !$pedido = $this->core_model->get_by_id('pedidos', array('pedido_codigo' => $pedido_codigo))){
        
        $this->session->set_flashdata('erro', 'Não encontramos o pedido');
        redirect('restrita/pedido');

      }else{
        $data = array(
            'titulo' => 'Detelhse do Pedido '.$pedido_codigo,
           
            'pedidos' => $pedido,
        );

        
        $data['pedido_produtos'] = $this->core_model->get_all('pedidos_produtos', array('pedido_id' => $pedido->pedido_id));
         echo '<pre>';
        print_r($data);
        exit(); 
       
        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/pedido/imprimir');
        $this->load->view('restrita/layout/footer');
      }
       
        
    }


}