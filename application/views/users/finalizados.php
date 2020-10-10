<style>

.desunitizado{ background:#333;color:#fff;font-weight:bold;}

</style>


<?php 
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$resultado_curso =  $this->db->query("SELECT * FROM  Eventos where mapeado = 'SIM' order by Data_mapeamento");

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
            $whereStatus = "AND mapeado == 'SIM'";
        }

        if($status != null){
            $whereStatus = "AND status = ".$this->db->escape($status);
        }
        if($protocolo != null){
            $whereProtocolo = "AND protocolo LIKE '%$protocolo%'";
        }
                
	 $resultado_descargas = $this->db->query("SELECT * FROM Eventos WHERE mapeado = 'SIM' $whereContainer  $whereProtocolo order by Data_mapeamento DESC limit $incio, $quantidade_pg ");

  

$total_cursos = $resultado_descargas->num_rows();
?>


<div id="conteudo">


<meta charset="utf-8">

            <div class="row">
                <div class="col-md-6">
                <h3 class="page-header">Descargas Finalizadas </h3>
                </div>
                <div class="col-md-6 text-right">
     <button type="button" class="btn pull-right btn-primary" data-toggle="modal" data-target="#myModal">
 <span class="icon-filter"></span>
</button>       
</div><!-- Button trigger modal -->

                <div class="col-md-12">
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
    <label for="exampleInputEmail1">container</label>
<input type="hidden" name="filtro" value="1">
    <input type="text" class="form-control" id="exampleInputEmail1" name="container" placeholder="Container">
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

	<form name="form_incluir" method="post" action="/list_Eventos.asp" onsubmit="return verifica_form(this);">


	</form>
	
		 <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Protocolo</th>
                                                <th>OC</th>
                                                <th>Data Mapeamento</th>
                                                <th>Unidade</th>
                                                <th>Mapeado por</th>
                                                <th>Opções</th>
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
                                            
                 			
    <?php foreach ($resultado_descargas->result() as $row){ ?>

		
				<tr>
					<td>
					<b><?php  $protocolo = explode("/",$row->protocolo); echo $protocolo['0']; ?></b></td>
				
					<td align="left" valign="top" class=""><?php echo $row->oc; ?></td>
					
					<td align="center" valign="top" class="g"><?php echo $row->data_mapeamento; ?></td>
					<td align="center" valign="top" class=""><?php echo $row->unidade; ?></td>
					<td align="center" valign="top" class=""><?php echo $row->user_map; ?></td>

					
					<td align="center" valign="top" style="padding: 2px !important;">
  <a type="button" class="btn btn-default" href="finalizado?descarga=<?php echo $row->id_descarga; ?>">
      <i class="far fa-eye"></i>
  </a>
</td>
					
			
	</tr>
 <?php } ?>			
                                        </tbody>
                                    </table>




</div>