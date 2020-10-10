<div class="row-fluid" style="margin-top: 0">

<div class="col-md-12 visible-desktop"> <h2 class="dash" style="">Relatório de Descarga</h2>
<hr>
</div>

    <div class="col-md-12">
        <div class="panel">

            <div class="panel-body">
                <div class="col-md-12">

                    <form target="_blank" action="<?php echo base_url()?>relatorios/descargaCustom" method="get">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label for="">Data de:</label>
                                    <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" name="dataInicial" readonly />
    <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
</div>
                            </div>
                            <div class="col-md-6">
                                <label for="">até:</label>
                                    <div id="datepicker1" class="input-group date" data-date-format="yyyy-mm-dd">
    <input class="form-control" type="text" name="dataFinal" readonly />
    <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
</div>                                
                                
                                
                                
                            </div>
                        </div>
                         <p>&nbsp</p>
                        <div class="col-md-12" style="margin-left: 0">
                            <div class="col-md-6">
                                <label for="">Unidade Produtora:</label>
                                    <select class="form-control" name="status" id="status" required>
         <option value""></option>
          <?php $status = $this->db->query("SELECT * FROM  filiais"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->Nome;?></option>  
         <?php  }  ?>
     </select>
                                

                            </div>
                        
                        
                            <div class="col-md-6">
                                <label for="">Status:</label>
         <select class="form-control" name="status" id="status" >
         
 <option value""></option>
          <?php $status = $this->db->query("SELECT * FROM  status"); 
          foreach ($status->result() as $status){?>
         <option value""><?php echo $status->status;?></option>  
         <?php  }  ?>


     </select>

                            </div>
                            <p>&nbsp</p>
</div>
                     

                        <div class="col-md-12" style="text-align: center">
                            <input type="reset" class="btn btn-warning" value="Limpar">
                            <button class="btn btn-success"><i class="icon-print icon-white"></i>Imprimir</button>
                        </div>
                    </form>
                </div>
                .
            </div>
        </div>
    </div>
</div>

<script>
    
    
  $a = jQuery.noConflict()

    $a(function () {
  $a("#datepicker1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update');
});
    
</script>
