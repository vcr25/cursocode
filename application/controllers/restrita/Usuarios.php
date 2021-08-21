<?php   

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Sessão Válida
        if(!$this->ion_auth->logged_in()){
            redirect('restrita/login');
        }
    }

    public function index()
    {
        $data = array(
            'titulo' => 'Usuários Cadastrados',
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
            'usuarios' => $this->ion_auth->users()->result(),
        );

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/usuarios/index');
        $this->load->view('restrita/layout/footer');
       
    }

    public function core($usurio_id = NULL)
    {
        $usuario = $this->ion_auth->user($usurio_id)->row();
        $usurio_id = (int) $usurio_id;

        if (!$usurio_id){

            //Cadastrar o Usuário
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('first_name', 'Nome', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|callback_valida_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirma', 'Confirma', 'trim|required|matches[password]');

            if($this->form_validation->run()){
                    
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                $additional_data = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'active' => $this->input->post('active'),
                            );
                $group = array('1'); // Add ao grupo como administrador ou cliente.
                   
                if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
                    $this->session->set_flashdata('sucesso', 'Usuário Cadastrado com sucesso!');
                }else{
                    $this->session->set_flashdata('erro', $this->ion_auth->erros());
                }

                redirect('restrita/usuarios');
            //FIM DO CADASTRO DE USUÁRIO

            }else{

                //Erro ao cadastrar usuário
                $data = array(
                    'titulo' => 'Cadastrar Usuário',
                 
                   
                    'grupos' =>  $this->ion_auth->groups()->result(),
    
                );
                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/usuarios/core');
                $this->load->view('restrita/layout/footer');
    
            }


           
        }else{
            //Verefica o usuário
            if(!$usuario){
               $this->session->set_flashdata('erro', 'Usuário não foi encontrado');
               redirect('restrita/usuarios');

            }else{
                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required');
                $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|callback_valida_email');
                $this->form_validation->set_rules('password', 'Password', 'trim');
                $this->form_validation->set_rules('confirma', 'Confirma', 'trim|matches[password]');

                if($this->form_validation->run()){
                    
                   // echo '<pre>';
                   // print_r($this->input->post());
                   // echo '</pre>';
                   // exit();

                   $data = elements(
                       array(
                           'username',
                           'first_name',
                           'last_name',
                           'email',
                           'password',
                           'active'
                       ), $this->input->post()
                  );
                   /*
                  * Não atualiza a senha caso o usuário não a informe.
                  */
                  $password = $this->input->post('password');

                  if(!$password){
                      unset($data['password']);
                  }
                  /*
                  * Sanitizando o $data
                  */
                  $data = html_escape($data);
                 
                   /*
                  * Atualiza o Usuário
                  */
                  if($this->ion_auth->update($usurio_id, $data)){

                    $perfil = (int) $this->input->post('perfil');

                    if($perfil){
                        $this->ion_auth->remove_from_group(NULL, $usurio_id);
                        $this->ion_auth->add_to_group($perfil, $usurio_id);
                    }

                    $this->session->set_flashdata('sucesso', 'Usuário atualizado com sucesso!');
                  }else{
                    $this->session->set_flashdata('erro', $this->ion_auth->erros());
                  }

                  redirect('restrita/usuarios');

                }else{
                    //Erro ao validar a edição do usuário
                    $data = array(
                        'titulo' => 'Editar Usuário',
                        'usuario' => $usuario,
                        'perfil' => $this->ion_auth->get_users_groups($usurio_id)->row(),
                        'grupos' =>  $this->ion_auth->groups()->result(),
    
                    );
    
                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/usuarios/core');
                    $this->load->view('restrita/layout/footer');
                }

               
            }

           

        }
    }

    public function valida_email($email)
    {
        $usurio_id = $this->input->post('usuario_id');

        if(!$usurio_id){
            //Cadastrar Usuário
            if($this->core_model->get_by_id('users', array('email' => $email))){
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe');
                return false;
            }else{
                return true;
            }
        }else{
            //Editar Usuário
            if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usurio_id))){
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe');
                return false;
            }else{
                return true;
            }
        }
    }

    public function delete($usurio_id = NULL)
    {
        $usurio_id = (int) $usurio_id;

        if(!$usurio_id || !$this->ion_auth->user($usurio_id)->row() ){
            $this->session->set_flashdata('erro', 'Usuário não encontrado');
            redirect('restrita/usuarios');

        }else{
            if($this->ion_auth->is_admin($usurio_id)){
                $this->session->set_flashdata('erro', 'Você não pode exculuir esse usuário');
                redirect('restrita/usuarios');
            }

            if($this->ion_auth->delete_user($usurio_id)){
                $this->session->set_flashdata('sucesso', 'Usuário deletado com Sucesso!');
               
            }else{
                $this->session->set_flashdata('erro', $this->ion_auth->erros());
            }

            redirect('restrita/usuarios');
        } 
    }
}