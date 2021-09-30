<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transacoes extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

        $this->load->helper('text');

        if(!$this->ion_auth->is_admin()){
            redirect('restrita/login');
        }
		
	}

    public function index()
    {
        $data = array(
            'titulo' => 'Transações realizadas',
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
            'transacoes' => $this->core_model->get_all('transacoes'),
        );


        /* echo '<pre>';
        print_r($data['transacoes']);
        exit();  */

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/transacoes/index');
        $this->load->view('restrita/layout/footer');
    }

    public function view($transacao_id = NULL)
    {
        $transacao_id = (int) $transacao_id;

        if(!$transacao_id || !$transacao = $this->transacoes_model->get_by_id($transacao_id)){
            $this->session->set_flashdata('erro', 'Transação não encontrada');
            redirect('restrita/transacoes');
        }else{
            $data = array(
                'titulo' => 'Detalhe da Transação',
                
                'transacao' => $transacao
            );
    
    
           /*  echo '<pre>';
            print_r($data['transacao']);
            exit();  */
    
            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/transacoes/view');
            $this->load->view('restrita/layout/footer');
        }
       
    }

}