<br>



	 <?php  
	 
	 $id = $_GET['id_evento'];
	 
	 $query = $this->db->query("
    
    SELECT  * FROM  Eventos 
    WHERE Numero_Evento = $id

   ORDER BY Eventos.Evento ASC
    
    ");

   
   foreach ($query->result() as $row){ ?>
<div class="container">


		<div class="card">
  <div class="card-header">
      <h4 class="text-center"><?php echo $row->Evento; ?></h4>
   <strong><?php echo $row->Tipo; ?>   </strong>
  </div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text"><?php echo $row->Dados_Evento; ?></p>
    <br>
   
  </div>
    <div class="card-footer text-muted">
   <?php echo $row->Data_evento; ?>
  </div>
</div>
<br>
	<a class="btn btn-secondary" href="eventos">Lista de Eventos</a>
		<br>
</div>
<br>		
	
		
		
  <?php } ?>