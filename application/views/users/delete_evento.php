<?php

$cpf = $_GET['cpf'];

$this->db->query("SELECT * FROM pedestre WHERE cpf_pedestre LIKE '%$cpf%' ");



?>