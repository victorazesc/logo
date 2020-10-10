<?php 

class Aniversariantes_model extends CI_model {
    
    
    public function BuscaAniversariantes()
{   
    $this->db->select('Matricula,Nome');
    $results = $this->db->get('A_associa')->result();
    $list = array();
    foreach ($results as $result) 
    {
        $list[$result->Matricula] = $result->Nome;                
    }
    return $list;
}
    

}
?>