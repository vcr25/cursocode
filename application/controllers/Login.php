<?php   

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
   
    public function index()
    {
        $data = array(
            'titulo' => 'Login Cliente',
        );
      
        $this->load->view('web/layout/header', $data);
        $this->load->view('web/login');
        $this->load->view('web/layout/footer');
    }

    public function auth()
    {
        //print_r($this->input->post());
        //exit();

        $identity = $this->input->post('email');
        $password = $this->input->post('password');
        $remember = ($this->input->post('remember' ? TRUE : FALSE));

        $login = $this->input->post('login');

        if($this->ion_auth->login($identity, $password, $remember)){
           // $this->session->set_flashdata('sucesso', 'Bem Vindo(a)!');
           if($this->ion_auth->is_admin()){
            redirect('restrita');
           }else{
               if($login == 'login'){
                redirect('/'); 
               }else{
                redirect('checkout');
               }
            
           }
           
        }else{
            $this->session->set_flashdata('erro', 'Senha ou Email inválidos !');
            if($login == 'login'){
                redirect('login'); 
               }else{
                redirect('checkout');
               }
            
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
       
        redirect('/');
       
      
    }
}