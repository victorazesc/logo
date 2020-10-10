
<style>
    input{
        
        text-transform: uppercase;
        
    }
    
    
</style>


<div id="conteudo">

  <?php 
   
   $id = $_GET['descarga'];
   $usuario = $_SESSION['email'];
   $data = date('d/m/Y \à\s H:i:s');
   $query = $this->db->query("SELECT * FROM Eventos WHERE Eventos.id_descarga = '$id'");
   $entrada = $this->db->query("SELECT * FROM Entradas WHERE Entradas.id_entrada= '$id' and em_grade != 1");?>
    
   <?php foreach ($query->result() as $row){ ?>
	<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Editar descarga</h3>
                </div>
                <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                    <hr>
                </div>
            </div>


	<form method="post">
	    
	    <input type="hidden" name="log" value="inserir">
	    <input type="hidden" name="id" value="<?php echo $row->id_descarga; ?>">
	    <input type="hidden" name="data" value="<?php echo $data; ?>">
	    <input type="hidden" name="acao" value="update">
	    <input type="hidden" name="id_descarga" value="<?php echo $row->id_descarga; ?>">
	    <input type="hidden" name="usuario" value="<?php echo $_SESSION['email']?>">

<div class="row">
    

      <div class="col-md-3">
          <div class="form-group">
          <label class="control-label" for="datacertificado">Data de Chegada</label>
          <div id="" class="input-group date" data-date-format="yyyy-mm-dd">
          <input class="form-control" type="text" value="<?php echo $row->Data_chegada;?>" name="datacertificado" readonly disabled />
           </div>
          </div>
     </div> 
  

    <div class="col-md-4">
        
    <div class="form-group">
    <label class="control-label" for="unidade">Unidade Produtora</label>
    <select class="form-control" name="unidade" id="unidade" required>
         <option value""><?php echo $row->unidade;?></option>
          <?php $status = $this->db->query("SELECT * FROM  filiais"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->Nome;?></option>  
         <?php  }  ?>
     </select>
  </div>
  </div>
  
  
    <div class="col-md-2">
        <div class="form-group">
    <label class="control-label" for="protocolo">Protocolo</label>
   <input type="text" class="form-control" name="protocolo" id="protocolo" value="<?php echo $row->protocolo; ?>">
  </div>
  </div>
  
    <div class="col-md-3">
    <div class="form-group">
     <label class="control-label" for="tipo">Tipo Desova</label>
     <select class="form-control" name="tipo" id="tipo">
         <option value""><?php echo $row->Tipo; ?></option>
         
 <option value""></option>
          <?php $tipo = $this->db->query("SELECT * FROM  Tipo"); 
          foreach ($tipo->result() as $tipo){?>
         <option value""><?php echo $tipo->Tipo;?></option>  
         <?php  }  ?>

     </select>
     
    </div>
</div>
  
  <div class="col-md-3">
      <div class="form-group">
    <label class="control-label" for="nota">Nf.Az</label>
   <input type="text" class="form-control" name="nota" id="nota" value="<?php echo $row->nota; ?>">
  </div></div>
  <div class="col-md-4">
      <div class="form-group">
    <label class="control-label" for="container">Container</label>
   <input type="text" class="form-control" name="container" id="container" value="<?php echo $row->container; ?>">
  </div></div>
    <div class="col-md-2">
        <div class="form-group">
    <label class="control-label" for="dias">Dias CSN</label>
   <input type="text" class="form-control" name="dias" id="dias" value="
   
   <?php
   
   $date = $row->Data_certificado;
   
   if (strpos($date, '/') !== false) {
   
   $data = str_replace("/", "-", $date);
   $date_expire = date('Y-m-d', strtotime($data));
   $quantdia = new DateTime($date_expire);
   $now = new DateTime();
   echo  $quantdia->diff($now)->format("%d");
   }else{ $date_expire = $date; 
   $date = new DateTime($date_expire);
   $now = new DateTime();
   echo $date->diff($now)->format("%d");
} ?>">
  </div> </div>
    <div class="col-md-3">
       <div class="form-group"> 
    <label class="control-label" for="status">Status</label>
    <select class="form-control" name="status" id="status" >
         <option value""><?php echo $row->status; ?></option>
 <option value""></option>
          <?php $status = $this->db->query("SELECT * FROM  status"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->status;?></option>  
         <?php  }  ?>


     </select>
  </div>
  </div>



<div class="col-md-3">
     <div class="form-group">
    <label class="control-label" for="oc">OC</label>
   <input type="text" class="form-control" name="oc" id="oc" value="<?php echo $row->oc; ?>">
    <input type="hidden" class="form-control" name="data_chegada" id="data_chegada" value="<?php echo date('d/m/y')?>">
   </div>
 </div>
  <div class="col-md-9">
      <div class="form-group">
    <label class="control-label" for="habilitacao">Habilitação</label>
   <input type="text" class="form-control" name="habilitacao" id="habilitacao" value="<?php echo $row->habilitacao; ?>">
  </div>
  </div>


  <div class="col-md-4">
      <div class="form-group">
     <label class="control-label" for="certificado">Certificado</label>
   <input type="text" class="form-control" name="certificado" id="certificado" value="<?php echo $row->certificado; ?>">
  </div> </div>
  <div class="col-md-4">
      <div class="form-group">
     <label class="control-label" for="datacertificado">Data Cerfiticado</label>
     <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" name="datacertificado" value="<?php 
   
   $date = $row->Data_certificado;
   
if($date == '0000-00-00'){
    
}else{ echo $row->Data_certificado;}
?>" readonly />
    <span class="input-group-addon hidden"><i class="fas fa-calendar-alt"></i></span>
</div>
</div></div>

    <div class="col-md-4">
        <div class="form-group">
     <label class="control-label" for="media">Diária</label>
   <input type="text" class="form-control" name="media" id="media" value="
    <?php
   
   if($row->desova == null){
   $diaria = $row->Data_chegada; 
   $date = new DateTime($diaria);
   $now = new DateTime();
   echo $date->diff($now)->format("%d");}else{
       
         $diaria = $row->desova; 
   $date = new DateTime($diaria);
   $now = new DateTime();
   echo $date->diff($now)->format("%d");
       
   }
 ?>
   
   
   ">
  </div>
  </div>

  <div class="col-md-12">
      <div class="form-group">
     <label class="control-label" for="observacao">Observação</label>
   <textarea row="14" type="text" class="form-control" name="observacao" id="observacao"><?php echo $row->observacao; ?></textarea>
  </div>
 </div>
  <div class="col-md-12">
      
  <button type="submit" class="btn btn-success">Enviar</button>
  
  
  
  <!-- lOG -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
 Log
</button>


<span class="text-right pull-right"> <?php 

if ($row->desova != null){

echo '<h3>Desunitizado dia'. date("d/m/Y", strtotime($row->desova)).'</h3><span>';
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
        
         <?php $log = $this->db->query("SELECT * FROM Log WHERE Log.id_alterado = '$id' ");?>
    
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
 
   <?php foreach ($log->result() as $log){  ?>
   
   
   <?php if($log->id_log){ ?>
        
        <tr>
          <th scope="row"><?php echo $log->id_log ?></th>
          <td><?php echo $log->usuario ?></td>
          <td class="text-right"><?php echo $log->data ?></td>
        </tr>
   
   <?php }else{?>

        <tr>
          <th scope="row"></th>
          <td>Nenhum registro a ser mostrado</td>
          <td class="text-right"></td>
        </tr>
        
    <?php }} ?>
    
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
	
	



 <?php foreach ($entrada->result() as $entrada){ ?>
	<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Editar descarga</h3>
                </div>
                <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                    <hr>
                </div>
            </div>

<form method="post">
	    
	    <input type="hidden" name="log" value="inserir">
	    <input type="hidden" name="id" value="<?php echo $entrada->id_entrada; ?>">
	    <input type="hidden" name="id_entrada" value="<?php echo $entrada->id_entrada; ?>">
	    <input type="hidden" name="acao" value="inserir">
	    <input type="hidden" name="usuario" value="<?php echo $_SESSION['email']?>">
	    <input type="hidden" value="<?php echo $entrada->data_entrada;?>" name="data_entrada"/>
	    <input type="hidden" value="<?php echo $entrada->grade ?>" name="grade"/>

<div class="row">
    

      <div class="col-md-3">
          <div class="form-group">
          <label class="control-label" for="datacertificado">Data de Chegada</label>
          <div id="" class="input-group date" data-date-format="yyyy-mm-dd">
          <input class="form-control" type="text" value="<?php echo $entrada->data_entrada;?>" name="data_entrada" readonly disabled />
           </div>
          </div>
     </div> 
  

    <div class="col-md-4">
        
    <div class="form-group">
    <label class="control-label" for="unidade">Unidade Produtora</label>
    <select class="form-control" name="unidade" id="unidade" required>
         <option value""></option>
         <?php $status = $this->db->query("SELECT * FROM  filiais"); foreach ($status->result() as $status){?>
         <option value""><?php echo $status->Nome;?></option>  
         <?php  }  ?>
     </select>
  </div>
  </div>
  
  
    <div class="col-md-2">
        <div class="form-group">
    <label class="control-label" for="protocolo">Protocolo</label>
   <input type="text" class="form-control" name="protocolo" id="protocolo" value="">
  </div>
  </div>
  
    <div class="col-md-3">
    <div class="form-group">
     <label class="control-label" for="tipo">Tipo Desova</label>
     <select class="form-control" name="tipo" id="tipo">
         <option value""></option>
         
 <option value""></option>
          <?php $tipo = $this->db->query("SELECT * FROM  Tipo"); 
          foreach ($tipo->result() as $tipo){?>
         <option value""><?php echo $tipo->Tipo;?></option>  
         <?php  }  ?>

     </select>
     
    </div>
</div>
  
  <div class="col-md-3">
      <div class="form-group">
    <label class="control-label" for="nota">Nf.Az</label>
   <input type="text" class="form-control" name="nota" id="nota" value="">
  </div></div>
  <div class="col-md-4">
      <div class="form-group">
    <label class="control-label" for="container">Container</label>
   <input type="text" class="form-control" name="container" id="container" value="<?php if ($entrada->contentor == 3){ echo $entrada->sigla_container.$entrada->numero_container;}
			          if ($entrada->contentor == 2){ echo  'Truck';}
			          if ($entrada->contentor == 1){ echo 'Camera Fria';}
			?>">
  </div></div>

   <input type="hidden" class="form-control" name="dias" id="dias" value="" disabled>

    <div class="col-md-3">
       <div class="form-group"> 
    <label class="control-label" for="status">Status</label>
    <select class="form-control" name="status" id="status" >
         <option value"">AGUARDA ENTRADA</option>

          <?php $status = $this->db->query("SELECT * FROM  status"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->status;?></option>  
         <?php  }  ?>


     </select>
  </div>
  </div>



<div class="col-md-2">
     <div class="form-group">
    <label class="control-label" for="oc">OC</label>
   <input type="text" class="form-control" name="oc" id="oc" value="">
    <input type="hidden" class="form-control" name="data_chegada" id="data_chegada" value="<?php echo $entrada->data_entrada?>">
   </div>
 </div>
 
   <div class="col-md-2">
      <div class="form-group">
    <label class="control-label" for="placa_cavalo">Placa do Cavalo</label>
   <input type="text" class="form-control" name="placa_cavalo" id="placa_cavalo" value="<?php echo $entrada->placa_cavalo?>">
  </div></div>
  
    <div class="col-md-2">
      <div class="form-group">
    <label class="control-label" for="placa_carreta">Placa do Carreta</label>
   <input type="text" class="form-control" name="placa_carreta" id="placa_carreta" value="<?php echo $entrada->placa_carreta?>">
  </div></div>
 
  <div class="col-md-8">
      <div class="form-group">
    <label class="control-label" for="habilitacao">Habilitação</label>
   <input type="text" class="form-control" name="habilitacao" id="habilitacao" value="">
  </div>
  </div>


  <div class="col-md-9">
      <div class="form-group">
     <label class="control-label" for="certificado">Certificado</label>
   <input type="text" class="form-control" name="certificado" id="certificado" value="">
  </div> </div>
  <div class="col-md-3">
      <div class="form-group">
     <label class="control-label" for="datacertificado">Data Cerfiticado</label>
     <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" name="datacertificado" value="" readonly />
    <span class="input-group-addon hidden"><i class="fas fa-calendar-alt"></i></span>
</div>
</div></div>


   <input type="hidden" class="form-control" name="media" id="media" value="">


  <div class="col-md-12">
      <div class="form-group">
     <label class="control-label" for="observacao">Observação</label>
   <textarea row="14" type="text" class="form-control" name="observacao" id="observacao"><?php echo $entrada->observacao; ?></textarea>
  </div>
 </div>
  <div class="col-md-12">
      
  <button type="submit" class="btn btn-success">Enviar</button>
  
  
  
  <!-- lOG -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
 Log
</button>





  
  
  </div>
  </div>

<?php } ?>
	</form>
	
	
</div>
</div>

<br>
<br><br>


