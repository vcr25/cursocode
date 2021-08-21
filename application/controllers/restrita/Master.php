<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller
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
            'titulo' => 'Categorias pai Cadastradas',
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
            'categorias_pai' => $this->core_model->get_all('categorias_pai'),
        );
       
        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/master/index');
        $this->load->view('restrita/layout/footer');
    }

    public function core($categoria_pai_id = NULL ) 
    {
        $categoria_pai_id = (int) $categoria_pai_id;


        if(!$categoria_pai_id){
            //cadastrar categoria pai

            $this->form_validation->set_rules('categoria_pai_nome', 'Nome da Categoria', 'trim|required|callback_valida_nome');

            if($this->form_validation->run()){

               $data = elements(
                    array(
                    'categoria_pai_nome',
                    'categoria_pai_ativa')
                    ,$this->input->post()
                );

                //Meta Link
                $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);
                
                $data = html_escape($data);

                $this->core_model->insert('categorias_pai', $data);
                redirect('restrita/master');

            }else{
                //Erro ao validar
                $data = array(
                    'titulo' => 'Cadastrar Categoria Pai',                    
                    
                );

                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/master/core');
                $this->load->view('restrita/layout/footer');
            }
            
        }else{
            
            if(!$cat_pai = $this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id) )){
                $this->session->set_flashdata('erro', 'Categoria pai não encontrada');
                redirect('restrita/master');
            }else{
                //Editar Categoria Pai
                $this->form_validation->set_rules('categoria_pai_nome', 'Nome da Categoria', 'trim|required|callback_valida_nome');

                if($this->form_validation->run()){

                   if($this->input->post('categorias_pai_ativa') == 0){
                       //proibir desativação
                       if($this->core_model->get_by_id('categorias', array('categoria_pai_id' => $categoria_pai_id))){
                        $this->session->set_flashdata('erro', 'Você não pode desativar essa categoria');
                        redirect('restrita/master');

                       }
                   }
                  
                   $data = elements(
                        array(
                        'categoria_pai_nome',
                        'categoria_pai_ativa')
                        ,$this->input->post()
                    );

                    //Meta Link
                    $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);
                    
                    $data = html_escape($data);

                    $this->core_model->update('categorias_pai', $data, array('categoria_pai_id' => $categoria_pai_id));
                    redirect('restrita/master');

                }else{
                    //Erro ao validar
                    $data = array(
                        'titulo' => 'Editar Categoria Pai',                    
                        'categorias_pai' => $cat_pai
                    );

                    //echo '<pre>';
                    // print_r($data['categorias_pai']);
                    //exit();

                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/master/core');
                    $this->load->view('restrita/layout/footer');
                }
                
            }
        }


        
    }

    public function valida_nome($categoria_pai_nome)
    {
        $cat_pai_id = (int) $this->input->post('categoria_pai_id');
        
        if(!$cat_pai_id){
            //Cadastrando 
            if($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nome' => $categoria_pai_nome))){
                $this->form_validation->set_message('valida_nome', 'Já existe essa categoria');
                return false;
            }else{
                return true;
            }
        }else{
            //Editando
            if($this->core_model->get_by_id('categorias_pai', array('categoria_pai_nome' => $categoria_pai_nome, 'categoria_pai_id !=' => $cat_pai_id))){
                $this->form_validation->set_message('valida_nome', 'Já existe essa categoria');
                return false;
            }else{
                return true;
            }
        }
    }

    public function delete($categoria_pai_id = NULL)
    {
        $categoria_pai_id = (int) $categoria_pai_id;

        if(!$categoria_pai_id || !$this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id))){
           $this->session->set_flashdata('erro', 'Essa Categoria pai não existe');
            redirect('restrita/master');
        }

        if($this->core_model->get_by_id('categorias_pai', array('categoria_pai_id' => $categoria_pai_id, 'categoria_pai_ativa' => 1))){
            $this->session->set_flashdata('erro', 'Essa Categoria pai não pode ser excluida');
             redirect('restrita/master');
        }

        $this->core_model->delete('categorias_pai', array('categoria_pai_id' => $categoria_pai_id));
        redirect('restrita/master');
        
    }

}