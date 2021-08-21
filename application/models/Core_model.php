<?php

defined('BASEPATH') OR exit('Você não tem permissão para estar aqui!');

class Core_model extends CI_Model
{
    public function get_all($tabela = NULL, $condicoes = NULL)
    {
        if($tabela && $this->db->table_exists($tabela)){
            if(is_array($condicoes)){
                $this->db->where($condicoes);
            }

            return $this->db->get($tabela)->result();
        }else{
            return false;
        }
    }

    public function get_by_id($tabela = NULL, $condicoes = NULL)
    {
        if($tabela && $this->db->table_exists($tabela) && is_array($condicoes)){
            $this->db->where($condicoes);
            $this->db->limit(1);

            return $this->db->get($tabela)->row();
        }else{
            return false;
        }

    }

    public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL)
    {
        if($tabela && $this->db->table_exists($tabela) && is_array($data)){
            
            $this->db->insert($tabela, $data);
            
            //Insere na sessão o último ID inserido na base de dados.
            if($get_last_id){
                $this->session->set_userdata('last_id', $this->db->insert_id());
            }

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sucesso', 'Dados Salvos com sucesso');
            }else{
                $this->session->set_flashdata('erro', 'Não foi possivel salvar os dados');
            }
        }else{
            return false;
        }
    }

    public function update($tabela = NULL, $data = NULL, $condicoes = NULL)
    {
        if($tabela && $this->db->table_exists($tabela) && is_array($data) && is_array($condicoes)){
            if($this->db->update($tabela, $data, $condicoes)){
                $this->session->set_flashdata('sucesso', 'Dados Atualizados com sucesso');
            }else{
                $this->session->set_flashdata('erro', 'Não foi possivel atualizar os dados');
            }
        }else{
            return false;
        }
    }

    public function delete($tabela = NULL, $condicoes = NULL)
    {
        if($tabela && $this->db->table_exists($tabela) && is_array($condicoes)){
            if($this->db->delete($tabela, $condicoes)){
                $this->session->set_flashdata('sucesso', 'Dados Excluidos com sucesso');
            }else{
                $this->session->set_flashdata('erro', 'Não foi possivel excluir os dados');
            } 
        }else{
            return false;
        }
    }

    public function generete_unique_code($tabela = NULL, $tipo_codigo= NULL, $tamanho_codigo = NULL, $campo_procura)
    {
        do{
            $codigo = random_string($tipo_codigo, $tamanho_codigo);
            $this->db->where($campo_procura, $codigo);
            $this->db->from($tabela);
        }while($this->db->count_all_results() >= 1);

        return $codigo;
    }
}

