<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Export Model
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export_model extends CI_Model {

    // get employee list
    public function employeeList() {
        $this->db->select(array('e.Data_chegada', 'e.Usuario', 'e.status'));
        $this->db->from('Eventos as e');
        $query = $this->db->get();
        return $query->result_array();
    }

}
