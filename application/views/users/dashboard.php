 <?php echo (isset($msg) ? $msg : '') ?>


<?php 
$data_hoje = date('Y-m-d');

$con_desunitizacao_t = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%DESUNITIZAÇÃO LIBERADA TERM%'");  
$con_desunitizacao_p = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%DESUNITIZAÇÃO LIBERADA PATIO%'"); 
$con_ag_laudo = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AGUARDANDO LAUDO%'"); 
$con_ag_venda = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%NÃO DESOVAR - AG. VENDA%'"); 
$con_ag_an_cq = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AGUARDA ANALISE CQ%'"); 
$con_ag_csn = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AGUARDA CSN%'"); 
$con_csn_inc = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%CSN INCORRETO%'"); 
$con_ag_nota = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AGUARDA NOTA DE AZ%'"); 
$con_ag_entrada = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AGUARDA ENTRADA%'"); 
$con_em_doca = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%EM DOCA%'"); 
$con_ag_csi = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AG. CSI%'"); 
$con_solicitado = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%SOLICITADO%'");
$con_desunitizado = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%DESUNITIZADO%'");
$con_ag_lemk = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AG LEMK%'");
$con_ag_cqs = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%AG CQS%'");
$con_em_grade = $this->db->query("SELECT * FROM  Eventos WHERE status LIKE '%EM GRADE%'");

$recebidos = $this->db->query("SELECT * FROM Eventos WHERE Data_chegada = '$data_hoje'");
$desovados = $this->db->query("SELECT * FROM Eventos WHERE desova = '$data_hoje'");
$divergencia = $this->db->query("SELECT * FROM Eventos WHERE desova = '$data_hoje' AND diver_map = '2'");
$mapeados = $this->db->query("SELECT * FROM Eventos WHERE desova = '$data_hoje' AND mapeado = 'SIM'");
$falta = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'FALTA'");
$sobra = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'SOBRA'");
$avaria = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'AVARIA'");
$faltasobra = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'FALTA/SOBRA'");
$faltasobraavaria = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'FALTA/SOBRA/AVARIA'");
$datasdiverg = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'DATAS DIVERG.'");
$datasemcobertura = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'DATAS SEM COBERTURA'");
$validade = $this->db->query("SELECT * FROM Eventos WHERE motivo = 'VALIDADE INCORRETA'");


$desunitizacao_t = $con_desunitizacao_t->num_rows();			
$desunitizacao_p = $con_desunitizacao_p->num_rows();			
$ag_laudo	=$con_ag_laudo->num_rows();
$ag_venda   =	$con_ag_venda->num_rows();
$ag_an_cq   =	$con_ag_an_cq->num_rows();
$ag_csn	=	$con_ag_csn	->num_rows();
$csn_inc	= $con_csn_inc->num_rows();
$ag_nota	=	$con_ag_nota->num_rows();
$ag_entrada	=	$con_ag_entrada->num_rows();
$em_doca	=	$con_em_doca->num_rows();
$ag_csi	=	$con_ag_csi->num_rows();
$solicitado	=	$con_solicitado->num_rows();
$desunitizado	=	$con_desunitizado->num_rows();
$ag_lemk	=	$con_ag_lemk->num_rows();
$ag_cqs	=	$con_ag_cqs->num_rows();
$em_grade	=	$con_em_grade->num_rows();

$recebidos_t	=	$recebidos->num_rows();
$desovados_t	=	$desovados->num_rows();
$divergencia_t	=	$divergencia->num_rows();
$mapeados_t	=	$mapeados->num_rows();

$falta_t = $falta->num_rows();
$sobra_t = $sobra->num_rows();
$avaria_t = $avaria->num_rows();
$faltasobra_t = $faltasobra->num_rows();
$faltasobraavaria_t = $faltasobraavaria->num_rows();
$datasdiverg_t = $datasdiverg->num_rows();
$datasemcobertura_t = $datasemcobertura->num_rows();
$validade_t = $validade->num_rows();

$total_descargas = $desunitizacao_t + $desunitizacao_p + $ag_laudo + $ag_venda + $ag_an_cq + $ag_csn + $csn_inc + $ag_nota + $ag_entrada + $em_doca + $ag_csi + $solicitado;

?>

    

    <div class="row">
        <div class="col-md-10">
    <h1 style="font-weight: 400 !important;"><span style="text-transform: capitalize;">
       
        <?php
$hr = date(" H ");
if($hr >= 12 && $hr<18) {
$resp = "Boa tarde!";}
else if ($hr >= 0 && $hr <12 ){
$resp = "Bom dia!";}
else {
$resp = "Boa noite!";}

?>
        
        
        
        <?php echo $resp.'&nbsp'. $_SESSION['name']?></span></h1>
         </div>  <div class="col-md-2">
        <a href="list_eventos" class="btn btn-primary btn-block"><span class="icon-eye"></span> Descargas</a>  <br>
        
        </div></div>

  <div class="row">    
    <hr>
   
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-solicitado shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Solicitado</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $solicitado ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-2x text-gray-300"><span class="icon-message-circle"></span></i>
                    </div>
               </div>
                <a class="small text-white stretched-link" href="list_eventos?status=SOLICITADO"></a>
                </div>
              </div>
            </div>
            
            
                         <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-csn shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Aguarda CSN!</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ag_csn ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-2x text-gray-300"><span class="icon-award"></span></i>
                    </div>
               </div>
                <a class="small text-white stretched-link" href="list_eventos?status=AGUARDA+CSN"></a>
                </div>
              </div>
            </div>
            
                         <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-doca shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Em doca!</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $em_doca;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-2x text-gray-300"><span class="icon-package"></span></i>
                    </div>
               </div>
                <a class="small text-white stretched-link" href="list_eventos?status=SOLICITADO"></a>
                </div>
              </div>
            </div>
            
            
            
                         <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-total shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total para desovar!</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_descargas;     ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-2x text-gray-300"><span class="icon-truck3"></span></i>
                    </div>
               </div>
                <a class="small text-white stretched-link" href="list_eventos"></a>
                </div>
              </div>
            </div>
            </div>
 <div class="row">           
 <div class="col-md-12">           

 <h4 class="text-center">Status da Operação dia</h4>
 <br>
</div>
</div>

<div class="row"> 
 

            
            <div class="col-md-6">
                    <div class="panel panel-default shadow">
                 
                        <div class="panel-body">
                            
<table class="table table-striped table-condensed" style="font-transform: capitalize">
      <thead>
        <tr>
          <th>#</th>
          <th>Status da Operação</th>
          <th>Quantidade</th>
        </tr>
      </thead>
      <tbody>
        
       <Tr>		
          <Th Scope="Row">1</Th>		
          <Td>	Desunitização Liberada Terminal	</Td>
          <Td Class="Text-Center"><?Php Echo $desunitizacao_t ?></Td>
        </Tr>
        
                <Tr>		
          <Th Scope="Row">2</Th>		
          <Td>	Desunitização Liberada Pátio	</Td>
          <Td Class="Text-Center"><?Php Echo $desunitizacao_p ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">3</Th>		
          <Td>	Aguardando Laudo	</Td>
          <Td Class="Text-Center"><?Php Echo $ag_laudo ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">4</Th>		
          <Td>	Não Desovar - Ag. Venda	</Td>
<Td Class="Text-Center"><?Php Echo $ag_venda ?></Td>
        <Tr>		
          <Th Scope="Row">5</Th>		
          <Td>	Aguardando Analise Cq	</Td>
          <Td Class="Text-Center"><?Php Echo $ag_an_cq ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">6</Th>		
          <Td>Em Grade</Td>
          <Td Class="Text-Center"><?Php Echo $em_grade ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">7</Th>		
          <Td>	Csn Incorreto	</Td>
          <Td Class="Text-Center"><?Php Echo $csn_inc ?></Td>
        </Tr>
        
          <Tr>		
          <Th Scope="Row">8</Th>		
          <Td>	Aguardando Csi	</Td>
          <Td Class="Text-Center"><?Php Echo $ag_csi ?></Td>
        </Tr>
		
        <Tr>		
          <Th Scope="Row">9</Th>		
          <Td>	Aguardando Nota De Az	</Td>
          <Td Class="Text-Center"><?Php Echo $ag_nota ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">10</Th>		
          <Td>	Aguardando Entrada	</Td>
          <Td Class="Text-Center"><?Php Echo $ag_entrada ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">11</Th>		
          <Td>Aguardando Lemk</Td>
          <Td Class="Text-Center"><?Php Echo $ag_lemk ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">12</Th>		
          <Td>Aguardando Cqs</Td>
          <Td Class="Text-Center"><?Php Echo $ag_cqs ?></Td>
        </Tr>		
		
        <Tr>		
          <Th Scope="Row">13</Th>		
          <Td>Total Desunitizados</Td>
          <Td Class="Text-Center"><?Php Echo $desunitizado ?></Td>
        </Tr>		
	

  
      </tbody>
      
    </table>
          
          
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
        
         
                  
                </div>
                
                
            <div class="col-md-6">
                    <div class="panel panel-default shadow">
                 
                        <div class="panel-body">
                           
<table class="table table-striped table-condensed">
      <thead>
        <tr>
          
          <th class="text-center">Status</th>
          <th class="text-center">Quantidade</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>		
         <th scope="row">Recebidos</th>		
         <td class="text-center"><?php echo $recebidos_t ?></td>
        </tr>
        
        <tr>		
         <th scope="row">Desovados</th>		
         <td class="text-center"><?php echo $desovados_t ?></td>
        </tr>		
		
        <tr>		
         <th scope="row">Média</th>		
         <td class="text-center"><?php echo $ag_laudo ?></td>
        </tr>		
		
        <tr>		
         <th scope="row">Divergencia</th>		
         <td class="text-center"><?php echo $divergencia_t ?></td>
        </tr>
        <tr>		
          <th scope="row">Mapeados</th>		
          <td class="text-center"><?php echo $mapeados_t ?></td>
        </tr>		
		
       
      </tbody>
    </table>
          

                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                     <div class="col-md-12">           

 <h4 class="text-center">Status de Divergências</h4>
 <br>
</div>
                 <div class="panel panel-default shadow">
                     <div class="panel-body">
                  
                        
         <table class="table table-striped table-condensed">
      <thead>
        <tr>
         
          <th class="text-center">Motivo</th>
          <th class="text-center">Quantidade</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>		
          <th scope="row">Falta</th>
          <td class="text-center"><?php echo $falta_t ?></td>
        </tr>
        
         <tr>		
          <th scope="row">Sobra</th>
          <td class="text-center"><?php echo $sobra_t ?></td>
        </tr>		
		
        <tr>		
          <th scope="row">Avaria</th>
          <td class="text-center"><?php echo $avaria_t ?></td>
        </tr>		
		
        <tr>		
         <th scope="row">Falta/Sobra</th>
         <td class="text-center"><?php echo $faltasobra_t ?></td>
        </tr>
        <tr>		
          <th scope="row">Falta/Sobra/Avaria</th>
          <td class="text-center"><?php echo $faltasobraavaria_t ?></td>
        </tr>	
                
        <tr>		
          <th scope="row">Datas Diverg.</th>
          <td class="text-center"><?php echo $datasdiverg_t ?></td>
        </tr>
        
        <tr>		
          <th scope="row">Datas Sem Cobertura</th>
          <td class="text-center"><?php echo $datasemcobertura_t ?></td>
        </tr>
       
        <tr>		
          <th scope="row">Validade Incorreta</th>
          <td class="text-center"><?php echo $validade_t ?></td>
        </tr>
		
       
      </tbody>
    </table>          
                                    
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->          
                </div>
                
                
</div>


    