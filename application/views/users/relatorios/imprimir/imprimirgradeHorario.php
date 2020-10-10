<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
$base = base_url();
    //declaramos uma variavel para monstarmos a tabela
    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
    $dadosXls .= "          <tr>";
     $dadosXls .= "          <th colspan='4' style='font-size: 20px;'>Horarios de Descarga</th>";
    $dadosXls .= "          </tr>";
    $dadosXls .= '<tr>';

     $dadosXls .= '      <th>Data Chegada</th>';
    $dadosXls .= '       <th>Usuario</th>';
     $dadosXls .= '      <th>Container</th>';
     $dadosXls .= '      <th>Grade das:</th>';

    
     
     
   $dadosXls .= ' </tr>';


    //mandamos nossa query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $this->db->query("SELECT * FROM Eventos WHERE status != 'DESUNITIZADO'");
    //varremos o array com o foreach para pegar os dados
    foreach($result->result() as $res){
        
        $dadosXls .= '<tr>';

         $dadosXls .= '       <td style="width:10%">' . $res->Data_chegada . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->Usuario . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->container . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->grade_horario . '</td>';

       $dadosXls .= '     </tr>';
        

    }
    $dadosXls .= "  </table>";
 
    // Definimos o nome do arquivo que será exportado  
    $arquivo = "RelatorioDescarga.xls";  
    // Configurações header para forçar o download  
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Type: text/html; charset=utf-8');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');
       
    // Envia o conteúdo do arquivo  
    
    echo $dadosXls;  
    exit;
?>