<?php
/**
 * Description of Produto_model
 *
 * @author rafael
 */
class Entradas_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir(){
        return $this->db->insert('Entradas', $this);
    }
        public function inserir_pedestre(){
        return $this->db->insert('entrada_pedestres', $this);
    }
    
      public function pesquisar(){
         $termo = $this->input->post('id_descarga');
         $this->db->select('*');
         $this->db->like('$termo');
         return $this->db->get('Eventos')->return();
    }
    
        public function getEventos()
    {
        return $this->db->get('Eventos')->result();
    }

    
    public function atualizar(){
        $this->db->where('id_entrada', $this->input->post('id_entrada'));   
        return $this->db->update('Entradas', $this);
    }
    // Function to Delete selected record from table name students.
    
public function delete_descarga(){
$this->db->where('id_descarga', $this->input->get('id_descarga') );
$this->db->delete('Eventos');
}

    
}
?>