<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
$base = base_url();
    //declaramos uma variavel para monstarmos a tabela
    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
    $dadosXls .= "          <tr>";
     $dadosXls .= "          <th colspan='19' style='font-size: 20px;'>Grade de Descarga</th>";
    $dadosXls .= "          </tr>";
    $dadosXls .= '<tr>';
     $dadosXls .= '      <th>OC</th>';
     $dadosXls .= '      <th>Data Chegada</th>';
    $dadosXls .= '       <th>Tipo</th>';
     $dadosXls .= '      <th>Observação</th>';
     $dadosXls .= '      <th>Unidade Produtora</th>';
     $dadosXls .= '      <th>Protocolo</th>';
    
     $dadosXls .= '      <th>Nota Fiscal</th>';
     $dadosXls .= '      <th>Container</th>';
     $dadosXls .= '      <th>Dias CSN</th>';
     $dadosXls .= '      <th>Divergencia Mapeamento</th>';
     $dadosXls .= '      <th>Motivo Divergencia</th>';
     $dadosXls .= '  <th>Mapeado por:</th>';
     $dadosXls .= '  <th>Status</th>';
     $dadosXls .= '  <th>Data Desova</th>';
     $dadosXls .= '  <th>Data Mapeamento</th>';
     $dadosXls .= '  <th>EDI</th>';
     $dadosXls .= '  <th>Habilitação</th>';
     $dadosXls .= '  <th>Certificado</th>';
     $dadosXls .= '  <th>Data emissão CSN</th>';
     
     
     
   $dadosXls .= ' </tr>';

$whereData ="";
$whereUnidade ="";
$whereStatus = "";

$dataInicial = $this->input->get('dataInicial');
$dataFinal = $this->input->get('dataFinal');
$unidade = $this->input->get('cliente');
$status = $this->input->get('status');


if($dataInicial != null){
        $whereData = "AND Data_chegada BETWEEN ".$this->db->escape($dataInicial)." AND ".$this->db->escape($dataFinal);
        }
        if($unidade != null){
            $whereUnidade = "AND unidade LIKE '%$unidade%'";
        }
        if($status != null){
            $whereStatus = "AND status = ".$this->db->escape($status);
        }
                
    //mandamos nossa query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $this->db->query("SELECT * FROM Eventos WHERE id_descarga != 0 $whereData $whereUnidade $whereStatus");
    //varremos o array com o foreach para pegar os dados
    foreach($result->result() as $res){
        
        $dadosXls .= '<tr>';
        $dadosXls .= '      <td style="width:35%">' . $res->oc . '</td>';
         $dadosXls .= '       <td style="width:10%">' . $res->Data_chegada . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->Tipo . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->observacao . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->unidade . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->protocolo . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->nota . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->container . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->dias . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->diver_map . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->motivo . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->user_map . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->status . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->desova . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->data_mapeamento . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->edi . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->habilitacao . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->certificado . '</td>';
         $dadosXls .= '  <td style="width:30%">' . $res->Data_certificado . '</td>';
         


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