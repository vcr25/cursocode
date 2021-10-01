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

    public function atualizar($transacao_codigo_hash = NULL)
    {
        $url_check = "https://ws.sandbox.pagseguro.uol.com.br/";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url_check);

        $xml = curl_exec($curl);


        if($xml != 'OK'){
            $this->session->set_flashdata('erro', 'A URL' . $url_check. ' não está disponível, tente novamente mais tarde');
            redirect('restrita/transacoes');
        }else{

            $config_pageseguro = $this->core_model->get_by_id('config_pagseguro', array('config_id'=> 1));

            $parametros = array(
                'email' => $config_pageseguro->config_email,
                'token' => $config_pageseguro->config_token,
            );

            $parametros = http_build_query($parametros);

            if($transacao_codigo_hash){
                if(!$transacao = $this->core_model->get_by_id('transacoes', array('transacao_codigo_hash' => $$transacao_codigo_hash))){
                    $this->session->set_flashdata('erro', 'Transação não encontrada');
                    redirect('restrita/transacoes');
                }else{

                    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transaction/'.$transacao->transacao_codigo_hash. '?'.$parametros;

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_URL, $url);
            
                    $xml = curl_exec($curl);
                    $xml = simplexml_load_string($xml);

                    $transacao_status = $xml->status;

                    if($transacao->transacao_status != $transacao_status){

                        $data = array(
                            'transacao_status' => $transacao_status
                        );

                        $this->core_model->update('transacoes', $data, array('transacao_codigo_hash' => $transacao_codigo_hash));
                        redirect('restrita/transacoes');
                    }else{
                        $this->session->set_flashdata('sucesso', 'Transação já atualizada');
                        redirect('restrita/transacoes');
                    }
                }

               
            }else{

            }
        }
    }

}