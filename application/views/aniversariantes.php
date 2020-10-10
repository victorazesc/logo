<?php

if ($_GET['t_mes'] == 01){ $mes = 'Janeiro'; }
elseif ($_GET['t_mes'] == 02){ $mes = 'Fevereiro'; }
elseif ($_GET['t_mes'] == 03){ $mes = 'Março';   }
elseif ($_GET['t_mes'] == 04){ $mes = 'Abril'; }
elseif ($_GET['t_mes'] == 05){ $mes = 'Maio'; }
elseif ($_GET['t_mes'] == 06){ $mes = 'Junho';   }
elseif ($_GET['t_mes'] == 07){ $mes = 'Julho'; }
elseif ($_GET['t_mes'] == 08){ $mes = 'Agosto'; }
elseif ($_GET['t_mes'] == 09){ $mes = 'Setembro';   }
elseif ($_GET['t_mes'] == 10){ $mes = 'Outubro'; }
elseif ($_GET['t_mes'] == 11){ $mes = 'Novembro'; }
elseif ($_GET['t_mes'] == 12){ $mes = 'Dezembro';   }





?>




<section class="g-py-100">
	<div class="container">
<div class="row">

	<h2 class="mb-2 mr-sm-2 mb-sm-0">Aniversariantes de</h2>



	<form action="Aniversariantes" method="GET" class="form-inline">
					<select class="form-control mb-2 mr-sm-2 mb-sm-0" name="t_mes" id="Mes">
						<option selected="" value=""><?php echo $mes ?></option>
						<option value="01">Janeiro</option>
						<option value="02">Fevereiro</option>
						<option value="03">Março</option>
						<option value="04">Abril</option>
						<option value="05">Maio</option>
						<option value="06">Junho</option>
						<option value="07">Julho</option>
						<option value="08">Agosto</option>
						<option value="09">Setembro</option>
						<option value="10">Outubro</option>
						<option value="11">Novembro</option>
						<option value="12">Dezembro</option>
					</select>
					<input name="" type="submit" class="btn btn-success" value="Enviar">
	</form>

</div>
		

		
		<br>

		<table width="100%" border="0" class="table table-striped">
			<tbody><tr>
				<th width="60%">Nome</th>
				<th width="5%">Dia</th>
				<th width="35%">Cidade</th>
			</tr>
			 
    <?php 
   
   $mes_aniv = $_GET['t_mes'];
   
   if (empty($mes_aniv)){
       $mes_aniv = date('m');
       }else{
   
   $mes_aniv = $_GET['t_mes'];
   
   }
  


    
    $query = $this->db->query("
    
    SELECT
   *
FROM
   A_associa
INNER JOIN
   A_cidades ON A_associa.Cd_cidade = A_cidades.Cd_cidade
WHERE
   A_associa.Mes_aniv = '$mes_aniv'
   ORDER BY A_associa.Nome ASC
    
    ");

   
   foreach ($query->result() as $row){ ?>

			<tr>
				<td><?php echo $row->Nome; ?>                </td>
				<td><?php echo $row->Dia_aniv; ?></td>
				<td><?php echo $row->Nm_cidade; ?></td>
			</tr>
		
  <?php } ?>
		
			
		</tbody></table>
		<br>
		
		
		<table width="100%" border="0">
			<tbody><tr>

			</tr>
		</tbody></table>
	</div>
</section>