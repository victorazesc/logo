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

  	 $resultado_entradas = $this->db->query("SELECT * FROM entrada_funcionarios WHERE id_entrada != 0 ORDER BY id_entrada DESC ");


$total_cursos = $resultado_descargas->num_rows();
?>


<div id="conteudo">


            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-header">Controle Funcionarios</h3></div>
                    <!-- Button trigger modal -->
<div class="col-md-12 text-center">
    <br>
<button type="button" class="btn btn-xl btn-primary" data-toggle="modal" data-target="#funcionario" style="
    width: 100%;
">
 Registrar Entrada/Saida
</button> 
</div>



<!-- Modal -->
<div class="modal fade" id="funcionario" tabindex="-1" role="dialog" aria-labelledby="funcionario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Registrar Entrada/Saida</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                
                <form method="post" class="text-center">
                   
                   <input type="hidden" name="acao" value="inserir" />
                   
                   <label>Nº Cartão</label>
                   <input type="number" class="form-control" name="n_cartao" style="
    font-size: 40px;
    text-align: center;
">
                   <br>
                    <button class="btn btn-primary" type="submit">Registrar</button> 
                </form>
               
                
            </div>
            
        </div>
    </div>
</div>


<div class="col-md-12">
    <br>
<hr>
</div>

                </div>





<br>


                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               
                                                <th>Cartão</th>
                                                <th>Data</th>
                                                <th>Hora Entrada</th>
                                                <th>Hora Saída</th>
                                               
                                            </tr>
                                        </thead>
   
                                        <tbody>
     <?php foreach ($resultado_entradas->result() as $entrada){ ?>
     	<tr>
			
			<td><?php echo $entrada->n_cartao; ?></td>
			<td><?php echo $entrada->data_entrada; ?></td>
			<td><?php echo $entrada->hora_entrada; ?></td>
			<td><?php echo $entrada->hora_saida; ?></td>

						
		</tr>
     <?php } ?>                                        
                 			
 
                                        </tbody>
                                    </table>
                                </div>
                            