<style>

/*CSS para impressão*/
@media print {
  .row{
  display: inline-block !important;
  width: 50%;
  }
}

</style>


<script>

function verifica(value){
	var motivo = document.getElementById("motivo");

  if(value == 2){
    motivo.disabled = false;
  }else if(value == 3){
    motivo.disabled = true;
  }
};

</script>

<div id="conteudo">


	<div class="">
                <div class="col-lg-12">
                    <h1 class="page-header">Descarga Finalizada</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <?php 
    
    
    echo (isset($msg) ? $msg : '') ?>
	<form method="post">
	    

	     <?php 
   
   $id = $_GET['descarga'];
   $usuario = $_SESSION['email'];
   $data = date('d/m/Y \à\s H:i:s');
   
    $query = $this->db->query("SELECT
   *
FROM
   Eventos

WHERE
   Eventos.id_descarga = '$id'
 
 

    
    ");
    
    foreach ($query->result() as $row){ ?>
	    
	    <input type="hidden" name="log" value="inserir">
	    <input type="hidden" name="mapeado" value="SIM">
	    <input type="hidden" name="id" value="<?php echo $row->id_descarga; ?>">
	    <input type="hidden" name="data" value="<?php echo $data; ?>">
	    
	    
	    <input type="hidden" name="acao" value="inserir">
	    <input type="hidden" name="id_descarga" value="<?php echo $row->id_descarga; ?>">
	    <input type="hidden" name="usuario" value="<?php echo $_SESSION['email']?>">
	    

	    
	    
	    
<div class="row">
    
<div class="col-md-3">
    <div class="form-group">
     <label class="control-label" for="tipo">Tipo Desova</label>
      <p class="form-control-static"><?php echo $row->Tipo; ?></p>

     
    </div>
</div>


<div class="col-md-2">
    <div class="form-group">
    <label class="control-label" for="oc">Data Chegada</label>
    <p class="form-control-static"><?php echo $row->Data_chegada; ?></p>
    </div>
</div>


  <div class="col-md-4">
    <label class="control-label" for="unidade">Unidade Produtora</label>
   <p class="form-control-static"><?php echo $row->unidade; ?></p>
  </div>
  
    <div class="col-md-3">
    <label class="control-label" for="protocolo">Protocolo</label>
  <p class="form-control-static"><?php echo $row->protocolo; ?></p>
  </div>
  
  </div>
  
  
  <div class="row">
  
  
  <div class="col-md-3">
    <label class="control-label" for="nota">Nf.Az</label>
   <p class="form-control-static"><?php echo $row->nota; ?></p>
  </div>
  <div class="col-md-3">
    <label class="control-label" for="container">Container</label>
   <p class="form-control-static"><?php echo $row->container; ?></p>
  </div>
  <div class="col-md-3">
    <label class="control-label" for="habilitacao">Recebido por:</label>
   <p class="form-control-static"><?php echo $row->Usuario; ?></p>
  </div> 
    <div class="col-md-3">
    <label class="control-label" for="habilitacao">Data de desova</label>
   <p class="form-control-static"><?php echo date("d/m/Y", strtotime($row->desova)); ?></p>
  </div> 
</div>
 <div>&nbsp</div>
  
  <div class="row">

<?php if ($row->oc != null){ ?>
<div class="col-md-3">
    <div class="form-group">
    <label class="control-label" for="oc">OC</label>
    <p class="form-control-static"><?php echo $row->oc; ?></p>
    </div>
</div>
<?php }else{?>

<div class="col-md-3">
    <div class="form-group">
    <label class="control-label" for="certificado">OC</label>
    <p class="form-control-static">Sem OC</p>
    </div>
</div>

<?php }?>

<?php if ($row->certificado != null){ ?>
<div class="col-md-3">
    <div class="form-group">
    <label class="control-label" for="certificado">Certificado</label>
    <p class="form-control-static"><?php echo $row->certificado; ?></p>
    </div>
</div>
<?php }else{?>

<div class="col-md-3">
    <div class="form-group">
    <label class="control-label" for="certificado">Certificado</label>
    <p class="form-control-static">Sem certificado</p>
    </div>
</div>

<?php }?>


 <?php if ($row->habilitacao != null){ ?>
  <div class="col-md-6">
    <label class="control-label" for="habilitacao">Habilitação</label>
   <p class="form-control-static"><?php echo $row->habilitacao; ?></p>
  </div>
  <?php }else{?>

<div class="col-md-6">
    <div class="form-group">
    <label class="control-label" for="certificado">Habilitação</label>
    <p class="form-control-static">Sem Paises Habilitados</p>
    </div>
</div>

<?php }?>   
      

      
  </div>
  
 
  <div class="row">
    <?php if( $row->edi == 'SIM' ){
        echo '
        
        <div class="col-md-2">
    <div class="form-group">
     <label class="control-label" for="diver">EDI</label>
        <p class="form-control-static">SIM</p>
     </div>
</div>
        
        ';} 
        elseif( $row->edi == 'NÃO' ){
         echo '          <div class="col-md-2">
    <div class="form-group">
     <label class="control-label" for="diver">EDI</label>
        <p class="form-control-static">NÃO</p>
     </div>
</div>';   
}else{}?>



    
    <?php if( $row->diver_map == 2 ){
        echo '
        
        <div class="col-md-2">
    <div class="form-group">
     <label class="control-label" for="diver">Diver. Mapeamento</label>
        <p class="form-control-static">SIM</p>
     </div>
</div>
        
        ';} 
        elseif( $row->diver_map == 3 ){
         echo '
         
                 <div class="col-md-2">
    <div class="form-group">
     <label class="control-label" for="diver">Diver. Mapeamento</label>
        <p class="form-control-static">NÃO</p>
     </div>
</div>
         
         
         ';   
            
        }else{}
    
    ?>

     

<?php if ($row->motivo != null){ ?>
<div class="col-md-5">
    <div class="form-group">
     <label class="control-label" for="motivo">Motivo Diver.</label>
      <p class="form-control-static"><?php echo $row->motivo; ?></p>
    </div>
</div>
<?php }else{} ?>
 </div>
  <div>&nbsp</div>
   <div class="row">
       <?php if ($row->observacao != null){ ?>
  <div class="col-md-12">
     <label class="control-label" for="observacao">Observação</label>
    <p class="form-control-static"><?php echo $row->observacao; ?></p>
  </div>
  <?php }else{} ?>
  <div>&nbsp</div>
  <div class="col-md-12">
  <button type="submit" class="btn btn-success hidden-print">Enviar</button>
  
  
  
  <!-- lOG -->
<button type="button" class="btn btn-info hidden-print" data-toggle="modal" data-target="#myModal">
 Log
</button>

<button type="button" class="btn btn-info hidden-print" onClick="window.print()">
<i class="fas fa-fw fa-print"></i>
</button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Log de Edição</h4>
      </div>
      <div class="modal-body">
        
         <?php 
   
      $log = $this->db->query("SELECT
   *
FROM
   Log

WHERE
   Log.id_alterado = '$id'
 
 

    
    ");?>
    
   <table class="table table-condensed table-striped">

<table class="table">
       <thead>
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th class="text-right">Data da Alteração</th>
        </tr>
      </thead>
      <tbody>
 
   <?php foreach ($log->result() as $log){ ?>
    
       <tr>
          <th scope="row"><?php echo $log->id_log ?></th>
          <td><?php echo $log->usuario ?></td>
          
          <td class="text-right"><?php echo $log->data ?></td>
        </tr>
    

    <?php } ?>
        </tbody>
     </table>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
       
      </div>
    </div>
  </div>
</div>
  
  
  
  </div>
  </div>

<?php } ?>
	</form>
	
	
</div>




<br>
<br><br>


