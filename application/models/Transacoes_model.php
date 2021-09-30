<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transacoes_model extends CI_Model{

    public function get_by_id($transacao_id = NULL)
    {
        $this->db->select([
            'transacoes.*',
            'pedidos.pedido_codigo',
            'CONCAT(clientes.cliente_nome, " ", clientes.cliente_sobrenome) as pedido_cliente_nome',

        ]);

        $this->db->where('transacoes.transacao_id', $transacao_id);

        $this->db->join('clientes', 'clientes.cliente_id = transacoes.transacao_cliente_id', 'LEFT');
        $this->db->join('pedidos','pedidos.pedido_id = transacoes.transacao_pedido_id', 'LEFT'); 

        return $this->db->get('transacoes')->row();
    }

}