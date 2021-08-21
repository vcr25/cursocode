<?php 

defined('BASEPATH') or exit('Ação não permitida');

class Carrinho_compras{

    public function __construct()
    {
        if(!isset($_SESSION['carrinho'])){

            $_SESSION['carrinho'] = [];



        }
    }

    public function insert($produto_id = NULL, $produto_quantidade = NULL )
    {
        //Inserir produto ao carrinho
        if($produto_id && $produto_quantidade){
            if(isset($_SESSION['carrinho'][$produto_id]) ){
                $_SESSION['carrinho'][$produto_id] += $produto_quantidade;
            }else{
                $_SESSION['carrinho'][$produto_id] = $produto_quantidade;
            }
        }
    }

    public function update($produto_id = NULL, $produto_quantidade = NULL)
    {
        //Atualiza a quantidade do produto no carrinho
        if($produto_id && $produto_quantidade && $produto_quantidade > 0){
            $_SESSION['carrinho'][$produto_id] = $produto_quantidade;
        }
    }

    public function delete($produto_id = NULL)
    {
        //Remove o produto do carrinho
        unset($_SESSION['carrinho'][$produto_id]);
    }

    public function clean()
    {
        //Limpa todo o carrinho
        unset($_SESSION['carrinho']);
    }

    public function get_all()
    {
        $CI = & get_instance();

        $CI->load->model('carrinho_model');

        $retorno = array();

        $indice = 0;

        foreach($_SESSION['carrinho'] as $produto_id => $produto_quantidade){
            $query = $CI->carrinho_model->get_by_id($produto_id);

            $retorno[$indice]['produto_id'] = $query->produto_id;
            $retorno[$indice]['produto_nome'] = $query->produto_nome;
            $retorno[$indice]['produto_valor'] = $query->produto_valor;
            $retorno[$indice]['produto_quantidade'] = $produto_quantidade;
            $retorno[$indice]['subtotal']  = number_format($produto_quantidade * $query->produto_valor, 2, '.', '');
            $retorno[$indice]['produto_peso'] = $query->produto_peso;
            $retorno[$indice]['produto_altura'] = $query->produto_altura;
            $retorno[$indice]['produto_largura'] = $query->produto_largura;
            $retorno[$indice]['produto_comprimento'] = $query->produto_comprimento;
            $retorno[$indice]['produto_foto'] = $query->foto_caminho;
            $retorno[$indice]['produto_meta_link'] = $query->produto_meta_link;

            $indice++; 
        }

        return $retorno;
    }

    public function get_total()
    {
        $carrinho = $this->get_all();
        $valor_total_carrinho = 0;

        foreach($carrinho as $indice => $produto){
            $valor_total_carrinho += $produto['subtotal'];
        }

        return number_format($valor_total_carrinho, 2);
    }

    public function get_total_itens()
    {
        $total_itens = count($this->get_all());

        return $total_itens;
    }

    public function get_all_dimensoes()
    {
        $CI = & get_instance();

        $CI->load->model('carrinho_model');

        $retorno = array();

        $indice = 0;

        foreach($_SESSION['carrinho'] as $produto_id => $produto_quantidade){
            $query = $CI->carrinho_model->get_by_id($produto_id);

            $retorno[$indice]['produto_id'] = $query->produto_id;
            $retorno[$indice]['produto_nome'] = $query->produto_nome;
            $retorno[$indice]['produto_valor'] = $query->produto_valor;
            $retorno[$indice]['produto_quantidade'] = $query->produto_quantidade_estoque;
            $retorno[$indice]['subtotal']  = number_format($produto_quantidade * $query->produto_valor, 2, '.', '');
            $retorno[$indice]['produto_peso'] = $query->produto_peso;
            $retorno[$indice]['produto_altura'] = $query->produto_altura;
            $retorno[$indice]['produto_largura'] = $query->produto_largura;
            $retorno[$indice]['produto_comprimento'] = $query->produto_comprimento;
            $retorno[$indice]['produto_foto'] = $query->foto_caminho;
            $retorno[$indice]['produto_meta_link'] = $query->produto_meta_link;
           $retorno[$indice]['produto_dimensao'] = $query->produto_altura + $query->produto_largura + $query->produto_comprimento ;

            $indice++; 
        }

        return $retorno;
    }

    public function get_produto_maior_dimensao()
    {
        $produtos = $this->get_all_dimensoes();

        $maior_produto = null;

        $item = array();

        foreach($produtos as $indice => $produto){
            if($maior_produto == null){
                $maior_produto = $produto['produto_dimensao'];
                $item = $produto ;
            }else{
                if($produto['produto_dimensao'] > $maior_produto){
                    $maior_produto = $produto['produto_dimensao'];
                    $item = $produto;
                }
            }
        }

        return $item;
    }

    public function get_total_pesos()
    {
        $carrinho = $this->get_all();
        $total_pesos = 0;

        foreach($carrinho as $indice => $produto){
            $total_pesos += $produto['produto_peso'] * $produto['produto_quantidade'];
        }

        return $total_pesos;
    }

    


}