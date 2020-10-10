<div id="conteudo">


	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Adicionar Descarga</h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>
	<div class="row">
               <div class="col-lg-12">
              
               <hr></div>
    </div>

    <?php echo (isset($msg) ? $msg : '') ?>
    
	<form method="post">
	    
	    <input type="hidden" name="acao" value="inserir">
	    <input type="hidden" name="usuario" value="<?php echo $_SESSION['email']?>">


  <div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label" for="tipo">Tipo Desova</label>
            <select class="form-control" name="tipo" id="tipo" required>
            <option value""></option>
             <?php $tipo = $this->db->query("SELECT * FROM  Tipo"); 
             foreach ($tipo->result() as $tipo){?>
             <option value""><?php echo $tipo->Tipo;?></option>  
             <?php  }  ?>
            </select>
        </div>
    </div>
    
    <div class="col-md-2">
          <div class="form-group">
        <label class="control-label" for="oc">OC</label>
        <input type="text" class="form-control" name="oc" id="oc">
        <input type="hidden" class="form-control" name="data_chegada" id="data_chegada" value="<?php echo date('Y-m-d H:m:s')?>">
    </div>
    </div>
    
        <div class="col-md-4">
         <div class="form-group">
           <label class="control-label" for="status">Unidade Produtora</label>
    <select class="form-control" name="status" id="status" required>
         <option value""></option>
          <?php $status = $this->db->query("SELECT * FROM  filiais"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->Nome;?></option>  
         <?php  }  ?>
     </select>
   </div>
    </div>
    
    <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="protocolo">Protocolo</label>
        <input type="text" class="form-control" name="protocolo" id="protocolo" required>
    </div>
    </div>
    
    
    <div class="col-md-3">
    <div class="form-group">
        <label class="control-label" for="nota">Nf.Az</label>
        <input type="text" class="form-control" name="nota" id="nota" required>
     </div>
    </div>
    
    <div class="col-md-3">
        <div class="form-group">
        <label class="control-label" for="container">Container</label>
        <input type="text" class="form-control" name="container" id="container" required>
        </div>
    </div>
    
    <div class="col-md-4">
           <div class="form-group">
             <label class="control-label" for="status">Status</label>
            <select class="form-control" name="status" id="status" required>
                <option value""></option>
                <?php $status = $this->db->query("SELECT * FROM  status"); 
                foreach ($status->result() as $status){?>
                <option value""><?php echo $status->status;?></option>  
                <?php  }  ?>
            </select>
            </div>
    </div>
    
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label" for="datacertificado">Data Cerfiticado</label>

            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
            <input class="form-control" type="text" value="" name="datacertificado" readonly />
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
     <div class="form-group">
        <label class="control-label" for="certificado">Certificado</label>
        <input type="text" class="form-control" name="certificado" id="certificado">
     </div>
    </div>
    
    <div class="col-md-6">
           <div class="form-group">
             <label class="control-label" for="habilitacao">Habilitação</label>
   <input type="text" class="form-control" name="habilitacao" id="habilitacao">
     </div> 
    </div>
    
    <div class="col-md-3">
           <div class="form-group">
             <label class="control-label" for="grade">Grade</label>
    <select class="form-control" name="grade" id="grade" required>
         <option value""></option>
          <?php $status = $this->db->query("SELECT * FROM  grade"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->horario;?></option>  
         <?php  }  ?>
     </select>
     </div>
    </div>
    
    <div class="col-md-12">
          <div class="form-group"><label class="control-label" for="observacao">Observação</label>
   <textarea row="14" type="text" class="form-control" name="observacao" id="observacao"></textarea></div>
    </div>
    
    
  <div class="col-md-12">
  <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
    
  </div>













  </div>


			
	</form>
	
	
</div>


