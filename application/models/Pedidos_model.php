<?php

defined('BASEPATH') OR exit('Você não tem permissão para estar aqui!');

class Pedidos_model extends CI_Model
{

    public function get_all_pedidos_by_cliente($cliente_user_id = NULL)
    {
        $this->db->select([
            'pedidos.pedido_data_cadastro',
            'pedidos.pedido_codigo',
            'pedidos.pedido_valor_final',
            'clientes.cliente_id',
             'CONCAT(clientes.cliente_nome, " ", clientes.cliente_sobrenome) as pedido_cliente_nome',
            'transacoes.transacao_status as pedido_status',
            'pedidos_produtos.pedido_id',
            'pedidos_produtos.produto_id',
            'pedidos_produtos.produto_nome',
            'produtos.produto_meta_link',
            'produtos_fotos.foto_caminho' 
        ]);

        $this->db->where('pedidos.pedido_cliente_id', $cliente_user_id);

        $this->db->join('clientes', 'clientes.cliente_id = pedidos.pedido_cliente_id');
        $this->db->join('transacoes', 'transacoes.transacao_pedido_id = pedidos.pedido_id');
        $this->db->join('pedidos_produtos', 'pedidos_produtos.pedido_id = pedidos.pedido_id');
        $this->db->join('produtos', 'pedidos_produtos.produto_id = produtos.produto_id');
        $this->db->join('produtos_fotos', 'produtos_fotos.foto_produto_id = pedidos_produtos.produto_id');

        $this->db->group_by('pedidos_produtos.pedido_id');
        $this->db->order_by('pedidos.pedido_data_cadastro', 'DESC'); 

        return $this->db->get('pedidos')->result();

    }

    public function get_all()
    {
        $this->db->select([
            'pedidos.pedido_data_cadastro',
            'pedidos.pedido_codigo',
            'pedidos.pedido_valor_final',
            'clientes.cliente_id',
             'CONCAT(clientes.cliente_nome, " ", clientes.cliente_sobrenome) as pedido_cliente_nome',
            'transacoes.transacao_status as pedido_status',     
        ]);

        $this->db->join('clientes', 'clientes.cliente_id = pedidos.pedido_cliente_id', 'LEFT');
        $this->db->join('transacoes', 'transacoes.transacao_pedido_id = pedidos.pedido_id', 'LEFT');

        $this->db->order_by('pedidos.pedido_data_cadastro', 'DESC'); 

        return $this->db->get('pedidos')->result();

    }


}