 <?php echo (isset($msg) ? $msg : '') ?>

<style>
.g{padding:0px !important;}
.grade {color:#fff;font-weight:bold; border-radius: 58px;height: 100%;
    padding: 9px;}
.solicitado { background-color: #5bc0de;}
.em_doca{ background: #5cb85c;}
.em_grade{ background: #9C27B0;}
.aguarda_csn{background: rgb(255, 229, 0);}
.patio{background: #2196F3;}
.terminal{background: #185a1b;}
.ag_laudo{background: #FFC107;}
.ag_venda{background: #b1003c;}
.analise_cq{background: #ffd69a;}
.csn_incorreto{background: #F44336;}
.nota{background: #c50e00;}
.ag_entrada{background: #9E9E9E;}
.ag_csi{background-color: #00c7e0;}
.ag_lemk{background: #ab8ab1;}
.ag_cqs{background-color: #ea8d86;}


</style>


<?php 
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$resultado_curso =  $this->db->query("SELECT * FROM  Eventos");

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
            $whereStatus = "AND status != 'DESUNITIZADO'";
        }

        if($status != null){
            $whereStatus = "AND status = ".$this->db->escape($status);
        }
        if($protocolo != null){
            $whereProtocolo = "AND protocolo LIKE '%$protocolo%'";
        }
                
	 $resultado_descargas = $this->db->query("SELECT * FROM Eventos WHERE id_descarga != 0 $whereContainer  $whereStatus $whereProtocolo ORDER BY id_descarga DESC limit $incio, $quantidade_pg ");

  

$total_cursos = $resultado_descargas->num_rows();
?>


<div id="conteudo">


<meta charset="utf-8">

            <div class="row">
                <div class="col-md-6">
                    <h3 class="page-header">Grade de Horário </h3><!-- Button trigger modal -->
                </div>
                <div class="col-md-6">
                              <form class="text-right" target="_blank" action="<?php echo base_url()?>relatorios/imprimirgradehorario" method="get">
                             <button class="btn btn-primary"><span class="icon-printer"></span></button>
                    </form>
                </div>
                     <div class="col-md-12">
                    <hr>
                </div>
                </div>
                
                
                <!-- /.col-lg-12 -->
            </div>




<script>
    $('#excluir').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>








                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Recebido Por</th>
                                                <th>Container</th>
                                                <th class="text-center">Grade Atual</th>
                                                <th class="text-center">Grade Anterior</th>
                                                <th>Opções</th>
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
                                            
                 			
    <?php foreach ($resultado_descargas->result() as $row){ ?>

		
				<tr>
					<td style="width: 150px;"><?php echo $row->Data_chegada; ?></td>
					<td><?php echo $row->Usuario; ?></td>
					<td><?php echo $row->container; ?></td>
					<td class="text-center"><b><?php echo $row->grade_horario; ?></b></td>
					<td class="text-center"><?php echo $row->grade_anterior; ?></td>
					
					
<td align="center" valign="top" style="padding: 2px !important; width: 60px;">
    <div class="input-group"><div class="input-group-append">
</div>

  <div class="btn-group btn-group-md" role="group">
    
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</a>
    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                   
                <?php $status = $this->db->query("SELECT * FROM  grade"); foreach ($status->result() as $status){?>
                
                 <a class="dropdown-item" href="altera_grade?descarga=<?php echo $row->id_descarga; ?>&grade=  <?php echo $status->horario;?>&gradea=  <?php echo $row->grade_horario;?>">  <?php echo $status->horario;?>  </a>
                
              
                <?php  }  ?>
                   
                   
                           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#excluir<?php echo $row->id_descarga; ?>">Excluir</a>
                       
                    </div>

  </div>

</div>
    
    



				
	<!-- Modal -->
<div class="modal fade" id="excluir<?php echo $row->id_descarga; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excluir Processo</h4>
      </div>
      <div class="modal-body">
          
          <h4>Tem certeza que deseja excluir todo o processo desta descarga?</h4>
          
          <form method="post">
              <input type="hidden" name="descarga" value="<?php echo $row->id_descarga; ?>">
              <input type="hidden" name="protocolo" value="<?php echo $row->protocolo; ?>">
              <input type="hidden" name="acao" value="excluir">
      
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
        <button type="submit" class="btn btn-primary">Sim</button>
      </div>
      </form>
    </div>
  </div>
</div>				
					
					
			
	</tr>
 <?php } ?>			
                                        </tbody>
                                    </table>
                                </div>


</div>
