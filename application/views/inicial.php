<div class="container-fluid imagemhead" style="
    background: url(<?php echo base_url(); ?>assets/img/backgroud.jpg);
    height: 500px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
">
  
 
  
</div>
<section class="g-py-100" style="background: #f9f9f9;">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-4 g-px-40 g-mb-50 g-mb-0--lg">
            <!-- Icon Blocks -->
            <div class="text-center">
              <span class="d-inline-block u-icon-v3 u-icon-size--xl bg-success g-color-white rounded-circle g-mb-30">
                  <i class="fas fa-calendar" aria-hidden="true"></i>
              </span>
              <h3 class="h5 g-color-gray-dark-v2 g-font-weight-600 text-uppercase mb-3">Eventos</h3>
              <p class="mb-0">Clique para acessar nossa pagina do facebook e ver as fotos dos eventos.</p>
              <br><br>
              <a class="btn btn-success" href="eventos.asp">Conferir</a>
              <br><br>
            </div>
            <!-- End Icon Blocks -->
          </div>

          <div class="col-lg-4 g-brd-left--lg g-brd-gray-light-v4 g-px-40 g-mb-50 g-mb-0--lg">
            <!-- Icon Blocks -->
            <div class="text-center">
              <span class="d-inline-block u-icon-v3 u-icon-size--xl bg-success g-color-white rounded-circle g-mb-30">
                  <i class="fas fa-building" aria-hidden="true"></i>
                </span>
              <h3 class="h5 g-color-gray-dark-v2 g-font-weight-600 text-uppercase mb-3">Balancetes</h3>
              <p class="mb-0">Preste contas, confira os balancetes.</p>
              <br><br>
              <a class="btn btn-success" href="JavaScript:void()">Conferir</a>
              <br><br>
            </div>
            <!-- End Icon Blocks -->
          </div>

          <div class="col-lg-4 g-brd-left--lg g-brd-gray-light-v4 g-px-40">
            <!-- Icon Blocks -->
            <div class="text-center">
              <span class="d-inline-block u-icon-v3 u-icon-size--xl bg-success g-color-white rounded-circle g-mb-30">
                  <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                </span>
              <h3 class="h5 g-color-gray-dark-v2 g-font-weight-600 text-uppercase mb-3">Aniversariantes</h3>
              <p class="mb-0">Confira os aniversariantes do mês e o presenteie</p>
              <br><br>
              <a class="btn btn-success" href="Aniversariantes?t_mes=<?php echo date('m') ?>">Conferir</a>
              <br><br>
            </div>
            <!-- End Icon Blocks -->
          </div>
        </div>
      </div>
    </section>
    
    
<!-- noticias -->



	 <?php
	 

	 
	 $query = $this->db->query("
    
select * from Eventos
where Numero_Evento = (select max(Numero_Evento) from Eventos)");

   
   foreach ($query->result() as $row){ ?>


<section class="g-py-100">
<div class="container">
<header class="g-width-60x--md mx-auto g-mb-50">

         
  
            <div class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
            <h2 class="h4 u-heading-v2__title g-color-gray-dark-v2 g-font-weight-600 text-uppercase text-center ">Últimas NotÍcias</h2>
          </div>
  <h3><?php echo $row->Evento; ?></h3>
  <br>



<div class="container">
  <?php echo $row->Dados_Evento; ?>
</div>
       
  <br> 

  <p><b><?php echo $row->Data_evento; ?></b></p>
    
    <br>
    <a class="btn btn-secondary" href="eventos">Notícia Anterior</a>  
 <?php } ?>
 
             
              
            
    



          <p></p>
        </header>
        </div>
</section>


<!-- aqui termina as noticias -->
    
    