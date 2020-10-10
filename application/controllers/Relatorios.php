<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios extends CI_Controller{


     public function __construct() {
      parent::__construct();
      $this->load->model('Users_model', 'user');
      date_default_timezone_set('America/Sao_Paulo');
  }
  // Dashboard

    public function os(){

     if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
      
       $this->template->load('users/template','users/relatorio_descarga');
    }}

    public function osRapid(){
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'rOs')){
           $this->session->set_flashdata('error','Você não tem permissão para gerar relatórios de OS.');
           redirect(base_url());
        }

        $data['os'] = $this->Relatorios_model->osRapid();

       
        //$this->load->view('relatorios/imprimir/imprimirOs', $data);
        $html = $this->load->view('users/relatorios/imprimir/imprimirDescargas', $data);
        
    }
    
    
    public function descargaCustom(){
  
	    if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
            $dados = array();
            $this->load->model('Relatorios_model', '', TRUE);
 
            if($this->input->post('acao') == 'inserir'){
               
                $this->Eventos_model->data_chegada = $this->input->get('dataInicial');
                $this->Eventos_model->desova = $this->input->get('dataFinal');
                $this->Eventos_model->unidade = $this->input->get('cliente');
                $this->Eventos_model->status = $this->input->get('status');
                
                
                
                if($this->Relatorios_model->descargaCustom()){
                    
                   
                    
                }
                else{
                  
                }
            }
 
            $this->load->view('users/relatorios/imprimir/imprimirDescarga', $dados);
	}}
   
     public function relatorio_mapeamento(){

     if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
      
       $this->template->load('users/template','users/relatorios/mapeamento');
    }}

     public function log_exclusao(){

     if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
      
       $this->template->load('users/template','users/relatorios/log_exclusao');
    }}

    	        public function imprimirgradehorario(){
      if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('users/login'); // the user is not logged in, redirect them!
        } else {
       $this->load->view('users/relatorios/imprimir/imprimirgradeHorario');
      
  }}
   
   
  
	    


   
}
