<?php

$id = $_GET['evento'];

$Titulo_Evento = $_post['Titulo_Evento'];
$Tipo_Evento = $_post['Tipo_Evento'];
$Data_Evento = $_post['Data_Evento'];
$Dados_Evento = $_post['Dados_Evento'];
$Resumo_Evento = $_post['Resumo_Evento'];

$this->db->query("UPDATE Eventos
SET Evento = '$Titulo_Evento', Tipo='$Tipo_Evento', Data_Evento= '$Data_Evento', Dados_Evento= '$Dados_Evento', Resumo_Evento= '$Resumo_Evento'
WHERE Numero_Evento = $id; ");
header('Location: list_eventos');


?>