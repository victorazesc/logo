<?php
/**
 * Description of Produto_model
 *
 * @author rafael
 */
class Vigilante_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir(){
        return $this->db->insert('entrada_funcionarios', $this);
    }
    
      public function pesquisar(){
         $termo = $this->input->post('id_descarga');
         $this->db->select('*');
         $this->db->like('$termo');
         return $this->db->get('Eventos')->return();
    }
    

    public function atualizar(){
        $this->db->where('id_entrada', $this->input->post('id_entrada'));   
        return $this->db->update('entrada_funcionarios', $this);
    }
  
    
}
?>