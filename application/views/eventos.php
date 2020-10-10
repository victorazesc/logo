<section class="">

<div class="container">	
<br>
<br>
<br>
	<h2>Eventos</h2>
<br>

	 <?php   $query = $this->db->query("
    
    SELECT
   *
FROM
   Eventos

   ORDER BY Eventos.Numero_Evento DESC
    
    ");

   
   foreach ($query->result() as $row){ ?>

	
		<div class="card">
  <div class="card-header">
   <?php echo $row->Tipo; ?>
  </div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row->Evento; ?></h4>
    <p class="card-text"><?php echo $row->Resumo_Evento; ?></p>
    <br>
    <a href="mostrar?id_evento=<?php echo $row->Numero_Evento; ?>" class="btn btn-primary">Ver Detalhes</a>
  </div>
    <div class="card-footer text-muted">
   <?php echo $row->Data_evento; ?>
  </div>
</div>
<br>		
			
		
		
  <?php } ?>
		
	  
	    

     

         	
    
  <br>
 </div>
</section>