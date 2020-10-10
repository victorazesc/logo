 <?php echo (isset($msg) ? $msg : '') ?>

<style>
    
    td{white-space: nowrap;}
    th{white-space: nowrap;}
</style>



<?php 


if(!isset($_GET['saida'])){$saida = "AND sentido = '0'";}else{$saida = ' ';};
if(!isset($_GET['saida'])){$todos = "WHERE sentido = 'ENTRADA'";}else{$todos = ' ';};

$resultado_descargas = $this->db->query("SELECT * FROM Entradas where processo = 'DESCARGA' $saida ");
$resultado_veiculos = $this->db->query("SELECT * FROM Entradas where processo = 'TERCEIROS' $saida ");
$resultado_pedestres = $this->db->query("SELECT * FROM entrada_pedestres $todos ");

?>

<div id="conteudo" class="">
    <div class="row d-print-none">
        <div class="col-md-12">
            <h3 class="page-header">Controle de Entradas</h3>
        </div>

        <div class="col-md-12"><hr></div>



    <!-- /.col-lg-12 -->
    </div>





<br>


<ul class="nav nav-tabs d-print-none" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#descarga" role="tab" aria-controls="descarga" aria-selected="true">Descarga</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pedestres-tab" data-toggle="tab" href="#pedestres" role="tab" aria-controls="pedestres" aria-selected="false">Pedestres</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="veiculos-tab" data-toggle="tab" href="#veiculos" role="tab" aria-controls="veiculos" aria-selected="false" disabled>Veiculos</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade " id="veiculos" role="tabpanel" aria-labelledby="veiculos-tab">
       
      
       
        <div class="row">
           <div class="col-md-6" style="padding-top: 5px; padding-bottom: 5px" >
                
           </div>  
            <div class="col-md-6 text-right" style="padding-top: 5px; padding-bottom: 5px">
                              



<form method="get" class="form-inline float-right">
<input type="hidden" name="t" value="veiculos"/> 

  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input"  name="saida" value="1" id="veiculos1">
    <label class="custom-control-label" for="veiculos1">Mostrar Todos</label>
  </div>

  <button type="submit" class="btn btn-dark my-1"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></button>
  &nbsp
   <a href="JavaScript:void(0)"  class="btn btn-success" onclick="window.print()"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></a>
    &nbsp
               <a href="entrada?saida=1&amp;t=veiculos" class="btn btn-success" style="padding: 0.26rem 0.9rem !important;font-size: 20px;"><span class="icon-file-excel" style="
    padding: 0px !important;
"></span></a> 
  
</form>

              
              
              
           </div>
           <div class="col-md-12" style="margin-bottom: 10px;
    border-bottom: 1px solid #44444438;"></div>
           <div class="col-md-12">
                                    <table class="table display" id="" width="100%" cellspacing="0" style="font-size: 13px; text-transform: uppercase;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Data de Entrada</th>
                                                <th>Placa</th>
                                                <th>Tipo</th>
                                                <th>Descrição</th>
                                                <th>Placa Carreta</th>
                                                <th>Transportador</th>
                                                <th>Sentido</th>
                                                <th>Processo</th>
                                                <th>Motorista</th>
                                                <th>CPF</th>
                                                
                                               
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
                                            
                 			
    <?php foreach ($resultado_veiculos->result() as $row){ ?>

		
				<tr>
					<td><b><?php  echo $row->id_entrada ?></b></td>
					<td><?php  echo $row->data_entrada ?></td>
				
					
					
					<?php 
					
					$placa = $row->placa_cavalo;
					
					if(!$placa){echo '<td>Vazio</td>';
					        echo '<td>Vazio</td>';
					        echo '<td>vazio</td>';}else{ $query = $this->db->query("SELECT * FROM veiculos where placa = '$placa'"); 
					if($query->result()){
					    foreach($query->result() as $tr){
					        echo '<td>'.$tr->placa.'</td>';
					        echo '<td>'.$tr->tipo.'</td>';
					        echo '<td>'.$tr->descricao.'</td>';
					    }
					}else{
					    
					    echo '<td>Vazio</td>';
					        echo '<td>Vazio</td>';
					        echo '<td>vazio</td>';
					    
					}
					            
					        }
					
			
				
					
					
					?>
					<td><?php  echo $row->placa_carreta ?></td>

					<td align="center" valign="top" class="">
					<?php 
					$transportadora = $row->id_transportadora;
					if(!$transportadora){echo 'vazio';}else{ $query = $this->db->query("SELECT nome_transportadora FROM Transportadoras where id_transportadora = '$transportadora'"); 
					
					    foreach($query->result() as $tr){
					        echo $tr->nome_transportadora;
					    }
					}
					?>
					</td>
					<td align="center" valign="top" class=""><?php if($row->sentido == 0 ){echo 'ENTRADA'; }
					if($row->sentido == 1 ){echo 'SAIDA';}
					
					?></td>
						<td align="center" valign="top" class=""><?php echo $row->processo	?></td>
						
									<?php 
					
					$cpf = $row->cpf_motorista;
					
					if(!$cpf){echo '<td>Vazio</td>';
					        echo '<td>Vazio</td>';}else{ $query = $this->db->query("SELECT * FROM pedestres where cpf_pedestre = '$cpf'"); 
					if($query->result()){
					    foreach($query->result() as $tr){
					        echo '<td>'.$tr->nome_pedestre.'</td>';
					        echo '<td>'.$tr->cpf_pedestre.'</td>';
					       
					    }
					}else{
					    
					    echo '<td>Vazio</td>';
					        echo '<td>Vazio</td>';
					        
					    
					}
					            
					        }
					
			
				
					
					
					?>
						
					
					
				
					
					
			
	</tr>
 <?php } ?>			
                                        </tbody>
                                    </table>
                                </div></div>
      
      
      
  </div>
  <div class="tab-pane fade" id="pedestres" role="tabpanel" aria-labelledby="pedestres-tab">
      <div class="row">
       <div class="col-md-6" style="padding-top: 5px; padding-bottom: 5px" ></div>  
       <div class="col-md-6 text-right" style="padding-top: 5px; padding-bottom: 5px">

<form method="get" class="form-inline float-right">
<input type="hidden" name="t" value="pedestres"/> 

  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input"  name="saida" value="1" id="pedestres1">
    <label class="custom-control-label" for="pedestres1">Mostrar Todos</label>
  </div>

  <button type="submit" class="btn btn-dark my-1"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></button>
  &nbsp
   <a href="JavaScript:void(0)"  class="btn btn-success" onclick="window.print()"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></a>
    &nbsp
               <a href="entrada?saida=1&amp;t=veiculos" class="btn btn-success" style="padding: 0.26rem 0.9rem !important;font-size: 20px;"><span class="icon-file-excel" style="
    padding: 0px !important;
"></span></a> 
  
</form>
           </div>
           <div class="col-md-12" style="margin-bottom: 10px;border-bottom: 1px solid #44444438;"></div>
        </div>
         
         
        <div class="table-responsive">
                                    <table class="table display" id="" width="100%" cellspacing="0" style="font-size: 13px; text-transform: uppercase;">
                                        <thead class="d-print-none">
                                            <tr>
                                                <th>#</th>
                                                <th>CPF</th>
                                                <th>Data</th>
                                                <th>Hora</th>
                                                <th>Nome</th>
                                                <th>Operador Entrada</th>
                                                <th>Empresa</th>
                                                <th>Nivel</th>
                                                <th>Opções</th>
                                               
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
                                            
                 			
    <?php foreach ($resultado_pedestres->result() as $row){ ?>

		
				<tr class="d-print-none">
					<td><b><?php  echo $row->id_entrada ?></b></td>
				
					<td align="left" valign="top" class=""><?php echo $row->cpf_pedestre; ?></td>
					<td align="center" valign="top" class="g"><?php echo $row->data_entrada; ?></td>
					<td align="center" valign="top" class=""><?php echo $row->hora_entrada; ?></td>
					<td align="center" valign="top" class=""><?php echo $row->Nome_pedestre;?></td>
					<td align="center" valign="top" class=""><?php echo $row->operador_entrada	?></td>
					<td align="center" valign="top" class=""><?php echo $row->empresa_pedestre; ?></td>
					<td align="center" valign="top" class=""><?php echo $row->nivel_pedestre; ?></td>
					<td>
					    
					    <div class="btn-group" >
  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Opções
  </button>
  <div class="dropdown-menu" style="font-size: 13px;">
      <form method="post">
          <Input name="acao" type="hidden" value="saida"/>
          <Input name="id_entrada" type="hidden" value="<?php echo $row->id_entrada?>"/>
   <button class="dropdown-item" type="submit">Registrar Saída</button></form>
   
   <!-- Button trigger modal -->
<button class="dropdown-item" type="button" data-toggle="modal" data-target="#cracha<?php echo $row->id_entrada?>">Gerar Crachá</button>
 </div>
</div>
					    
					</td>

	</tr>
	
	<!-- Modal -->
<div class="modal fade d-print-block" id="cracha<?php echo $row->id_entrada?>" tabindex="-1" role="dialog" aria-labelledby="cracha" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img width="90px" src="<?php echo base_url()?>assets/img/Logo.svg" style="
    float: left;
    position: absolute;
"/>
                <h5 class="modal-title text-center" style="
    /* text-align: center !important; */
    width: 100%;
" id="exampleModalCenterTitle">Crachá De Visitante</h5>
                <button class="close d-print-none" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
               <h5 class="text-center" style="text-transform: uppercase"><?php echo $row->Nome_pedestre ?></h5>
                <p><b>CPF: </b><?php echo $row->cpf_pedestre ?> </p>
                <p></p>
                <b>Data/Hora entrada:</b><br>
                <p><?php echo $row->data_entrada.' '.$row->hora_entrada ?></p>
                <label>Motivo Visita</label>
                <p><input class="form-control" type="text"/></p>
                
            </div>
            <div class="modal-footer"><button class="btn btn-secondary d-print-none" type="button" data-dismiss="modal">Fechar</button><button class="btn btn-primary d-print-none" onclick="window.print()" type="button"><svg class="svg-inline--fa fa-print fa-w-16 fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path></svg></button></div>
        </div>
    </div>
</div>
	
 <?php } ?>			
                                        </tbody>
                                    </table>
                                </div>
      
      
  </div>
    <div class="tab-pane fade show active" id="descarga" role="tabpanel" aria-labelledby="descarga-tab">
            <div class="row">
       <div class="col-md-6" style="padding-top: 5px; padding-bottom: 5px" ></div>  
       <div class="col-md-6 text-right" style="padding-top: 5px; padding-bottom: 5px">

<form method="get" class="form-inline float-right">
<input type="hidden" name="t" value="descargas"/> 

  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input"  name="saida" value="1" id="descargas">
    <label class="custom-control-label" for="descargas">Mostrar Todos</label>
  </div>

  <button type="submit" class="btn btn-dark my-1"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></button>
  &nbsp
   <a href="JavaScript:void(0)"  class="btn btn-success" onclick="window.print()"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></a>
    &nbsp
               <a href="entrada?saida=1&amp;t=descarga" class="btn btn-success" style="padding: 0.26rem 0.9rem !important;font-size: 20px;"><span class="icon-file-excel" style="
    padding: 0px !important;
"></span></a> 
  
</form>
           </div>
           <div class="col-md-12" style="margin-bottom: 10px;border-bottom: 1px solid #44444438;"></div>
        </div>
       <div class="table-responsive">
   
                                    <table class="table display" id="" width="100%" cellspacing="0" style="font-size: 13px; text-transform: uppercase;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Placa Cavalo</th>
                                                <th>Placa Carreta</th>
                                                <th>Status</th>
                                                <th>Porta</th>
                                                <th>Data entrada</th>
                                                <th>Pes. Inicial</th>
                                                <th>Pes. Final</th>
                                                <th>Destino</th>
                                                <th>Container</th>
                                                <th>Mercadoria</th>
                                                <th>Cliente</th>
                                                <th>Grade</th>
                                                <th>Nota</th>
                                                <th>Protocolo</th>
                                                <th>Romaneio</th>
                                                <th>Observação</th>
                                                
                                               
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
                                            
                 			
    <?php foreach ($resultado_descargas->result() as $row){ ?>

		
				<tr>
					<td><b><?php  echo $row->id_entrada ?></b></td>
				
					<td align="center" valign="top" class=""><?php echo $row->placa_cavalo; ?></td>
					<td align="center" valign="top" class="g"><?php echo $row->placa_carreta; ?></td>
					<td align="center" valign="top" class="g">
					    
					    <?php 
					$status = $row->status;
					if(	$status == ''){ $cor = 'btn-dark'; }
					if(	$status == 'OK'){ $cor = 'btn-success'; }
					if(	$status == 'SUBIR'){ $cor = 'btn-danger'; }
					
					
					    ?>
				
					  <div class="dropdown">
    <button class="btn btn-xs <?php echo $cor ?>" style="width: 100%;" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if(!$row->status){echo '&nbsp';}else{echo $row->status ; }?></button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/entrada/muda_status?status=SUBIR&id=<?php echo $row->id_entrada; ?>">Subir</a>
        <a class="dropdown-item" href="/entrada/muda_status?status=OK&id=<?php echo $row->id_entrada; ?>">OK</a>
        <a class="dropdown-item" href="/entrada/muda_status?status=&id=<?php echo $row->id_entrada; ?>">Limpar</a>
    </div>
</div>  
					    
					</td>
					
					<?php 
					$porta = $row->porta;
					if(!$porta){ $cor = 'btn-dark'; }else{$cor = 'btn-danger';};
					?>
					
					<td align="center" valign="top" class="g">
	<div class="dropdown">
    <button class="btn btn-xs <?php echo $cor ?>" style="width: 100%;" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if(!$row->porta){echo '&nbsp';}else{echo $row->porta ; }?></button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="height: 190px;
    overflow: overlay;">
        <?php
        $porta = $this->db->query("SELECT * FROM porta");
					foreach($porta->result() as $po){
					  echo '<a class="dropdown-item" href="/entrada/muda_porta?porta='.$po->porta.'&id='.$row->id_entrada.'">'.$po->porta.'</a>';
					}
        ?>
     
    </div>
</div> </td>
					<td align="center" valign="top" class="g"><?php echo $row->data_entrada; ?></td>
					<td align="center" valign="top" class="g"><?php if ($row->peso_inicial == '0000-00-00 00:00:00'){echo '';}else{ echo $row->peso_inicial;} ?></td>
					<td align="center" valign="top" class="g"><?php if ($row->peso_final == '0000-00-00 00:00:00'){echo '';}else{ echo $row->peso_final;} ?></td>
					<td align="center" valign="top" class="g"><?php echo $row->processo; ?></td>
					<td align="center" valign="top" class="g"><?php echo $row->sigla_container.'-'.$row->numero_container; ?></td>
					<td align="center" valign="top" class="g">
					<?php 
					$id_mercadoria = $row->id_mercadoria;
					if(	$id_mercadoria != '0'){
					$mercadoria = $this->db->query("SELECT * FROM Categoria_produto WHERE id_categoria = '$id_mercadoria' ");
					foreach($mercadoria->result() as $me){
					  echo $me->nome_categoria; 
					}}else{
					    echo 'não informado';
					}?>
					</td>
					
					<td align="center" valign="top" class="g">
					    
					    <?php 
					$id_filial = $row->id_filial;
					if(	$id_filial != '0'){
					$filial = $this->db->query("SELECT * FROM filiais_internas WHERE id_filial = '$id_filial' ");
					foreach($filial->result() as $fi){
					  echo $fi->nome_filial; 
					}}else{
					    echo 'não informado';
					}?>
					    
					</td>
					
					
					
					<td align="center" valign="top" class=""><?php echo $row->grade; ?></td>
					<td align="center" valign="top" class=""><?php echo $row->nota;	?></td>
						<td align="center" valign="top" class=""><?php echo $row->protocolo	?></td>
					<td align="center" valign="top" class=""><?php echo $row->romaneio; ?></td>
					<td align="center" valign="top" class=""><?php echo $row->observacao; ?></td>
					
				
					
					
			
	</tr>
 <?php } ?>			
                                        </tbody>
                                    </table>
                                </div>
      
      
      
  </div>
</div>


                               
                            