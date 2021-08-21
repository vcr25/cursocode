<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar extends CI_Controller{


    public function __construct()
    {
        parent::__construct();

        $this->load->library('user_agent');
    }


    public function index ()
    {
        redirect('/');
    }

    public function pag_seguro_session_id()
    {
        if(!$this->input->is_ajax_request()){
            exit('Ação não permitida ');
        }

        $config_pagseguro = $this->core_model->get_by_id('config_pagseguro', array('config_id' => 1));

        if($config_pagseguro->config_ambiente == 1){
            $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions"; //sandbox
        }else{
            $url = "https://ws.pagseguro.uol.com.br/v2/sessions"; //produtivo
        }

        //Parametros para a url

        $parametros = array(
            'email' => $config_pagseguro->config_email,
            'token' => $config_pagseguro->config_token,
        );

        //Iniciando a API do Pagseguro
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        //Count do parametro
        curl_setopt($ch, CURLOPT_POST, count($parametros));
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parametros));

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Agente que está requisitando a API
        curl_setopt($ch, CURLOPT_USERAGENT, $this->agent->agent_string());


        if($config_pagseguro->config_ambiente == 1){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE); // SSL pode estar desabilitado
        }else{
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,TRUE);
        }

        $result = curl_exec($ch);

        curl_close($ch);

        $xml = simplexml_load_string($result);
        $json = json_encode($xml);
        $session = json_decode($json, TRUE);

        $retorno = array();

        //Caso tenha iniciado a sessão corretamente
        if($session['id']){

            $retorno['erro'] = 0;
            $retorno['session_id'] = $session['id'];

        }else{
            //Caso não tenha iniciado a sessão corretamente 
            $retorno['erro'] = 5;
            $retorno['mensagem'] = 'Erro ao criar a sessão, tente mais tarde';
        }

        header('Content-Type: application/json');
        echo json_encode($retorno);

    }

    public function boleto()
    {
        if(!$this->input->is_ajax_request()){
            exit('Ação não permitida');
        }

          $this->form_validation->set_rules('cliente_nome', 'Nome', 'trim|required|min_length[4]|max_length[40]');
          $this->form_validation->set_rules('cliente_sobrenome', 'Sobrenome', 'trim|required|min_length[4]|max_length[140]');
          $this->form_validation->set_rules('cliente_data_nascimento', 'Data de Nascimento', 'trim|required');
          $this->form_validation->set_rules('cliente_cpf', 'CPF do cliente', 'trim|required|exact_length[14]|callback_valida_cpf');
          $this->form_validation->set_rules('cliente_email', 'Email', 'trim|required|valid_email|callback_valida_email');

         
          $this->form_validation->set_rules('cliente_telefone_movel', 'Telefone', 'trim|required|callback_valida_telefone_movel');
          $this->form_validation->set_rules('cliente_cep', 'CEP', 'trim|required');
          $this->form_validation->set_rules('cliente_endereco', 'Logradouro', 'trim|required');
          $this->form_validation->set_rules('cliente_numero_endereco', 'Número', 'trim|required');
          $this->form_validation->set_rules('cliente_bairro', 'Bairro', 'trim|required');
          $this->form_validation->set_rules('cliente_cidade', 'Cidade', 'trim|required');
          $this->form_validation->set_rules('cliente_estado', 'Estado', 'trim|required');
         

          $this->form_validation->set_rules('cliente_senha', 'Senha', 'trim|required|min_length[6]|max_length[200]');
          $this->form_validation->set_rules('cliente_confirmacao', 'Confirma', 'trim|matches[cliente_senha]');

          $this->form_validation->set_rules('opcao_frete_carrinho', 'Frete', 'trim|required');

          //Variável para menssagem de retorno
          $retorno = array();

          if($this->form_validation->run()){
            //Continua o processamento para criar o usuario/cliente

            $data = elements(
                array(
                    'cliente_nome',
                    'cliente_sobrenome',
                    'cliente_data_nascimento',
                    'cliente_cpf',
                    'cliente_email',
                    'cliente_telefone_movel',
                    'cliente_cep',
                    'cliente_endereco',
                    'cliente_numero_endereco',
                    'cliente_bairro',
                    'cliente_cidade',
                    'cliente_estado',
                ),$this->input->post()
            );

            $data = html_escape($data);

            // echo '<pre>';
           //  print_r($data);
            // exit();

            $this->core_model->insert('clientes', $data, TRUE);
            $cliente_user_id = $this->session->userdata('last_id');

            //Incio da criação do Usuário
            $username = $this->input->post('cliente_nome');
            $password = $this->input->post('cliente_senha');
            $email = $this->input->post('cliente_email');

            $dados_usuario = array(
                'cliente_user_id' => $cliente_user_id,
                'first_name' => $this->input->post('cliente_nome'),
                'last_name' => $this->input->post('cliente_sobrenome'),
                'phone' => $this->input->post('cliente_telefone_movel'),
                'active' => 1,
            );
            $group = array('2'); // Add ao grupo como cliente.

            if($this->ion_auth->register($username, $password, $email, $dados_usuario, $group)){
                $retorno['erro'] = 0;
                $retorno['mensagem'] = 'Usuário do cliente criado';
            }else{
                $retorno['erro'] = 05;
                $retorno['mensagem'] = 'Erro ao criar o cliente antes do  pagamento';
            }

          }else{
            //Erro na validação
            $retorno['erro'] = 3;
            $retorno['cliente_nome'] = form_error('cliente_nome');
            $retorno['cliente_sobrenome'] = form_error('cliente_sobrenome');
            $retorno['cliente_data_nascimento'] = form_error('cliente_data_nascimento');
            $retorno['cliente_cpf'] = form_error('cliente_cpf');
            $retorno['cliente_email'] = form_error('cliente_email');
            $retorno['opcao_frete_carrinho'] = form_error('opcao_frete_carrinho');
            $retorno['cliente_telefone_movel'] = form_error('cliente_telefone_movel');
            $retorno['cliente_cep'] = form_error('cliente_cep');
            $retorno['cliente_endereco'] = form_error('cliente_endereco');
            $retorno['cliente_numero_endereco'] = form_error('cliente_numero_endereco');
            $retorno['cliente_bairro'] = form_error('cliente_bairro');
            $retorno['cliente_cidade'] = form_error('cliente_cidade');
            $retorno['cliente_estado'] = form_error('cliente_estado');
            $retorno['cliente_senha'] = form_error('cliente_senha');
            $retorno['cliente_confirmacao'] = form_error('cliente_confirmacao');

            echo json_encode($retorno);

            exit();

          }

         // echo json_encode($retorno);

         //Depois que o Cliente e Usuário criado

        if(!$cliente = $this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_user_id))){
            $retorno['erro'] = 6;
            $retorno['mensagem'] = 'Cliente não encontrado';
            exit();
        }else{
            //Cliente encontrado


            //verifica o hash gerado
            $hash_pagamento = $this->input->post('hash_pagamento');

            if(!$hash_pagamento){
                $retorno['erro'] = 7;
                $retorno['mensagem'] = 'Hash do cliente não foi gerado';
                exit();
            }else{
                //Hash gerado

                //Pegar informações do cliente
                $cliente_id = $cliente->cliente_id;
                $nome_comprador = remove_acentos($cliente->cliente_nome. ' ' .$cliente->cliente_sobrenome);
                $cpf_comprador = str_replace('.', '', $cliente->cliente_cpf);
                $cpf_comprador = str_replace('-', '', $cpf_comprador);
                $email_comprador = $cliente->cliente_email;
                $telefone_comprador = $cliente->cliente_telefone_movel;
                $cep_comprador = str_replace('-', '', $cliente->cliente_cep);
                $endereco_comprador = remove_acentos($cliente->cliente_endereco);
                $endereco_numero_comprador = $cliente->cliente_numero_endereco;
                $bairro_comprador = remove_acentos($cliente->cliente_bairro);
                $cidade_comprador = remove_acentos($cliente->cliente_cidade);
                $estado_comprador = $cliente->cliente_estado;

                $opcao_frete_carrinho = explode('|', $this->input->post('opcao_frete_carrinho'));
                $opcao_frete_carrinho_valor = $opcao_frete_carrinho[0]; // pega o valor do frete.
                $opcao_frete_carrinho_servico = $opcao_frete_carrinho[1]; //pega a opção do frete, sedex ou pac

                $config_pagseguro = $this->core_model->get_by_id('config_pagseguro', array('config_id' => 1));
                $pagar_pedido ['email'] = $config_pagseguro->config_email;
                $pagar_pedido ['token'] = $config_pagseguro->config_token;

                $pagar_pedido['paymentMode'] = 'default';
                $pagar_pedido['paymentMethod'] = 'boleto';
                $pagar_pedido['receiverEmail'] = $config_pagseguro->config_email;
                $pagar_pedido['currency'] = 'BRL';
                $pagar_pedido['extraAmount'] = '';

                $pedido_codigo = $this->core_model->generete_unique_code('pedidos', 'numeric', 8, 'pedido_codigo');
                $pagar_pedido['reference'] = $pedido_codigo;


                $pagar_pedido['senderName'] = $nome_comprador;
                $pagar_pedido['senderCPF'] = $cpf_comprador;
                $pagar_pedido['senderAreaCode'] = substr($telefone_comprador, 1, 2);
                $pagar_pedido['senderPhone'] = trim(str_replace('-', '', substr($telefone_comprador, 4, 15)));
                $pagar_pedido['senderEmail'] = ($config_pagseguro->config_ambiente == 1 ? 'c48778984456215698729@sandbox.pagseguro.com.br' : $email_comprador);

                $pagar_pedido['shippingAddressStreet'] = $endereco_comprador;
                $pagar_pedido['shippingAddressNumber'] = $endereco_numero_comprador;
                $pagar_pedido['shippingAddressDistrict'] = $bairro_comprador;
                $pagar_pedido['shippingAddressPostalCode'] = $cep_comprador;
                $pagar_pedido['shippingAddressCity'] = $cidade_comprador;
                $pagar_pedido['shippingAddressState'] = $estado_comprador;
                $pagar_pedido['shippingAddressCountry'] = 'BRA';

                $pagar_pedido['shippingType'] = ($opcao_frete_carrinho_servico = '04510' ? 1 : 2);
                $pagar_pedido['shippingCost'] = number_format($opcao_frete_carrinho_valor, 2, '.', '');


                $carrinho = $this->carrinho_compras->get_all();

                $contador = 1;
                foreach($carrinho as $indice => $produto){
                    $pagar_pedido['itemId'. $contador] = $produto['produto_id'];
                    $pagar_pedido['itemDescription'. $contador] = remove_acentos($produto['produto_nome']);
                    $pagar_pedido['itemAmount'. $contador] = number_format($produto['produto_valor'], 2, '.', '');
                    $pagar_pedido['itemQuantity'. $contador] = $produto['produto_quantidade'];
                }


                $pagar_pedido['senderHash'] = $hash_pagamento;

                //Inicio da requisição de pagamento
                if($config_pagseguro->config_ambiente == 0){
                    //Carrega a URL para ambiente produtivo
                  $url = 'https://ws.pagseguro.uol.com.br/v2/transactions';
                }else{
                    //Carrega a URL para ambiente sandbox - teste
                    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';
                }

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_POST, count($pagar_pedido));
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($pagar_pedido));
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                curl_setopt($ch, CURLOPT_USERAGENT, $this->agent->agent_string());


                if($config_pagseguro->config_ambiente == 0){
                    //É obrigado a verficação do SSL

                 // $url = 'https://ws.pagseguro.uol.com.br/v2/transactions';
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
                }else{
                    //Não precisa verificar o SSL
                    //$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                }

                $result = curl_exec($ch);

                curl_close($ch);

                $xml = simplexml_load_string($result);

                $json = json_encode($xml);

                $transaction = json_decode($json);

                //Verifica se houve erro na transação

                if(isset($transaction->error->code)){
                    $this->core_model->delete('clientes', array('cliente_id' => $cliente_id));

                    $retorno['erro'] = $transaction->error->code;
                    $retorno['mensagem'] = 'Houve um erro na transação';
                    exit();
                }

                //Caso não tenha nenhum erro na transação
                if(isset($transaction->code)){
                
                //Salva os dados da transação no banco

                $pedido = array(
                    'pedido_cliente_id' => $cliente->cliente_id,
                    'pedido_codigo' => $pedido_codigo,
                    'pedido_valor_produtos' => str_replace(',', '', $this->carrinho_compras->get_total()),
                    'pedido_valor_frete' => number_format($opcao_frete_carrinho_valor, 2, '.', ''),
                    'pedido_valor_final' => str_replace(',', '', $this->carrinho_compras->get_total()) + $opcao_frete_carrinho_valor,
                    'pedido_forma_envio' => ($opcao_frete_carrinho_servico == '04510' ? 1 : 2),
                );

                //Inserir os dados pedido na tabela pedidos

                $this->core_model->insert('pedidos', $pedido, TRUE);

                //Ultimo id inserido na tabela pedidos
                $pedido_id = $this->session->userdata('last_id');

                foreach ($carrinho as $indice => $produto){
                    $pedido = array(
                        'pedido_id' => $pedido_id,
                        'produto_id' => $produto['produto_id'],
                        'produto_nome' => $produto['produto_nome'],
                        'produto_quantidade' => $produto['produto_quantidade'],
                        'produto_valor_unitario' => $produto['produto_valor'],
                        'produto_valor_total' => $produto['subtotal'],
                    );

                    $this->core_model->insert('pedidos_produtos', $pedido);
                }


                //Inserir os dados na tabela transações
                $transacao = array(
                    'transacao_pedido_id' => $pedido_id,
                    'transacao_cliente_id' => $cliente->cliente_id,
                    'transacao_codigo_hash' => $transaction->code,
                    'transacao_tipo_metodo_pagamento' => $transaction->paymentMethod->type,
                    'transacao_codigo_metodo_pagamento' => $transaction->paymentMethod->code,
                    'transacao_link_pagamento' => $transaction->paymentLink,
                    'transacao_valor_bruto' => $transaction->grossAmount,
                    'transacao_valor_taxa_pagseguro' => $transaction->feeAmount,
                    'transacao_valor_liquido' => $transaction->netAmount,
                    'transacao_numero_parcelas' => $transaction->installmentCount,
                    'transacao_valor_parcela' => $transaction->grossAmount,
                    'transacao_status' => $transaction->status,
                );

                
                $this->core_model->insert('transacoes', $transacao);
                /*  FIM da inserção dos dados da transação */

                $retorno['erro'] = 0;
                $retorno['code'] = $transaction->code;
                $retorno['forma_pagamento'] = $this->input->post('forma_pagamento');
                $retorno['mensagem'] = 'Seu pedido foi realizado com sucesso';
                $retorno['pedido_gerado'] = $pedido_codigo;
                $retorno['transacao_link_pagamento'] = $transaction->paymentLink;
                $retorno['cliente_nome_completo'] = $cliente->cliente_nome . '' . $cliente->cliente_sobrenome;


                /* Gravamos na sessão os dados do pedido para mostrar para o cliente */

                $this->session->set_userdata('pedido_realizado', $retorno);



                /* Limpar o carrinho de compras  */
                $this->carrinho_compras->clean();

                }

                 /* Retorna os dados para o JS  */
                echo json_encode($retorno);

            }
        }

    }

    public function valida_cpf($cpf)
    {

        if ($this->input->post('cliente_id')) {

            $cliente_id = $this->input->post('cliente_id');

            if ($this->core_model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'O campo {field} já existe, ele deve ser único');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c); //Se PHP version < 7.4, $cpf{$c}
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) { //Se PHP version < 7.4, $cpf{$c}
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    public function valida_telefone_fixo($cliente_telefone_fixo)
    {
        $cliente_id = $this->input->post('cliente_id');

        if(!$cliente_id){
            //Cadastrar

            if($this->core_model->get_by_id('clientes', array('cliente_telefone_fixo' => $cliente_telefone_fixo))){
                
                $this->form_validation->set_message('cliente_telefone_fixo', 'Esse número de telefone já está sendo utilizado');

                return FALSE;
            }else{
                return true;
            }
            
        }else{
            //Editar
            if($this->core_model->get_by_id('clientes', array('cliente_telefone_fixo' => $cliente_telefone_fixo, 'cliente_id !=' => $cliente_id))){
                
                $this->form_validation->set_message('cliente_telefone_fixo', 'Esse número de telefone já está sendo utilizado');

                return FALSE;
            }else{
                return true;
            }
        }
    }

    public function valida_telefone_movel($cliente_telefone_movel)
    {
        $cliente_id = $this->input->post('cliente_id');

        if(!$cliente_id){
            //Cadastrar

            if($this->core_model->get_by_id('clientes', array('cliente_telefone_movel' => $cliente_telefone_movel))){
                
                $this->form_validation->set_message('cliente_telefone_movel', 'Esse número de telefone já está sendo utilizado');

                return FALSE;
            }else{
                return true;
            }
            
        }else{
            //Editar
            if($this->core_model->get_by_id('clientes', array('cliente_telefone_movel' => $cliente_telefone_movel, 'cliente_id !=' => $cliente_id))){
                
                $this->form_validation->set_message('cliente_telefone_movel', 'Esse número de telefone já está sendo utilizado');

                return FALSE;
            }else{
                return true;
            }
        }
    }

    public function valida_email($cliente_email)
    {
        $cliente_id = $this->input->post('cliente_id');

        if(!$cliente_id){
            //Cadastrar Usuário
            if($this->core_model->get_by_id('clientes', array('cliente_email' => $cliente_email))){
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe');
                return false;
            }else{
                return true;
            }
        }else{
            //Editar Usuário
            if($this->core_model->get_by_id('clientes', array('cliente_email' => $cliente_email, 'cliente_id !=' => $cliente_id))){
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe');
                return false;
            }else{
                return true;
            }
        }
    }
}