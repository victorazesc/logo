<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends CI_Controller {
   
  public function __construct() {
      parent::__construct();
      $this->load->model('Users_model', 'user');
      date_default_timezone_set('America/Sao_Paulo');
  }
  // Dashboard
  public function index()
  {
    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
          $data['title'] = 'Dashboard - Tech Arise';
          $data['metaDescription'] = 'Dashboard';
          $data['metaKeywords'] = 'Dashboard';
          $this->user->setUserID($this->session->userdata('user_id'));
          $data['userInfo'] = $this->user->getUserInfo();
          $this->template->load('users/template','users/dashboard', $data);
      }
  }
  
  //Usuarios
  
  
	public function Usuarios(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else { 
            
            if($_SESSION['email'] == 'victor.azevedo'){
                
            //inserir usuario
            
            $dados = array();
            
           if($this->input->post('acao') == 'inserir'){
            
            $name = $this->input->post('nome');
            $sobrenome = $this->input->post('sobrenome');
            $email = $this->input->post('email');
            $senha = 'abcd1234';
            $md5 = md5($senha);
            $status = $this->input->post('status');
            $email_e = "";
            $ver_usuario = $this->db->query("SELECT * FROM users WHERE '$email' = email ");
            foreach($ver_usuario->result() as $row){   
                $email_e = $row->email;
            }
            
                if($email == $email_e){
                   $dados['msg'] = '
                    <div class="alert alert-danger">Usuario já existe.</div>';
                }else{
          
         
            $inserir_usuario = $this->db->query("INSERT INTO users (name,sobrenome,email,password,status)
            VALUES ('$name', '$sobrenome', '$email', '$md5','$status' );");
            
                if($inserir_usuario){
                    $dados['msg'] = '
                    <div class="alert alert-success"><strong>Perfeito! </strong> A descarga e todo seu processo foi excluido.</div>';
                }else{
                    $dados['msg'] = '
                    <div class="alert alert-danger">Erro ao excluir descarga.</div>';
                }
             }}
             
             //fim inserção
             
             
                  
            //editar usuario
            
           if($this->input->post('acao') == 'editar'){
            
            $name = $this->input->post('nome');
            $sobrenome = $this->input->post('sobrenome');
            $id = $this->input->post('id');
            $senha = $this->input->post('senha');
            $md5 = md5($senha);
            $status = $this->input->post('status');
           
            $editar_usuario = $this->db->query(" UPDATE users SET name = '$name', sobrenome = '$sobrenome', password = '$md5', status = '$status' WHERE user_id = $id; ");
            
                if($editar_usuario){
                    $dados['msg'] = '
                    <div class="alert alert-success"><strong>Perfeito! </strong> O usuario foi editado com sucesso </div>';
                }else{
                    $dados['msg'] = '
                    <div class="alert alert-danger">Erro ao editar usuario.</div>';
                }
             }
             
             //fim edição
             
             //editar usuario
            
           if($this->input->post('acao') == 'excluir'){
       
            $id = $this->input->post('id');
          
            $deleta_usuario = $this->db->query(" DELETE FROM users WHERE user_id = $id; ");
            
                if($deleta_usuario){
                    $dados['msg'] = '
                    <div class="alert alert-success"><strong>Perfeito! </strong> O usuario foi excluido</div>';
                }else{
                    $dados['msg'] = '
                    <div class="alert alert-danger">Erro ao excluir usuario.</div>';
                }
             }
             
             //fim edição
             
             
            
              $this->template->load('users/template','users/admin/users',$dados);  
                
                
                
                
            }else{ echo "Não tem permissão para acessar esta pagina";}

        }
	    
	}}
  
  
  
  

           
    


  