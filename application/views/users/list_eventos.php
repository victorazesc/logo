 <?php echo (isset($msg) ? $msg : '') ?>

<style>
td {
    padding: 5px !important;
    padding-bottom: 0px !important;
    font-size: 14px;
}
.g{padding:0px !important;}
.grade {
    color: #fff;
    font-weight: 500;
    border-radius: 58px;
    height: 100%;
    padding: 5px;
}
table .btn{
    padding: 0px;
}

.dataTable .nav-link {
    display: block;
    padding: 0rem 1rem;
}
.dataTable .input-group {

flex-wrap: nowrap; !important;

}

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
                
	 $resultado_descargas = $this->db->query("SELECT * FROM Eventos WHERE id_descarga != 0 $whereContainer  $whereStatus $whereProtocolo ORDER BY id_descarga DESC ");

  	 $resultado_entradas = $this->db->query("SELECT * FROM Entradas WHERE id_entrada != 0 and processo = 'DESCARGA' and em_grade != '1' ORDER BY id_entrada DESC ");


$total_cursos = $resultado_descargas->num_rows();
?>


<div id="conteudo">


            <div class="row">
                <div class="col-md-6">
                    <h3 class="page-header">Grade de Descarga</h3></div><div class="col-md-6 text-right"> <button type="button" class="btn pull-right btn-primary" data-toggle="modal" data-target="#myModal">
  <span class="icon-filter"></span>
</button><!-- Button trigger modal --></div>

<div class="col-md-12"><hr></div>


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
  <button type="submit" class="btn btn-primary">
      Filtrar</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
                
              
                <!-- /.col-lg-12 -->
            </div>





<br>


                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Protocolo</th>
                                                <th>Tipo</th>
                                                <th>Status</th>
                                                <th>Container</th>
                                                <th>Opções</th>
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
     <?php foreach ($resultado_entradas->result() as $entrada){ ?>
     	<tr>
			<td><b><?php echo $entrada->id_entrada; ?></b></td>
			<td>-</td>
			<td><div align="center"	class="grade ag_entrada">AGUARDANDO ENTRADA</div></td>
			<td><div align="center"><b style="color: #777;"><?php if ($entrada->contentor == 3){ echo $entrada->sigla_container.$entrada->numero_container;}
			          if ($entrada->contentor == 2){ echo  'Truck';}
			          if ($entrada->contentor == 1){ echo 'Camera Fria';}
			?></b></div></td>
								<td align="center" valign="top" style="padding: 2px !important;">


    
<div class="input-group"><div class="input-group-append"><div class="input-group-text" style="
    padding: 0px;
    padding-left: 5px;
    padding-right: 5px;
    margin-right: 10px;
"><a type="button" class="btn btn-default" href="editar_evento?descarga=<?php echo $entrada->id_entrada?>"><span class="icon-edit"></span></a></div></div>

  <div class="btn-group btn-group-md" role="group">
    
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    
                       
                    </div>

  </div>

</div>
    
    



				
	<!-- Modal -->
<div class="modal fade" id="excluir<?php echo $entrada->id_entrada; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excluir Processo</h4>
      </div>
      <div class="modal-body">
          
          <h4>Tem certeza que deseja excluir todo o processo desta descarga?</h4>
          
          <form method="post">
              <input type="hidden" name="descarga" value="<?php echo $entrada->id_entrada; ?>">
              
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
</td>
		</tr>
     <?php } ?>                                        
                 			
    <?php foreach ($resultado_descargas->result() as $row){ ?>

		
				<tr>
					<td>
					<b><?php  $protocolo = explode("/",$row->protocolo); echo $protocolo['0']; ?></b></td>
				
					<td align="left" valign="top" class=""><div align="left"><?php echo $row->Tipo; ?></div></td>
						<td align="center" valign="top" class="g"><div align="center"
						
						class="
				
				<?php if($row->status == 'SOLICITADO'){ echo 'grade solicitado'; }else{};?>
				<?php if($row->status == 'EM DOCA'){ echo 'grade em_doca'; }else{};?>
				<?php if($row->status == 'EM GRADE'){ echo 'grade em_grade'; }else{};?>
				<?php if($row->status == 'AGUARDA CSN'){ echo 'grade aguarda_csn'; }else{};?>
				<?php if($row->status == 'DESUNITIZAÇÃO LIBERADA PATIO'){ echo 'grade patio'; }else{};?>
				<?php if($row->status == 'AGUARDANDO LAUDO'){ echo 'grade ag_laudo'; }else{};?>
				<?php if($row->status == 'DESUNITIZAÇÃO LIBERADA TERM'){ echo 'grade terminal'; }else{};?>
				<?php if($row->status == 'NÃO DESOVAR - AG. VENDA'){ echo 'grade ag_venda'; }else{};?>
				<?php if($row->status == 'AGUARDA ANALISE CQ'){ echo 'grade analise_cq'; }else{};?>
				<?php if($row->status == 'CSN INCORRETO'){ echo 'grade csn_incorreto'; }else{};?>
				<?php if($row->status == 'AGUARDA NOTA DE AZ'){ echo 'grade nota'; }else{};?>
				<?php if($row->status == 'AGUARDA ENTRADA'){ echo 'grade ag_entrada'; }else{};?>
				<?php if($row->status == 'AG. CSI'){ echo 'grade ag_csi'; }else{};?>
				<?php if($row->status == 'AG LEMK'){ echo 'grade ag_lemk'; }else{};?>
				<?php if($row->status == 'AG CQS'){ echo 'grade ag_cqs'; }else{};?>
				" 
						
						><?php echo $row->status; ?></div></td>
					<td align="center" valign="top" class=""><div align="center"><b style="color: #777;"><?php echo $row->container; ?></b></div></td>
					
					<td align="center" valign="top" style="padding: 2px !important;">


    
<div class="input-group"><div class="input-group-append"><div class="input-group-text" style="
    padding: 0px;
    padding-left: 5px;
    padding-right: 5px;
    margin-right: 10px;
"><a type="button" class="btn btn-default" href="editar_evento?descarga=<?php echo $row->id_descarga?>"><span class="icon-edit"></span></a></div></div>

  <div class="btn-group btn-group-md" role="group">
    
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="desunitizar?descarga=<?php echo $row->id_descarga; ?>&status=SOLICITADO">Solicitar</a>
                    <a class="dropdown-item" href="desunitizar?descarga=<?php echo $row->id_descarga; ?>&status=EM DOCA">Em doca</a>
                    <a class="dropdown-item" href="desunitizar?descarga=<?php echo $row->id_descarga; ?>&status=DESUNITIZADO&desova=<?php echo date('Y-m-d')?>&id_entrada=<?php echo $row->id_entrada; ?>">Desunitizar</a>
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
              <input type="hidden" name="id_entrada" value="<?php echo $row->id_entrada; ?>">
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
</td>					
					
			
	</tr>
 <?php } ?>			
                                        </tbody>
                                    </table>
                                </div>
                            