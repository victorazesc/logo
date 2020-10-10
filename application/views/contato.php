    	<div id="mapa" style="height: 400px; width: 100%">
        </div>
		
		<script src="<?php echo base_url();?>assets/assets/js/jquery.min.js"></script>
 
        <!-- Maps API Javascript -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB--cRvdFluMPVYCeas9JlsE0ZfPT0B_8U&amp;sensor=false"></script>
        
        <!-- Arquivo de inicialização do mapa -->
		<script src="<?php echo base_url();?>assets/js/mapa.js"></script>

<section class="g-py-100">
<div class="container">

<div class="u-heading-v2-3--bottom g-brd-primary g-mb-30">
              <h2 class="h4 u-heading-v2__title g-color-gray-dark-v2 g-font-weight-600 text-uppercase">Contato</h2>
</div>
<div class="row">
	
	<div class="col-md-6">

	<p>Este é nosso espaço para dúvidas, sugestões e comentários</p> <br>

			             
	              	        
	              	         <h5>Endereço</h5> 

	              	            Rua Cabo PM Antônio Rudolf, nº 455 - 
	              	            <br>
	              	            Bairro.:
	              	            Praia Brava
	              	            <br> Cidade.:
	              	            Itajaí/SC
	              	            <br>
	              	            CEP.:
	              	            88306-725
	
              	            <br><br>

	              	       <h5>Telefones</h5>
	              	            (47)3348-0586
              	            
              	            E-Mail
	              	            associacao5demaio@hotmail.com
   <br><br>
   <h5>Expediente</h5>
	              	            Das 08:00 às 12:00h e das 14:00 às 17:00h
              	          <a href="&#10;http://webmail.5demaio.com.br/mewebmail/Mondo/lang/sys/login.aspx&#10;" target="_blank">Web Mail</a>
	              	        
              	      
	</div>
	


<div class="col-md-6">
 <script type="text/javascript">
function ver()
{
document.getElementById('news').action = 'http://masterfitstore.com/enviar.php';
document.getElementById('news').method = 'post';
document.getElementById('news').target = 'visualizar';
document.getElementById('news').submit();


}
</script>

<form action="http://masterfitstore.com/enviar.php" method="get" name="news" id="news">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nome" class="col-form-label">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"  required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="email" class="col-form-label">E-mail</label>
    <input type="email" class="form-control" id="email" placeholder="seuemail@servidor.com" name="email" required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2" class="col-form-label">Telefone</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Telefone" name="telefone"  required>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cidade" class="col-form-label">Cidade</label>
      <input type="text" class="form-control" id="cidade" name="cidade"  required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState" class="col-form-label">Assunto</label>
      <input type="text" class="form-control" id="assunto" id="assunto" name="assunto"  required>
    </div>
  </div>
  <div class="form-group">
  	<label for="mensagem" class="col-form-label">Mensagem</label>
    <textarea class="form-control" name="mensagem" id="mensagem" cols="20" rows="6"  required></textarea>
  </div>
  <br>
  <input name="Visualizar" class="btn btn-success" type="button" onclick="ver();" value="Enviar" />
<input name="Aprovar" class="btn btn-secondary" type="reset" value="limpar" />
</form>

</div>

       
</div>
</section>

<div id="conteudo"></div>