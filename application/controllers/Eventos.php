<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {
    
    public function index()
	{ $this->template->load('template', 'eventos');	}
	
	public function mostra_evento() 
	{ $this->template->load('template', 'mostra_evento');	}
	
	
	
}
