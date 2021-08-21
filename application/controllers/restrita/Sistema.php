<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller
{

    public function __construct()
    {
         
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect('restrita/login');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('sistema_razao_social', 'Razão Social', 'trim|required');

        if($this->form_validation->run()){
           $data = elements(
            array(
                'sistema_razao_social',
                'sistema_nome_fantasia',
                'sistema_cep',
                'sistema_cidade',
                'sistema_email',
                'sistema_telefone_fixo',
                'sistema_endereco',
                'sistema_estado'
            ), $this->input->post()
        );

        //$data['sistema_estado'] = strtoupper($data['sistema_estado']);
        //$data = html_escape($data);

        $this->core_model->update('sistema', $data, array('sistema_id' => 1));

        redirect('restrita/sistema');

        }else{
            $data = array(
                'titulo' => 'Dados da Loja',
                'scripts' => array(
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ),
                'sistema' =>  $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),
            );
          
         
            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/sistema/index');
            $this->load->view('restrita/layout/footer');
        }

       


    }

    public function correios()
    {

        $this->form_validation->set_rules('config_cep_origem', 'CEP de Origim', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('config_codigo_pac', 'Codigo serviço PAC', 'trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_codigo_sedex', 'Codigo do SEDEX', 'trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_somar_frete', 'Valor adicional do Frete', 'trim|required');
        $this->form_validation->set_rules('config_valor_declarado', 'Valor Declarado', 'trim|required');
        
        if($this->form_validation->run()){
           $data = elements(
            array(
                'config_cep_origem',
                'config_codigo_pac',
                'config_codigo_sedex',
                'config_somar_frete',
                'config_valor_declarado',
            ), $this->input->post()
        );

        //$data['sistema_estado'] = strtoupper($data['sistema_estado']);
        //$data = html_escape($data);


        $data['config_somar_frete'] = str_replace(',', '', $data['config_somar_frete'] );
        $data['config_valor_declarado'] = str_replace(',', '', $data['config_valor_declarado'] );
        $data = html_escape($data);

        $this->core_model->update('config_correios', $data, array('config_id' => 1));

        redirect('restrita/sistema/correios');

        }else{
            $data = array(
                'titulo' => 'Dados do Correios',
                'scripts' => array(
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ),
                'correios' =>  $this->core_model->get_by_id('config_correios', array('config_id' => 1)),
            );
          
         
            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/sistema/correios');
            $this->load->view('restrita/layout/footer');
        }

       
    }

    public function pagseguro()
    {
        $this->form_validation->set_rules('config_email', 'EMAIL do PagSeguro', 'trim|required|valid_email');
        $this->form_validation->set_rules('config_token', 'Token', 'trim|required');
        
        if($this->form_validation->run()){
           $data = elements(
            array(
                'config_email',
                'config_token',
                'config_ambiente',
                
            ), $this->input->post()
        );

        $data = html_escape($data);

        $this->core_model->update('config_pagseguro', $data, array('config_id' => 1));

        redirect('restrita/sistema/pagseguro');

        }else{
            $data = array(
                'titulo' => 'Dados do PagSeguro',
                'pagseguro' =>  $this->core_model->get_by_id('config_pagseguro', array('config_id' => 1)),
            );
          
         
            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/sistema/pagseguro');
            $this->load->view('restrita/layout/footer');
        }

    }

}