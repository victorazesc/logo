<?php
/**
 * Description of Users Controller
 *
 * @author Team TechArise
 *
 * @email info@techarise.com
 **/
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Users extends CI_Controller {
   
  public function __construct() {
      parent::__construct();
      $this->load->model('Users_model', 'user');
      date_default_timezone_set('America/Sao_Paulo');
      function data($data){
         return date("d/m/Y", strtotime($data));}

  }
  // Dashboard
  public function index()
  {
            
            $dados = array();
      
    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
           
           
           if($this->input->post('acao') == 'editar'){
            
            $name = $this->input->post('nome');
            $sobrenome = $this->input->post('sobrenome');
            $id = $this->input->post('id');
            $senha = $this->input->post('senha');
            $md5 = md5($senha);
            
           
            $editar_usuario = $this->db->query(" UPDATE users SET name = '$name', sobrenome = '$sobrenome', password = '$md5' WHERE user_id = $id; ");
            
                if($editar_usuario){
                    $dados['msg'] = '
                    <div class="alert alert-success"><strong>Perfeito! </strong> O usuario foi editado com sucesso </div>';
                }else{
                    $dados['msg'] = '
                    <div class="alert alert-danger">Erro ao editar usuario.</div>';
                }
             }
            
            
            
          $this->user->setUserID($this->session->userdata('user_id'));
          $data['userInfo'] = $this->user->getUserInfo();
          $this->template->load('users/template','users/dashboard', $dados );
      }
  }
  
  

   
  
  
  
  //Eventos
  
  
	public function envia_evento(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Eventos_model', '', TRUE);
 
            if($this->input->post('acao') == 'inserir'){
                $this->Eventos_model->oc = $this->input->post('oc');
                $this->Eventos_model->observacao = $this->input->post('observacao');
                $this->Eventos_model->unidade = $this->input->post('unidade');
                $this->Eventos_model->Tipo = $this->input->post('tipo');
                $this->Eventos_model->Usuario = $this->input->post('usuario');
                $this->Eventos_model->protocolo = $this->input->post('protocolo');
                $this->Eventos_model->container = $this->input->post('container');
                $this->Eventos_model->habilitacao = $this->input->post('habilitacao');
                $this->Eventos_model->certificado = $this->input->post('certificado');
                $this->Eventos_model->Data_certificado = $this->input->post('datacertificado');
                $this->Eventos_model->nota = $this->input->post('nota');
                $this->Eventos_model->grade_horario = $this->input->post('grade');
                $this->Eventos_model->status = $this->input->post('status');
                
                $this->Eventos_model->Data_chegada = $this->input->post('data_chegada');
                
                $protocolo = $this->Eventos_model->protocolo = $this->input->post('protocolo');
                $protocolo_e = "";
                
                 $ver_protocolo = $this->db->query("SELECT * FROM Eventos WHERE protocolo LIKE '%$protocolo%' ");
            foreach( $ver_protocolo->result() as $row){   
                $protocolo_e = $row->protocolo;
                 }
                 
                 if($protocolo == $protocolo_e){
                   $dados['msg'] = '
                    <div class="alert alert-danger"><span class="icon-slash"></span> Protocolo já existente.</div>';
                }else{
                
                if($this->Eventos_model->inserir()){
                    $dados['msg'] = '

<div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> A descarga foi adicionada a Grade.</div>
                    
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao inserir evento!</p>';
                }
            }}
 
            $this->template->load('users/template','users/add_eventos', $dados);
	}}
  
  

  public function list_eventos(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
            
        } else {
             $protocolo= null; 
             $dados = array();
            
             if($this->input->post('acao') == 'excluir'){
            
              
           $id = $this->input->post('descarga');
           $id_entrada = $this->input->post('id_entrada');
           $protocolo = $this->input->post('protocolo');
           $email = $_SESSION['email'];
           $data = date('Y-m-d H:i:s');
         
        
       
   
  $data_expira = date('Y-m-d', strtotime( '-1 months', strtotime('2020-05-01')));

           
           
           $query = $this->db->query("DELETE FROM Eventos WHERE id_descarga = $id");
           $entrada = $this->db->query("DELETE FROM Entradas WHERE id_entrada =  $id_entrada");
        
        $log = $this->db->query("INSERT INTO Log_exclusao (id_descarga,protocolo,usuario, data)
VALUES ($id, $protocolo, '$email', '$data');");

 $excesso = $this->db->query("DELETE FROM Log_exclusao WHERE data like '%$data_expira%'");
         
         
            
                if($query && $log && $excesso && $entrada ){
                    $dados['msg'] = '

                    <div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> A descarga e todo seu processo foi excluido.</div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger">Erro ao excluir descarga.</div>';
                }
             }
    
            
       $this->template->load('users/template','users/list_eventos', $dados);
      
 }}
  
  
    public function desunitizar(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
        
$id = $this->input->get('descarga');
$id_entrada = $this->input->get('id_entrada');
$status = $this->input->get('status');
$desova = $this->input->get('desova');

if($status == 'DESUNITIZADO'){
    
$this->db->query("UPDATE Eventos
SET status = '$status',desova ='$desova' WHERE id_descarga = $id; ");
 
    
$this->db->query("UPDATE Entradas
SET sentido = '1' WHERE id_entrada = $id_entrada; ");


header('Location: list_eventos'); 
    
}else{

$this->db->query("UPDATE Eventos
SET status = '$status',desova ='$desova' WHERE id_descarga = $id; ");
 
header('Location: list_eventos'); 
  
}         
            
       $this->template->load('users/template','users/list_eventos');
      
  }}
  
      public function altera_grade(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
        
$id = $_GET['descarga'];
$grade = $_GET['grade'];
$gradea = $_GET['gradea'];


$this->db->query("UPDATE Eventos SET grade_horario = '$grade',grade_anterior = '$gradea' WHERE id_descarga = $id; ");


header('Location: horario_descarga');    
            
            
       $this->template->load('users/template','users/grade_horario');
      
  }}
  
  
  
  
      public function imprimir_descarga(){
        
    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        }else{
        
               $this->template->load('users/template','users/relatorio_descarga');
               
            }
          
          
      }
	
  
 


public function editar_evento(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Entradas_model', '', TRUE);
            $this->load->model('Eventos_model', '', TRUE);
            $this->load->model('Log_model', '', TRUE);
 
             if($this->input->post('acao') == 'inserir'){
                $this->Eventos_model->nota = $this->input->post('nota');
                $this->Eventos_model->oc = $this->input->post('oc');
                $this->Eventos_model->observacao = $this->input->post('observacao');
                $this->Eventos_model->unidade = $this->input->post('unidade');
                $this->Eventos_model->grade_horario = $this->input->post('grade');
                $this->Eventos_model->Tipo = $this->input->post('tipo');
                $this->Eventos_model->Usuario = $this->input->post('usuario');
                $this->Eventos_model->protocolo = $this->input->post('protocolo');
                $this->Eventos_model->container = strtoupper($this->input->post('container'));
                $this->Eventos_model->habilitacao = $this->input->post('habilitacao');
                $this->Eventos_model->certificado = $this->input->post('certificado');
                $this->Eventos_model->Data_certificado = $this->input->post('datacertificado');
                $this->Eventos_model->id_entrada = $this->input->post('id_entrada');
                $this->Eventos_model->placa_cavalo = strtoupper($this->input->post('placa_cavalo'));
                $this->Eventos_model->placa_carreta = strtoupper($this->input->post('placa_carreta'));
                
                
                $this->Eventos_model->status = $this->input->post('status');
                $this->Eventos_model->Data_chegada = $this->input->post('data_entrada');
                $this->Entradas_model->em_grade = 1;
                
                        
                $this->Log_model->id_alterado = $this->input->post('id');
                $this->Log_model->usuario = $this->input->post('usuario');
                $this->Log_model->data = data("Y-m-d H:m:s");
         
                if ($this->input->post('status') == 'DESUNITIZADO'){
                    
                    $this->Eventos_model->desova = date('d/m/y');
            
                }
                

            
                
                
                if($this->Eventos_model->inserir() && $this->Log_model->inserir_log() &&  $this->Entradas_model->atualizar() ){
                    $dados['msg'] = '
                    <div class="alert alert-success"><p><span class="icon-check"></span> Evento atualizado com sucesso!</p>
      </div>';
      
       redirect('list_eventos', $dados);
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao atualizar evento!</p></div>';
                }
            }
 
 
 
            if($this->input->post('acao') == 'update'){
                
                
                $this->Eventos_model->placa_cavalo = strtoupper($this->input->post('placa_cavalo'));
                $this->Eventos_model->placa_carreta = strtoupper($this->input->post('placa_carreta'));
                $this->Eventos_model->oc = $this->input->post('oc');
                $this->Eventos_model->observacao = $this->input->post('observacao');
                $this->Eventos_model->unidade = $this->input->post('unidade');
                $this->Eventos_model->Tipo = $this->input->post('tipo');
                $this->Eventos_model->Usuario = $this->input->post('usuario');
                $this->Eventos_model->protocolo = $this->input->post('protocolo');
                $this->Eventos_model->container = strtoupper($this->input->post('container'));
                $this->Eventos_model->habilitacao = $this->input->post('habilitacao');
                $this->Eventos_model->certificado = $this->input->post('certificado');
                $this->Eventos_model->Data_certificado = $this->input->post('datacertificado');
                
                $this->Eventos_model->nota = $this->input->post('nota');
                $this->Eventos_model->status = $this->input->post('status');
                
                $this->Log_model->id_alterado = $this->input->post('id');
                $this->Log_model->usuario = $this->input->post('usuario');
                $this->Log_model->data = $this->input->post('data');
         
                if ($this->input->post('status') == 'DESUNITIZADO'){
                    
                    $this->Eventos_model->desova = date('d/m/y');
            
                }
                

            
                
                
                if($this->Eventos_model->atualizar() && $this->Log_model->inserir_log() ){
                    $dados['msg'] = '
                    <div class="alert alert-success"><p><span class="icon-check"></span> Evento atualizado com sucesso!</p>
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao atualizar evento!</p></div>';
                }
            }
 
            $this->template->load('users/template','users/editar_evento', $dados);
	}}
  

public function mapear_descarga(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Eventos_model', '', TRUE);
            $this->load->model('Log_model', '', TRUE);
 
            if($this->input->post('acao') == 'inserir'){
                $this->Eventos_model->edi = $this->input->post('edi');
                $this->Eventos_model->mapeado = $this->input->post('mapeado');
                $this->Eventos_model->diver_map = $this->input->post('diver');
                $this->Eventos_model->motivo = $this->input->post('motivo');
                $this->Eventos_model->user_map = $this->input->post('usuario');
                $this->Eventos_model->data_mapeamento = $this->input->post('data');
                $this->Eventos_model->id_descarga = $this->input->post('id');
                $this->Eventos_model->observacao = $this->input->post('observacao');
                $this->Eventos_model->diaria = $this->input->post('diaria');
               
                $this->Log_model->id_alterado = $this->input->post('id');
                $this->Log_model->usuario = $this->input->post('usuario');
                $this->Log_model->data = $this->input->post('data');
                
              
         
                if($this->Eventos_model->atualizar() && $this->Log_model->inserir_log() ){
                    $dados['msg'] = '
                    <div class="alert alert-success"><p>Evento atualizado com sucesso!</p></div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao atualizar evento!</p></div>';
                }
            }
 
            $this->template->load('users/template','users/mapear_descarga', $dados);
	}}
  


  
        // Login
  public function login()
  {
  $data['title'] = 'Login - Tech Arise';
        $data['metaDescription'] = 'Login';
        $data['metaKeywords'] = 'Login';
        $this->load->view('users/login', $data);
  }
  // Login Action 
  function doLogin() {
    // Check form  validation
    $this->load->library('form_validation');
 
    $this->form_validation->set_rules('email', 'Seu Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Senha', 'trim|required');
 
    if($this->form_validation->run() == FALSE) {
      //Field validation failed.  User redirected to login page
      $this->load->view('users/login');
    } else {  
      $sessArray = array();
      //Field validation succeeded.  Validate against database
      $email = $this->input->post('email');
      $password = $this->input->post('password');
 
      $this->user->setEmail($email);
      $this->user->setPassword(MD5($password));
 
      //query the database
      $result = $this->user->login();
      
      if($result) {
        foreach($result as $row) {
          $sessArray = array(
            'user_id' => $row->user_id,
            'name' => $row->name,
            'email' => $row->email,
            'is_authenticated' => TRUE,
          );
        $this->session->set_userdata($sessArray);
        }
        redirect('users');
      } else {
        redirect('users/login?msg=1');
      } 
    }
  }
  // Logout
  public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_authenticated');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('login');
    }
    
     
    public function mapeamento(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
       $this->template->load('users/template','users/mapeamento');
      
  }}
  
  
      public function finalizados(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
          
       $this->template->load('users/template','users/finalizados');}
      
  }
        public function finalizado(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
       $this->template->load('users/template','users/finalizado');
      
  }}

  
        public function horario_descarga(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
       $this->template->load('users/template','users/grade_horario');
      
  }}
	
	        public function perfil(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
       $this->template->load('users/template','users/perfil');
      
  }}


//registros

  
        public function registros(){
     
     	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Registros_model', '', TRUE);
 
            if($this->input->post('acao') == 'inserir_pedestre'){
                
                $this->Registros_model->nome_pedestre = $this->input->post('nome_pedestre');
                $this->Registros_model->tipo_pedestre = $this->input->post('tipo_pedestre');
                $this->Registros_model->observacao_pedestre = $this->input->post('observacao_pedestre');
                $this->Registros_model->telefone_pedestre = $this->input->post('telefone_pedestre');
                $this->Registros_model->empresa_cod = $this->input->post('empresa_cod');
                $this->Registros_model->status_seguranca = $this->input->post('status_seguranca');
                $this->Registros_model->nivel_acesso = $this->input->post('nivel_acesso');
                $this->Registros_model->data_cadastro = date("Y-m-d H:m:s");

                $cpf = $this->Registros_model->cpf_pedestre = $this->input->post('cpf_pedestre');
                $cpf_e = "";
                
                 $ver_cpf = $this->db->query("SELECT * FROM pedestres WHERE cpf_pedestre LIKE '%$cpf%' ");
            foreach( $ver_cpf->result() as $row){   
                $cpf_e = $row->cpf_pedestre;
                 }
                 
                 if($cpf == $cpf_e){
                   $dados['msg'] = '
                    <div class="alert alert-danger"><span class="icon-slash"></span>Pedestre já existente.</div>';
                }else{
                
                if($this->Registros_model->inserir_pedestre()){
                    $dados['msg'] = '

<div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> A descarga foi adicionada a Grade.</div>
                    
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao inserir evento!</p>';
                }
            }}
            
            //registrar veiculos 
            
            
                        if($this->input->post('acao') == 'inserir_veiculo'){
                
                
                $this->Registros_model->tipo = $this->input->post('tipo');
                $this->Registros_model->status = $this->input->post('status');
                $this->Registros_model->proprietario = $this->input->post('proprietario');
                $this->Registros_model->descricao = $this->input->post('descricao');
                $this->Registros_model->ano_modelo = $this->input->post('ano1').$this->input->post('ano2');
                $this->Registros_model->observacao = $this->input->post('observacao');
                $this->Registros_model->data_cadastro = date("Y-m-d H:m:s");

                $placa = $this->Registros_model->placa = $this->input->post('placa');
                $placa_e = "";
                
                 $ver_placa = $this->db->query("SELECT * FROM veiculos WHERE placa = '$placa' ");
            foreach( $ver_placa->result() as $row){   
                $placa_e = $row->placa;
                 }
                 
                 if($placa == $placa_e){
                   $dados['msg'] = '
                    <div class="alert alert-danger"><span class="icon-slash"></span>Veiculo já existente.</div>';
                }else{
                
                if($this->Registros_model->inserir_veiculo()){
                    $dados['msg'] = '

<div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> A descarga foi adicionada a Grade.</div>
                    
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao inserir evento!</p>';
                }
            }}
 
                  
       $this->template->load('users/template','users/registros', $dados);
       
	}

  }
  
  
  	  public function busca_pedestre_c(){
  	      
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
            $cpf = $_GET['cpf'];
       $query = $this->db->query("SELECT * FROM pedestres WHERE cpf_pedestre = '$cpf' ");
       
       foreach($query->result() as $row){
           
           if (!$row->cpf_pedestre){
               
               echo "pode adicionar";
           }else{
          echo  '
          
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Opa!</strong> Este usuario já existe como '.$row->nome_pedestre.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          ';
          

       }}
      exit();
  }}
  
    	  public function busca_placa_c(){
  	      
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
            $placa = $_GET['placa'];
       $query = $this->db->query("SELECT * FROM veiculos WHERE placa = '$placa' ");
       
       foreach($query->result() as $row){
           
           if (!$row->placa){
               
               echo "pode adicionar";
           }else{
          echo  '
          
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Opa!</strong> Este veiculo já existe como '.$row->placa.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          ';
          

       }}
      exit();
  }}
  

  
  





  
}


?>