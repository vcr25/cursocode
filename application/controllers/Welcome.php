<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('text');
	}
	public function index()

	{
		$sistema = info_header_footer();

		$data = array(
			'titulo' => 'Seja muito bem vindo(a) á ' . $sistema->sistema_nome_fantasia,
			'produtos_destaques' => $this->loja_model->get_produto_destaque($sistema->sistema_produtos_destaques),

			//'sistema' => $sistema
			//'produto' => $produto,
			//'fotos_produto' => $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $produto_id)),
			//'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
			//'marcas' => $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
		);

		

		$this->load->view('web/layout/header', $data);
		$this->load->view('web/index');
		$this->load->view('web/layout/footer');
	}

	
}
