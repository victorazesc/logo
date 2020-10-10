<?php 
   
   $matricula = $_GET['Matricula'];
   
     $query = $this->db->query("
    
    SELECT
   *
FROM
   A_associa
INNER JOIN
   A_cidades ON A_associa.Cd_cidade = A_cidades.Cd_cidade
WHERE
    A_associa.Matricula = '$matricula'

    
    ");

   
   foreach ($query->result() as $row){ ?>

		
<section class="g-py-100 conta">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6"><h2>Minha Página</h2></div>
			<div class="col-md-6"><b><?php echo $row->Nome; ?></b> - <?php echo $row->Matricula; ?>-<?php echo $row->Dig; ?> &nbsp; &nbsp; CPF.: <?php echo $row->CPF; ?></div>
		</div>
		<br>	<br>
		<div class="row">				
			<div class="col-md-4" style="padding-bottom: 35px;">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
				<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-expanded="true">Descontos</a>
				<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-expanded="true">Dependentes</a>
				<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-expanded="true">Dados Pessoais</a>
			
			</div>
					</div>
<br class="visible-xs"><br class="visible-xs">

			<div class="col-md-8">			
			<div class="tab-content" id="v-pills-tabContent">

				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					
					<div class="container">
						
							<h4 class="text-center">Dependentes</h4>
							
						<hr><br>
						<p><b> Conjuge.:</b> <?php echo $row->Conjuge; ?>        </p>
						
						<p><b>Data Nascimento.:</b>  <?php echo $row->Dia_aniv_e; ?>/<?php echo $row->Mes_aniv_e; ?>/<?php echo $row->Ano_nasc_e; ?></p>
						
						<hr>
					
						<?php 
   $lista_mes = $_GET["lista_mes"];
     $dep = $this->db->query("
    
    SELECT
   *
FROM
   A_associa
INNER JOIN
   Dependete ON A_associa.Matricula = Dependete.Matricula
WHERE
    A_associa.Matricula = '$matricula'

    
    ");

   
   foreach ($dep->result() as $linha){
   
 
   
   ?>
					
						
						
						<br>
						<p><b> Nome.:</b> <?php echo $linha->Nome_do_dependente; ?>        </p>
						
						<p><b>Data Nascimento.:</b>  <?php echo $linha->Dia_aniv; ?>/<?php echo $linha->Mes_aniv; ?>/<?php echo $linha->Ano_nasc; ?></p>
						
						<hr>
						
						<?php } ?>
						
						
						
					</div>
				</div>
				
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					

					<div class="container">
						<h4 class="text-center">Dados Pessoais</h4>
						<hr><br>
						<p><b>Data Nascimento.:</b>  <?php echo $row->Dia_aniv; ?>/<?php echo $row->Mes_aniv; ?>/<?php echo $row->Ano_aniv; ?></p>
						
						<p><b>Endereço.:</b>  <?php echo $row->Endereco; ?></p>
						
						<p><b>Complemento.: </b> <?php echo $row->Complement; ?></p>
						
						<p><b>Bairro.:</b>  <?php echo $row->Bairro; ?></p>
						<p><b>Cidade.:</b>  <?php echo $row->Nm_cidade; ?>/<?php echo $row->UF; ?></p>
						
						<p><b>CEP.: </b> <?php echo $row->Cep; ?> </p>
						
						<p><b>Telefones.:</b>  <?php echo $row->Fone_residencial; ?> - <?php echo $row->Celular; ?> - </p>
						
						<p><b>E-Mail.:</b>  <?php echo $row->Email; ?> </p>
						<br>	
						<a class="btn btn-secondary" name="news" id="news" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">Alterar Dados</a><p></p>
						
					</div>

					
					</div>

									<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					
<h4 class="text-center">Descontos</h4>
						<hr><br>
<form action="Minha_pagina?Matricula=<?php echo $row->Matricula; ?>" method="GET" >
						
						<input name="Matricula" type="hidden" id="SuaMatricula" maxlength="6" value="917031 ">
						
						<div class="form-row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Selecione o Mês e Ano</label>
							<div class="form-group col-md-4">
							 	
							 	<select class="form-control" name="lista_mes">
							 	    <option><?php echo $lista_mes?></option>
							 	    	<?php 
   
   
 
     $linhames = $this->db->query("
    
    SELECT
   *
FROM
   A_associa
INNER JOIN
   A_lanc_desc ON A_associa.Matricula = A_lanc_desc.Matricula
WHERE
    A_associa.Matricula = '$matricula'

    
    ");

   
   foreach ($linhames->result() as $linhames){ ?>
										
										<option value="<?php echo $linhames->Mesano; ?>"><?php echo $linhames->Mesano; ?></option>
									<?php } ?>	
							</select>

							 </div>
							<div class="form-group col-md-4">
								<input name="Mostrar" type="submit" class="btn btn-dark" id="button" value="Mostrar">
							</div>	
						</div>

					
						</form>
						<br>
						
						
						

										
									
						<table class="table">
							
								
		<thead>
		<tr>
								<th colspan="3" align="center">
									
Descontos do Mês - 				<?php echo $lista_mes?></th>
							</tr>
			<tr>
				<th>Convênio</th>
				<th>Valor</th>
				<th>Observação</th>
			</tr>
		</thead>

				<tbody>									
													
													 	    	<?php 
   
  
 
     $desco = $this->db->query("
    
    SELECT
   *
FROM
   A_cadastro
INNER JOIN A_convenio ON A_cadastro.Cd_convenio = A_convenio.Cd_convenio   
WHERE
    A_cadastro.Mesano = '$lista_mes' and A_cadastro.Matricula = '$matricula'

    
    ");
      

   Error_reporting (0);
    
    foreach ($desco->result() as $desco){ 
    

   
    ?>
							
							<tr>
								<td><?php echo $desco->Nome_fantasia?></td>
								<td align="right"><?php echo 'R$ '. number_format($desco->Valor,2,",",".");?> </td>
								<td></td>
							</tr>
						<?php } ?>	
						<tr>

							
								<th><strong>Total</strong>
								
            <?php $valor = $this->db->query("SELECT SUM(Valor) AS total FROM A_cadastro WHERE A_cadastro.Mesano = '$lista_mes' and A_cadastro.Matricula = '$matricula' ");
                
                   foreach ($valor->result() as $valor){ 
                   
                   $valort = $valor->total;
                   
                   ?>


								</th><td><strong><?php echo 'R$ '. number_format($valort,2,",",".");?></strong></td>   <?php } ?>
								<td></td>
							</tr>
							

				</tbody>			
						</table>
					
						<br>
						
						




				</div>

				
				</div>
			</div>
			</div>


		</div>	
	</section>
	
	<?php } ?>