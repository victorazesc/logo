
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


	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mapear descarga</h1>
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
   $data_atual= date('Y-m-d H:i:s');
   
    $query = $this->db->query("SELECT  * FROM  Eventos WHERE  Eventos.id_descarga = '$id'");
    
    foreach ($query->result() as $row){
    
 
    ?>
    
	    <input type="hidden" name="log" value="inserir">
	    <input type="hidden" name="mapeado" value="SIM">
	    <input type="hidden" name="id" value="<?php echo $row->id_descarga; ?>">
	    <input type="hidden" name="data" value="<?php echo $data_atual; ?>">
	    
	    
	    <input type="hidden" name="acao" value="inserir">
	    <input type="hidden" name="id_descarga" value="<?php echo $row->id_descarga; ?>">
	    <input type="hidden" name="usuario" value="<?php echo $_SESSION['email']?>">
	    

	    
	    
	    
<div class="row">
    
<div class="col-md-3">
    <div class="form-group">
     <label class="control-label" for="tipo">Tipo Desova</label>
     <select class="form-control" name="tipo" id="tipo" disabled>
         <option value""><?php echo $row->Tipo; ?></option>
      </select>
     
    </div>
</div>

<div class="col-md-3">
     <div class="form-group">
    <label class="control-label" for="oc">OC</label>
   <input type="text" class="form-control" name="oc" id="oc" value="<?php echo $row->oc; ?>" disabled>
    <input type="hidden" class="form-control" name="data_chegada" id="data_chegada" value="<?php echo date('d/m/y')?>" disabled >
   </div>
 </div>

  <div class="col-md-4">
    <label class="control-label" for="unidade">Unidade Produtora</label>
   <input type="text" class="form-control" name="unidade" id="unidade" value="<?php echo $row->unidade; ?>" disabled >
  </div>
    <div class="col-md-2">
    <label class="control-label" for="protocolo">Protocolo</label>
   <input type="text" class="form-control" name="protocolo" id="protocolo" value="<?php echo $row->protocolo; ?>" disabled >
  </div>
  
  </div>
  
  
  <div class="row">
  
  
  <div class="col-md-3">
    <label class="control-label" for="nota">Nf.Az</label>
   <input type="text" class="form-control" name="nota" id="nota" value="<?php echo $row->nota; ?>" disabled >
  </div>
  <div class="col-md-3">
    <label class="control-label" for="container">Container</label>
   <input type="text" class="form-control" name="container" id="container" value="<?php echo $row->container; ?>" disabled >
  </div>

  <div class="col-md-6">
    <label class="control-label" for="habilitacao">Habilitação</label>
   <input type="text" class="form-control" name="habilitacao" id="habilitacao" value="<?php echo $row->habilitacao; ?>" disabled>
  </div>
 <div>&nbsp</div>
  
  <div class="col-md-3">
    <label class="control-label" for="habilitacao">Recebido por:</label>
   <input type="text" class="form-control" name="habilitacao" id="habilitacao" value="<?php echo $row->Usuario; ?>" disabled>
  </div> 
  
    <div class="col-md-3">
    <label class="control-label" for="data_chegada">Data Chegada:</label>
   <input type="text" class="form-control" name="data_chegada" id="data_chegada" value="<?php echo $row->Data_chegada; ?>" disabled>
  </div> 
  
    <div class="col-md-3">
    <label class="control-label" for="data_desova">Data Desova:</label>
   <input type="text" class="form-control" name="data_desova" id="data_desova" value="<?php echo $row->desova; ?>" disabled>
  </div> 
  
      <div class="col-md-3">
    <label class="control-label" for="data_desova">Diaria:</label>
   <input type="text" class="form-control" name="diaria" id="diaria" value="
   
       <?php
   $desova = $row->desova; 
   $data_chegada = $row->Data_chegada;
   $date = new DateTime($desova);
   $now = new DateTime($data_chegada);
   echo $date->diff($now)->format("%d");
       
 ?>
   
   
   " disabled>
  </div> 
 </div>
 <div>&nbsp</div>
 <div class="row">
     
     
     <div class="col-md-3">
    <div class="form-group">
     <label class="control-label" for="edi">EDI</label>
     <select class="form-control" name="edi" id="edi"  required>
         <option value""><?php echo $row->edi; ?></option>
         <option value"">SIM</option>
        <option value"">NÃO</option>
     </select>
     
    </div>
</div>

<div class="col-md-3">
    <div class="form-group">
     <label class="control-label" for="diver">Diver. Mapeamento</label>
     <select class="form-control" name="diver" id="diver" onchange="verifica(this.value)" required>
    <option value="<?php echo $row->diver_map ?>" selected><?php if( $row->diver_map == 2 ){echo 'SIM';}
    elseif( $row->diver_map == 3 ){echo 'NÂO';}else{}
    
    ?></option>
    <option value="2">SIM</option>
    <option value="3">NÃO</option>
     </select>
     
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
     <label class="control-label" for="motivo">Motivo Diver.</label>
     <select class="form-control" name="motivo" id="motivo" disabled>
         <option value""><?php echo $row->motivo; ?></option>
          <?php $motivo = $this->db->query("SELECT * FROM Motivo ");
          
          foreach($motivo->result() as $motivo ){ ?>
              
              <option value""><?php echo $motivo->Motivo?></option>
              
           <?php } ?>
         <option value""></option>
        
     </select>
     
    </div>
</div>
     
     
 </div>
 
  <div>&nbsp</div>
   <div class="row">
  <div class="col-md-12">
     <label class="control-label" for="observacao">Observação</label>
   <textarea row="14" type="text" class="form-control" name="observacao" id="observacao"><?php echo $row->observacao; ?></textarea>
  </div>
  <div>&nbsp</div>
  <div class="col-md-12">
  <button type="submit" class="btn btn-success">Enviar</button>
  
  
  
  <!-- lOG -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
 Log
</button>


<span class="text-right pull-right"> <?php 

if ($row->desova != null){

echo '<h3>Desunitizado dia '.date("d/m/Y", strtotime($row->desova)).' </h3><span>';
}else{


}?>

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


