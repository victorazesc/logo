<?php
/**
 * Description of Users Controller
 *
 * @author Team TechArise
 *
 * @email info@techarise.com
 **/
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Vigilante extends CI_Controller {
   
  public function __construct() {
      parent::__construct();
      $this->load->model('Users_model', 'user');
      date_default_timezone_set('America/Sao_Paulo');
      function data($data){
         return date("d/m/Y", strtotime($data));}

  }
  // Dashboard
 	public function index(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Vigilante_model', '', TRUE);
 
            if($this->input->post('acao') == 'inserir'){
                $this->Vigilante_model->n_cartao = $this->input->post('n_cartao');
                $this->Vigilante_model->data_entrada = date("Y-m-d");
                $this->Vigilante_model->hora_entrada = date("H:i:s");
                $this->Vigilante_model->sentido = 'ENTRADA';
                
                
                $n_cartao = $this->input->post('n_cartao');
                $n_cartao_e = "";
                
                $ver_n_cartao = $this->db->query("SELECT * FROM entrada_funcionarios WHERE n_cartao = '$n_cartao' ");
                foreach( $ver_n_cartao->result() as $row){   
                $n_cartao_e = $row->n_cartao;
                 }
                 
                if($n_cartao == $n_cartao_e){
                     
                   $hora_saida = date("H:i:s"); 
                    
                   $this->db->query("UPDATE entrada_funcionarios SET hora_saida = '$hora_saida', sentido = 'SAIDA' WHERE n_cartao ='$n_cartao' and sentido = 'ENTRADA'; ");
                     
                   $dados['msg'] = '
                    <div class="alert alert-success"><span class="icon-slash"></span> Saida Efetuada.</div>';
                }
            
               else{
                
                if($this->Vigilante_model->inserir()){
                    $dados['msg'] = '

<div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> A entrada foi adicionada a Grade.</div>
                    
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao inserir evento!</p>';
                }
            }}
 
            $this->template->load('vigilante/template','vigilante/relatorio', $dados);
	}}
    
    
}
