
<?php
$str = date("Y-m-d");
$mes = (explode("-",$str));
$mes = $mes['1'];

?>


<div id="conteudo">


<meta charset="utf-8">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Relatório de Entradas </h1>
                </div>
            </div>
            <hr>
<div class="row">            
<div class="panel col-md-6">            
<?php  $mapeamento = $this->db->query("SELECT * FROM users where users.status = '3' ");?>
<div class="table-responsive">
    <h4 class="text-center">Mapeamento por Pessoa</h4>
<table class="table table-striped">

				<tbody>
				<tr>
					<td><div align="left" class="style2"><strong>Usuario</strong></div></td>
					<td><div align="center" class="style2"><strong>Total</strong></div></td>
					<td><div align="center" class="style2"><strong>Mês Atual</strong></div></td>
		
				</tr>
			<?php 	foreach ($mapeamento->result() as $row){ $email = $row->email;?>
		
			<tr> 
					<td><div align="left" class="style2"><strong style="    text-transform: capitalize;"><?php echo $email ?></strong></div></td>
					<td><div align="center" class="style2"><strong>
					    
			 <?php  $quant_mapeamento = $this->db->query("SELECT * FROM Eventos where user_map = '$email' ");
			 foreach ($quant_mapeamento->result() as $linha){ 
			 
			  $data = $linha->data_mapeamento;}
			  
			  $quant_mapeamento_t = $quant_mapeamento->num_rows();
			  echo $quant_mapeamento_t; ?>
			</strong></div></td>
								
			<td><div align="center" class="style2"><strong>
					    
			 <?php  $map_mes = $this->db->query("SELECT * FROM Eventos where user_map = '$email' and $mes = MONTH(data_mapeamento) ");
			  $map_mes_t = $map_mes->num_rows(); echo $map_mes_t; ?>
			</strong></div></td>
		
				</tr>
<?php } ?>



		
				
				</tbody></table>	 </div>
				</div>




<div class="panel col-md-6">            
<?php  $recebimento = $this->db->query("SELECT * FROM users where users.status = '2' ");?>
<div class="table-responsive">
    <h4 class="text-center">Recebimento por Pessoa</h4>
<table class="table table-striped">

				<tbody>
				<tr>
					<td><div align="left" class="style2"><strong>Usuario</strong></div></td>
					<td><div align="center" class="style2"><strong>Total</strong></div></td>
					<td><div align="center" class="style2"><strong>Mês Atual</strong></div></td>
		
				</tr>
			<?php 	foreach ($recebimento->result() as $rec){ $email = $rec->email;?>
		
			<tr> 
					<td><div align="left" class="style2"><strong style="    text-transform: capitalize;"><?php echo $email ?></strong></div></td>
					<td><div align="center" class="style2"><strong>
					    
			 <?php  $quant_recebimento = $this->db->query("SELECT * FROM Eventos where Usuario = '$email' ");
			 foreach ($quant_recebimento->result() as $l_rec){ 
			 
			  $data = $l_rec->data_mapeamento;}
			  
			  $quant_recebimento_t = $quant_recebimento->num_rows();
			  echo $quant_recebimento_t; ?>
			</strong></div></td>
								
			<td><div align="center" class="style2"><strong>
					    
			 <?php  $rec_mes = $this->db->query("SELECT * FROM Eventos where Usuario = '$email' and $mes = MONTH(Data_chegada) ");
			  $rec_mes_t = $rec_mes->num_rows(); echo $rec_mes_t; ?>
			</strong></div></td>
		
				</tr>
<?php } ?>



		
				
				</tbody></table>	 </div>
				</div>				
				
				
				
				
				</div>
		
				</div>

