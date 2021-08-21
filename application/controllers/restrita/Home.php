<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
        $usuario_id = $this->session->userdata('user_id');

        $user = $this->ion_auth->user($usuario_id)->row();

        $data['usuario'] = $user;

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/home/index');
        $this->load->view('restrita/layout/footer');
    }
}