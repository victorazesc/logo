<?php
/**
 * Description of Users Controller
 *
 * @author Team TechArise
 *
 * @email info@techarise.com
 **/
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Entrada extends CI_Controller {
   
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
           
           
           if($this->input->post('acao') == 'saida'){
            
            $id_entrada = $this->input->post('id_entrada');
            $sentido = "SAIDA";
            $operador_saida = $_SESSION['email'];
            $data_saida = date('Y-m-d');
            $hora_saida = date('H:i:s');
      
            
           
            $dar_saida = $this->db->query(" UPDATE entrada_pedestres SET sentido = '$sentido', operador_saida= '$operador_saida', data_saida = '$data_saida', hora_saida = '$hora_saida' WHERE id_entrada = '$id_entrada'; ");
            
                if($dar_saida){
                    $dados['msg'] = '
                    <div class="alert alert-success"><strong>Perfeito! </strong> Saída realizada com sucesso </div>';
                }else{
                    $dados['msg'] = '
                    <div class="alert alert-danger">Erro ao editar usuario.</div>';
                }
             }
            
            
            
          $this->user->setUserID($this->session->userdata('user_id'));
          $data['userInfo'] = $this->user->getUserInfo();
          $this->template->load('users/template','users/entrada/controle', $dados );
      }
  }
  
  

   
  
  
  
  //Eventos
  
  
	public function add_entrada(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Entradas_model', '', TRUE);
 
            if($this->input->post('acao') == 'inserir_descarga'){
                $this->Entradas_model->placa_cavalo = strtoupper($this->input->post('placa_cavalo'));
                $this->Entradas_model->observacao = $this->input->post('observacao');
                $this->Entradas_model->processo = 'DESCARGA';
                $this->Entradas_model->placa_carreta = strtoupper($this->input->post('placa_carreta'));
                $this->Entradas_model->cpf_motorista = $this->input->post('cpf_motorista');
                
                $this->Entradas_model->id_transportadora = $this->input->post('id_transportadora');
                
                $this->Entradas_model->id_mercadoria = $this->input->post('id_mercadoria');
                $this->Entradas_model->data_entrada = date('Y-m-d H:m:s');
                $this->Entradas_model->id_usuario = $_SESSION['user_id'];
                $this->Entradas_model->id_filial = $this->input->post('id_filial');
                $this->Entradas_model->contentor = $this->input->post('contentor');
                $this->Entradas_model->telefone_motorista = $this->input->post('telefone_motorista');
                $this->Entradas_model->grade = $this->input->post('grade');
                $this->Entradas_model->sigla_container = strtoupper($this->input->post('sigla_container'));
                $this->Entradas_model->numero_container = $this->input->post('numero_container');
                $protocolo = $this->Entradas_model->cpf_motorista = $this->input->post('cpf_motorista');
                $protocolo_e = "";
                $ver_protocolo = $this->db->query("SELECT * FROM Entradas WHERE sentido != 'SAIDA' and cpf_motorista LIKE '%$protocolo%' ");

                foreach( $ver_protocolo->result() as $row){   
                $protocolo_e = $row->cpf_motorista;
                }
                 
                if($protocolo == $protocolo_e){
                   $dados['msg'] = '
                    <div class="alert alert-danger"><span class="icon-slash"></span> Protocolo já existente.</div>';
                }else{
                
                if($this->Entradas_model->inserir()){
                    $dados['msg'] = '

<div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> A descarga foi adicionada a Grade.</div>
                    
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao inserir Entrada!</p>';
                }
            }}
            
         
            if($this->input->post('acao') == 'entrada_pedestre'){
                
                $this->Entradas_model->nome_pedestre = $this->input->post('nome_pedestre');

                $this->Entradas_model->tipo_pedestre = $this->input->post('tipo_pedestre');
                $this->Entradas_model->empresa_pedestre = $this->input->post('empresa_cod');
                $this->Entradas_model->nivel_pedestre = $this->input->post('nivel_pedestre');
                $this->Entradas_model->data_entrada = date('Y-m-d');
                $this->Entradas_model->sentido = 'ENTRADA';
                $this->Entradas_model->hora_entrada = date('H:i:s');
                $this->Entradas_model->operador_entrada = $_SESSION['email'];
                
                $cpf = $this->Entradas_model->cpf_pedestre = $this->input->post('cpf_pedestre');
                $cpf_e = "";
                $ver_cpf = $this->db->query("SELECT * FROM entrada_pedestres WHERE sentido != 'SAIDA' and cpf_pedestre LIKE '%$cpf%' ");

                foreach( $ver_cpf->result() as $row){   
                $cpf_e = $row->cpf_pedestre;
                }
                 
                if($cpf == $cpf_e){
                   $dados['msg'] = '
                    <div class="alert alert-danger"><span class="icon-slash"></span> O pedestre já esta dentro do recinto.</div>';
                }else{
                
                if($this->Entradas_model->inserir_pedestre()){
                    $dados['msg'] = '

<div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> O Pedestre já pode entrar.</div>
                    
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao inserir Entrada!</p>';
                }
            }}
            
            
                     
            if($this->input->post('acao') == 'entrada_veiculo'){
                
                $this->Entradas_model->placa_cavalo = $this->input->post('placa_cavalo');
                $this->Entradas_model->placa_carreta = $this->input->post('placa_carreta');
                $this->Entradas_model->cpf_motorista = $this->input->post('cpf_motorista');
                $this->Entradas_model->observacao = $this->input->post('observacao');
                $this->Entradas_model->processo = "TERCEIROS";
                $this->Entradas_model->data_entrada = date('Y-m-d H:i:s');
                $this->Entradas_model->sentido = '0';
                $this->Entradas_model->id_usuario = $_SESSION['user_id'];
                
                $cpf = $this->input->post('cpf_motorista');
                $cpf_e = "";
                $ver_cpf = $this->db->query("SELECT * FROM Entradas WHERE sentido != '1' and cpf_motorista = '$cpf' ");

                foreach( $ver_cpf->result() as $row){   
                $cpf_e = $row->cpf_motorista;
                }
                 
                if($cpf == $cpf_e){
                   $dados['msg'] = '
                    <div class="alert alert-danger"><span class="icon-slash"></span> O pedestre já esta dentro do recinto.</div>';
                }else{
                
                if($this->Entradas_model->inserir()){
                    $dados['msg'] = '

<div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> O Pedestre já pode entrar.</div>
                    
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao inserir Entrada!</p>';
                }
            }}
 
            $this->template->load('users/template','users/entrada/add_entrada', $dados);
 
           
	}}
  
  

  public function list_etradas(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
            
        } else {
             $protocolo= null; 
             $dados = array();
            
             if($this->input->post('acao') == 'excluir'){
            
              
           $id = $this->input->post('descarga');
           $protocolo = $this->input->post('protocolo');
           $email = $_SESSION['email'];
           $data = date('Y-m-d H:i:s');
         
        
       
   
  $data_expira = date('Y-m-d', strtotime( '-1 months', strtotime('2020-05-01')));

           
           
           $query = $this->db->query("DELETE FROM Eventos WHERE id_descarga = $id");
        
        $log = $this->db->query("INSERT INTO Log_exclusao (id_descarga,protocolo,usuario, data)
VALUES ($id, $protocolo, '$email', '$data');");

 $excesso = $this->db->query("DELETE FROM Log_exclusao WHERE data like '%$data_expira%'");
         
         
            
                if($query && $log && $excesso ){
                    $dados['msg'] = '

                    <div class="alert alert-success"><strong><span class="icon-check"></span> Perfeito! </strong> A descarga e todo seu processo foi excluido.</div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger">Erro ao excluir descarga.</div>';
                }
             }
    
            
       $this->template->load('users/template','users/entrada/entrada', $dados);
      
 }}
  
  
    public function desunitizar(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
        
$id = $_GET['descarga'];

$status = $_GET['status'];
$desova = $_GET['desova'];


$this->db->query("UPDATE Eventos
SET status = '$status',desova ='$desova' WHERE id_descarga = $id; ");
header('Location: list_eventos');    
            
            
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
	
  
 


public function muda_status(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Eventos_model', '', TRUE);
            $this->load->model('Log_model', '', TRUE);
if(!$_GET['id']){}else{ $id = $_GET['id'];};
            if(!$id){
               
            }else{
             
             $status = $_GET["status"];
            $query = $this->db->query("UPDATE Entradas SET status ='$status' WHERE id_entrada = '$id' ");   
            
            if($query){
                    $dados['msg'] = '
                    <div class="alert alert-success"><p><span class="icon-check"></span> Evento atualizado com sucesso!</p>
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao atualizar evento!</p></div>';
                }
            }
 
            $this->template->load('users/template','users/entrada/controle', $dados);
	}}
  

public function muda_porta(){
	    
	    
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Eventos_model', '', TRUE);
            $this->load->model('Log_model', '', TRUE);
if(!$_GET['id']){}else{ $id = $_GET['id'];};
            if(!$id){
               
            }else{
             
            $porta = $_GET["porta"];
            $query = $this->db->query("UPDATE Entradas SET porta ='$porta' WHERE id_entrada = '$id' ");   
            
            if($query){
                    $dados['msg'] = '
                    <div class="alert alert-success"><p><span class="icon-check"></span> porta atualizado com sucesso!</p>
      </div>';
                }
                else{
                    $dados['msg'] = '
                    <div class="alert alert-danger"><p>Erro ao atualizar evento!</p></div>';
                }
            }
 
            $this->template->load('users/template','users/entrada/controle', $dados);
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
	
	        public function busca_pedestre(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
       $cpf = $_GET['cpf'];
      
       $query = $this->db->query("SELECT * FROM pedestres WHERE cpf_pedestre = '$cpf' ");
       $resultado = $query->result();
       
       
       if (empty($resultado)){
           echo "Pedestre/Motorista Não Cadastrado";
       };
       
       foreach($query->result() as $row){
           echo $row->nome_pedestre;

       }
      exit();
  }}

	        public function b_pedestre(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            
       $cpf = $_GET['cpf'];
       $query = $this->db->query("SELECT * FROM pedestres WHERE cpf_pedestre = '$cpf' ");
       $resultado = $query->result();
       
       
       if (empty($resultado)){echo '<div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar entrada</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" >
 <div id="pedestre"></div>
<form method="post">
<input type="hidden" name="acao" value="entrada_pedestre"> 
        
    <div class="col-md-12"><div class="row">
              <div class="col-md-12"> 
    <div class="form-group"><label for="exampleFormControlInput1">CPF</label>
    <input class="form-control" id="cpf_pedestre" type="text" maxlength="11" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" onchange="pedestreCpf()" placeholder="" name="cpf_pedestre" value="">
        </div></div>
       
    
   

    </div>
      

         </div>  
   
        <div class="card card-icon mb-4">
                                        <div class="row no-gutters">
                                                                                        <div class="col">
                                                <div class="card-body py-5">
                                                    <h5 class="card-title">Este pedestre não existe</h5>
                                                    <p class="card-text">Este Pedestre não existe na nossa base de dados por favor clique no link a baixo para adiciona-lo</p>
                                                    <a class="btn btn-secondary btn-sm" href="registros?t=pedestresPill"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link mr-1"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>Registrar Pedestre</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                 
           </div>


                     
    
   


            <div class="modal-footer"><button class="btn btn-primary" type="button" data-dismiss="modal">Fechar</button></div>
       
    </form>';}
       
       
        foreach($query->result() as $row){
        
         echo '<div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar entrada</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" >
 <div id="pedestre"></div>
<form method="post">
<input type="hidden" name="acao" value="entrada_pedestre"> 
        
    <div class="col-md-12"><div class="row">
              <div class="col-md-4"> 
    <div class="form-group"><label for="exampleFormControlInput1">CPF</label>
    <input class="form-control" id="cpf_pedestre" type="text" maxlength="11" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" onchange="pedestreCpf()" placeholder="" name="cpf_pedestre" value="'.$row->cpf_pedestre.'">
        </div></div>
       
    
    <div class="col-md-8">
         <div class="row">
      <div class="col-md-8">
    <div class="form-group"><label for="exampleFormControlInput1">Nome:</label>
<input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="nome_pedestre" value="
'.$row->nome_pedestre.'" readonly></div>
    </div> 
    <div class="col-md-4"> 
    <div class="form-group"><label for="exampleFormControlInput1">Telefone</label>
    <input class="form-control" id="exampleFormControlInput1" value="'.$row->telefone_pedestre.'" type="text" placeholder="" name="telefone_pedestre" readonly>
        </div> </div>
    </div>
         </div>
                     <div class="col-md-12">
         <div class="row">

    </div>
         </div>  
   
           <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Tipo de Pedestre</label>
    <input class="form-control" id="exampleFormControlInput1" value="'.$row->tipo_pedestre.'" type="text" placeholder="" name="tipo_pedestre" readonly>
        </div></div>
    <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Empresa</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" value="'.$row->empresa_cod.'" placeholder="" name="empresa_cod" readonly>
    
    <input class="form-control" id="exampleFormControlInput1" type="hidden" value="'.$row->nivel_acesso.'" placeholder="" name="nivel_pedestre">
   
        </div> 
        
        
        </div>
       
        <div class="col-md-12 text-right" >
        <button class="btn btn-primary" type="button" data-dismiss="modal">Fechar</button>&nbsp <button type="submit" class="btn btn-success pull-left">Cadastrar</button>
           </div>      
           </div>

    </div>  

     </div> 
    
   
 <hr>

    
    ';

       }}
     
  }

  
  





  
}


?>