<?php
/**
 * Description of Produto_model
 *
 * @author rafael
 */
class Log_model extends CI_Model {
    
  public $id_log;
  public $id_alterado;
  public $data;
  
    public function __construct() {
        parent::__construct();
    }
 
    public function inserir_log(){
        return $this->db->insert('Log', $this);
    }
    


    
}
?>