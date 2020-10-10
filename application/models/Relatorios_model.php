<?php
class Relatorios_model extends CI_Model {


    /**
     * author: Ramon Silva 
     * email: silva018-mg@yahoo.com.br
     * 
     */
    
    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }



    public function descargaCustom($dataInicial = null,$dataFinal = null,$unidade = null,$status = null){
        $whereData = "";
        $whereUnidade = "";
        $whereStatus = "";
        if($dataInicial != null){
            $whereData = "AND Data_chegada BETWEEN ".$this->db->escape($dataInicial)." AND ".$this->db->escape($dataFinal);
        }
        if($cliente != null){
            $whereUnidade = "AND uniadade = ".$this->db->escape($unidade);
        }
        if($status != null){
            $whereStatus = "AND status = ".$this->db->escape($status);
        }
       
    }

}