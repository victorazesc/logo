<?php
/**
 * Description of Users Model 
 *
 * @author Team TechArise
 *
 * @email info@techarise.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
  // declare private variable
  private $_userID;
  private $_name;
  private $_userName;
  private $_email;
  private $_sobrenome;
  private $_password;
  private $_status;
  
  public function setUserID($userID) {
    $this->_userID = $userID;
  }  
  public function setEmail($email) {
    $this->_email = $email;
  }
  public function setPassword($password) {
    $this->_password = $password;
  }       

  public function getUserInfo() {
    $this->db->select(array('u.user_id', 'u.name', 'u.email','u.sobrenome'));
    $this->db->from('users as u');
    $this->db->where('u.user_id', $this->_userID);
    $query = $this->db->get();
    return $query->row_array();
  } 
  function login() {
    $this -> db -> select('user_id, name, email, sobrenome');
    $this -> db -> from('users');
    $this -> db -> where('email', $this->_email);
    $this -> db -> where('password', $this->_password);
    $this -> db -> limit(1);
    $query = $this -> db -> get();
    if($query -> num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }    
}
?>