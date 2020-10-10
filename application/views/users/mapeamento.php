<style>

.desunitizado{ background:#333;color:#fff;font-weight:bold;}

</style>


<?php 
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$resultado_curso =  $this->db->query("SELECT * FROM  Eventos where status = 'DESUNITIZADO' and mapeado != 'SIM' ORDER BY desova");

//Contar o total de cursos
$total_cursos = $resultado_curso->num_rows();

//Seta a quantidade de cursos por pagina
$quantidade_pg = 15;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_cursos/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$whereContainer ="";
$whereProtocolo ="";
$whereStatus = "";

$container = $this->input->get('container');
$protocolo = $this->input->get('protocolo');
$status = $this->input->get('status');


       if($container != null){
       
        $whereContainer = "AND container LIKE '%$container%'";
        }
         if($status == null){
            $whereStatus = "AND status == 'DESUNITIZADO'";
        }

        if($status != null){
            $whereStatus = "AND status = ".$this->db->escape($status);
        }
        if($protocolo != null){
            $whereProtocolo = "AND protocolo LIKE '%$protocolo%'";
        }
                
	 $resultado_descargas = $this->db->query("SELECT * FROM Eventos WHERE status = 'DESUNITIZADO' and mapeado is null $whereContainer  $whereProtocolo ORDER BY desova DESC limit $incio, $quantidade_pg ");

  

$total_cursos = $resultado_descargas->num_rows();
?>


<div id="conteudo">


<meta charset="utf-8">

            <div class="row">
                <div class="col-md-6">
                    <h3 class="page-header">Mapeamento</h3></div>
                    <!-- Button trigger modal -->
<div class="col-md-6 text-right" >
 <button type="button" class="btn pull-right btn-primary" data-toggle="modal" data-target="#myModal">
 <span class="icon-filter"></span>
</button>
</div>

<div class="col-md-12" >
<hr>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filtrar</h4>
      </div>
      <div class="modal-body">
        
        <form action="list_eventos" method="GET">
  <div class="form-group">
    <label for="exampleInputEmail1">Container</label>
<input type="hidden" name="filtro" value="1">
    <input type="text" class="form-control" id="exampleInputEmail1" name="container" placeholder="Cntr">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Protocolo</label>

    <input type="text" class="form-control" id="exampleInputEmail1" name="protocolo" placeholder="protocolo">
  </div>
 
     <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
      <select class="form-control" name="status" id="status" >
         <option value""></option>
          <?php $status = $this->db->query("SELECT * FROM  status"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->status;?></option>  
         <?php  }  ?>
     </select>
</div>


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>



 <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Protocolo</th>
                                                <th>Tipo</th>
                                                <th>Desovado</th>
                                                <th>Container</th>
                                                <th>Opções</th>
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
                                            
                 			
    <?php foreach ($resultado_descargas->result() as $row){ ?>

		
				<tr>
					<td><?php  $protocolo = explode("/",$row->protocolo); echo $protocolo['0']; ?></td>
					<td><?php echo $row->Tipo; ?></td>
					<td><?php echo data($row->desova); ?></td>
					<td><?php echo $row->container; ?></td>

					
					
<td align="center" valign="top" style="padding: 2px !important;">

  <a type="button" class="btn btn-danger" href="mapear_descarga?descarga=<?php echo $row->id_descarga; ?>">
      <i class="fas fa-map-marked-alt"></i>&nbsp Mapear
  </a>

</td>	
					
			
	</tr>
 <?php } ?>			
                                        </tbody>
                                    </table>
                                </div>
</div>