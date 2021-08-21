<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller
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
        $data = array(
            'titulo' => 'Categorias Cadastradas',
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
            'categorias' => $this->core_model->get_all('categorias'),
        );
     

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/categoria/index');
        $this->load->view('restrita/layout/footer');

      
    }

    public function core($categoria_id = NULL)
    {
        $categoria_id = (int) $categoria_id;


        if(!$categoria_id){
            //cadastrar categoria 

            $this->form_validation->set_rules('categoria_nome', 'Nome da Categoria', 'trim|required|callback_valida_nome');

            if($this->form_validation->run()){

               $data = elements(
                    array(
                    'categoria_nome',
                    'categoria_ativa',
                    'categoria_pai_id', )
                    ,$this->input->post()
                );
                
                //Meta Link
                $data['categoria_meta_link'] = url_amigavel($data['categoria_nome']);
                
                $data = html_escape($data);

                $this->core_model->insert('categorias', $data);
                redirect('restrita/categorias');

            }else{
                //Erro ao validar
                $data = array(
                    'titulo' => 'Cadastrar Categoria',
                    'master' => $this->core_model->get_all('categorias_pai', array('categoria_pai_ativa' => 1)),                    
                    
                );

                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/categoria/core');
                $this->load->view('restrita/layout/footer');
            }
            
        }else{
          

            if(!$cat_pai = $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id) )){
                $this->session->set_flashdata('erro', 'Categoria não encontrada');
                redirect('restrita/categorias');
            }else{

               
                //Editar Categoria Pai
                $this->form_validation->set_rules('categoria_nome', 'Nome da Categoria', 'trim|required|callback_valida_nome');

                if($this->form_validation->run()){

                   //if($this->input->post('categoria_ativa') == 0){
                       //proibir desativação
                    //   if($this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))){
                   //     $this->session->set_flashdata('erro', 'Você não pode destivar essa categoria');
                   //     redirect('restrita/categorias');

                    //   }
                  // }
                  
                   $data = elements(
                        array(
                        'categoria_nome',
                        'categoria_ativa',
                        'categoria_pai_id')
                        ,$this->input->post()
                    );

                    //Meta Link
                    $data['categoria_meta_link'] = url_amigavel($data['categoria_nome']);
                    
                    $data = html_escape($data);
                 
                    $this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));
                    redirect('restrita/categorias');

                }else{
                    //Erro ao validar
                    $data = array(
                        'titulo' => 'Editar Categoria',                    
                        'categorias' => $cat_pai,
                        'master' => $this->core_model->get_all('categorias_pai', array('categoria_pai_ativa' => 1)), 
                    );

                    //echo '<pre>';
                    // print_r($data['categorias_pai']);
                    //exit();

                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/categoria/core');
                    $this->load->view('restrita/layout/footer');
                }
                
            }
        }
    }

    public function valida_nome($categoria_nome)
    {
        $cat_pai_id = (int) $this->input->post('categoria_id');
        
        if(!$cat_pai_id){
            //Cadastrando 
            if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome))){
                $this->form_validation->set_message('valida_nome', 'Já existe essa categoria');
                return false;
            }else{
                return true;
            }
        }else{
            //Editando
            if($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome, 'categoria_id !=' => $cat_pai_id))){
                $this->form_validation->set_message('valida_nome', 'Já existe essa categoria');
                return false;
            }else{
                return true;
            }
        }
    }

    public function delete($categoria_id = NULL)
    {
        $categoria_id = (int) $categoria_id;

        if(!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))){
           $this->session->set_flashdata('erro', 'Essa Categoria  não existe');
            redirect('restrita/categorias');
        }

        if($this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id, 'categoria_ativa' => 1))){
            $this->session->set_flashdata('erro', 'Essa Categoria não pode ser excluida');
             redirect('restrita/categorias');
        }

        $this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
        redirect('restrita/categorias');
        
    }
}