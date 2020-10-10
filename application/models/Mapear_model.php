<?php
/**
 * Description of Produto_model
 *
 * @author rafael
 */
class Mapear_model extends CI_Model {
    

  public $edi;
  public $motivo;
  
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir(){
        return $this->db->insert('Mapeamento', $this);
    }
    
     
    
}
?>