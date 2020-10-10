
<style>
    input{text-transform:uppercase;}
   .botoes .btn{
        border-color: #fff;
        padding: 2.25rem 1.5rem;
   }
    
</style>
<div id="conteudo">

	<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Adicionar Entrada</h3>
                </div>
                <!-- /.col-lg-12 -->
    </div>
    
	<div class="row">
               <div class="col-lg-12">
               <hr>
               </div>
    </div>
<div class="row botoes">
    
 
   
<!-- descarga -->
<button class="btn btn-dark col-md-4 btn-xl " type="button" data-toggle="modal" data-target="#descarga"><span class="icon-download"></span> Descarga</button>
<!-- Carregamento -->
<button class="btn btn-dark col-md-4 btn-xl" type="button" data-toggle="modal" data-target="#carregamento"><span class="icon-upload"></span> Carregamento</button>
<!-- pedestre -->
<button class="btn btn-dark  col-md-4 btn-xl" type="button" data-toggle="modal" data-target="#pedestre" ><span class="icon-user-plus"></span> Pedestre</button>
<!-- veiculos -->
<button class="btn btn-dark  col-md-4 btn-xl" type="button" data-toggle="modal" data-target="#veiculo">Veiculos</button>
<!-- veiculos -->
<button class="btn btn-dark col-md-4  btn-xl" type="button" data-toggle="modal" data-target="#exampleModalXl" disabled>Baixa Vazio</button>
<!-- veiculos -->
<button class="btn btn-dark  col-md-4 btn-xl" type="button" data-toggle="modal" data-target="#exampleModalXl" disabled>Coleta Cheio</button>

</div>
	
</div>

<!--descarga-->
<div class="modal fade" id="descarga">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title">Adicionar descarga</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
            
            <form method="post">
                
                <?php
                
                
               
               $grade = explode(":",date('H:m:s'));
               
            if ($grade['0'] == '06'){  $grade_h = $grade['0']+'1'.":00"; }  
            if ($grade['0'] == '07'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '08'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '09'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '10'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '11'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '12'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '13'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '14'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '15'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '16'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '17'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '18'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '19'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '20'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '21'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '22'){  $grade_h =  "07:00"; }
            if ($grade['0'] >= '23'){  $grade_h =  "07:00"; }
              
                
       
?>
	    	        <input type="hidden" name="acao" value="inserir_descarga">
	    	        <input type="hidden" name="grade" value="<?php echo $grade_h?>">
	    	       
  <div class="row">
    <div class="col-md-12">
       <div class="row">
        <div class="col-md-2">
          <div class="form-group">
        <label class="control-label" for="protocolo">Cliente</label>
        <select name="id_filial" class="form-control">
            <option value=""></option>
            <option value="1">Safrio</option>
            <option value="2">MP/MI JBS</option>
            <option value="3">MP/MI Seara</option>
            <option value="4">Fatiados</option>
            <option value="5">CD</option>
            
        </select>
    </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
           <label class="control-label" for="id_mercadoria">Mercadoria</label>
     <select class="form-control" name="id_mercadoria" id="id_mercadoria" required>
         <option value=""></option>
          <?php $status = $this->db->query("SELECT * FROM  Categoria_produto"); 
          foreach ($status->result() as $status){?>
         <option value="<?php echo $status->id_categoria;?>"><?php echo $status->nome_categoria;?></option>  
         <?php  }  ?>
</select>
   </div>
    </div>
    

   
    <div class="col-md-4">
         <div class="form-group">
           <label class="control-label" for="contentor">Contentor</label>
<select class="form-control" id="myselect" name="contentor">
    <option value="">Selecione uma opção</option>
    <option value="1">Camera Fria</option>
    <option value="2">Truck</option>
    <option value="3">container</option>
</select>
   </div>
    </div>

                <div class="col-md-6">
          <div class="form-group">
        <label class="control-label" for="placa_cavalo">Placa Cavalo</label>
        <input type="text" class="form-control" name="placa_cavalo" id="placa_cavalo" required>
    </div>
    </div>
                    <div class="col-md-6">
          <div class="form-group">
        <label class="control-label" for="placa_carreta">Placa Carreta</label>
        <input type="text" class="form-control" name="placa_carreta" id="placa_carreta" required>
    </div>
    </div>
   
    <div class="col-md-12">
          <div class="form-group">
        <label class="control-label" for="id_transportadora">Transportadora</label>
         <select class="form-control" name="id_transportadora" id="id_transportadora" required>
         <option value=""></option>
          <?php $transportadora = $this->db->query("SELECT * FROM  Transportadoras"); 
          foreach ($transportadora->result() as $transportadora ){?>
         <option value="<?php echo $transportadora->id_transportadora;?>"><?php echo $transportadora->nome_transportadora;?></option>  
         <?php  }  ?>
</select>
    </div>
    </div>
    </div>
    </div>
     <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="cpf_motorista">CPF</label>
        <input type="text" class="form-control" name="cpf_motorista" id="cpf_motorista" onChange="onChangeCpf()" required>
    </div>
    </div>
        <div class="col-md-6">
         <div class="form-group">
           <label class="control-label" for="status">Nome Motorista</label>
<INPUT TYPE="TEXT" class="form-control" id="qqId" value="" disabled/>
   </div>
    </div>
        <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="telefone_motorista">Telefone</label>
        <input type="text" class="form-control" name="telefone_motorista" id="telefone_motorista" required>
    </div>
    </div>
  <div class="col-md-12">
  <div class="form-group">
        <label class="control-label" for="observacao">Observação</label>
        <textarea class="form-control" name="observacao" id="observacao"></textarea>
  </div>
  </div>
  </div>


            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Fechar</a>
	 <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div></div>

<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
 <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Preencher Container</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="sigla_container">Sigla</label>
        <input type="text" class="form-control" name="sigla_container" id="sigla_container">
    </div>
    </div>
                              <div class="col-md-9">
          <div class="form-group">
        <label class="control-label" for="numero_container">Numero</label>
        <input type="text" class="form-control" name="numero_container" id="numero_container">
    </div>
    </div>
            </div>
              
            </div>
            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-primary">OK</a>
            </div>
        </div>
    </div>
</div>

	</form>


</div>
	

<!--Veiculos-->
<div class="modal fade" id="veiculo">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title">Adicionar Veiculo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
            
            <form method="post">
                
          	        <input type="hidden" name="acao" value="entrada_veiculo">
	    	        
  <div class="row">
    <div class="col-md-12">
       <div class="row">
 
    <div class="col-md-6">
          <div class="form-group">
        <label class="control-label" for="placa_cavalo">Placa Cavalo</label>
        <input type="text" class="form-control" name="placa_cavalo" id="placa_cavalo" required>
    </div>
    </div>
                    <div class="col-md-6">
          <div class="form-group">
        <label class="control-label" for="placa_carreta">Placa Carreta</label>
        <input type="text" class="form-control" name="placa_carreta" id="placa_carreta" required>
    </div>
    </div>
   
    <div class="col-md-12">
          <div class="form-group">
        <label class="control-label" for="id_transportadora">Empresa</label>
         <select class="form-control" name="id_transportadora" id="id_transportadora" required>
         <option value=""></option>
          <?php $transportadora = $this->db->query("SELECT * FROM  Transportadoras"); 
          foreach ($transportadora->result() as $transportadora ){?>
         <option value="<?php echo $transportadora->id_transportadora;?>"><?php echo $transportadora->nome_transportadora;?></option>  
         <?php  }  ?>
</select>
    </div>
    </div>
    </div>
    </div>
     <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="cpf_motorista">CPF</label>
        <input type="text" class="form-control" name="cpf_motorista" id="cpf_motorista_v" onChange="onChangeCpfv()" required>
    </div>
    </div>
        <div class="col-md-9">
         <div class="form-group">
           <label class="control-label" for="status">Nome Motorista</label>
<INPUT TYPE="TEXT" class="form-control" id="nome_m" value="" disabled/>
   </div>
    </div>

  <div class="col-md-12">
  <div class="form-group">
        <label class="control-label" for="observacao">Observação</label>
        <textarea class="form-control" name="observacao" id="observacao"></textarea>
  </div>
  </div>
  </div>


            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Fechar</a>
	 <button type="submit" class="btn btn-primary">Enviar</button>
            </div></form>
        </div>
    </div>
</div></div>


<!--Modal Carregamento-->

<div class="modal fade" id="carregamento">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title">Adicionar Carregamento</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
            
            <form method="post">
                
                <?php
                
                
               
               $grade = explode(":",date('H:m:s'));
               
            if ($grade['0'] == '06'){  $grade_h = $grade['0']+'1'.":00"; }  
            if ($grade['0'] == '07'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '08'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '09'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '10'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '11'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '12'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '13'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '14'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '15'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '16'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '17'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '18'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '19'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '20'){  $grade_h =  $grade['0']+'2'.":00"; }
            if ($grade['0'] == '21'){  $grade_h =  $grade['0']+'1'.":00"; }
            if ($grade['0'] == '22'){  $grade_h =  "07:00"; }
            if ($grade['0'] >= '23'){  $grade_h =  "07:00"; }
              
                
       
?>
	    	        <input type="hidden" name="acao" value="inserir_descarga">
	    	        <input type="hidden" name="grade" value="<?php echo $grade_h?>">
	    	       
  <div class="row">
    <div class="col-md-12">
       <div class="row">
        <div class="col-md-2">
          <div class="form-group">
        <label class="control-label" for="protocolo">Cliente</label>
        <select name="id_filial" class="form-control">
            <option value=""></option>
            <option value="1">Safrio</option>
            <option value="2">MP/MI JBS</option>
            <option value="3">MP/MI Seara</option>
            <option value="4">Fatiados</option>
            <option value="5">CD</option>
            
        </select>
    </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
           <label class="control-label" for="id_mercadoria">Mercadoria</label>
     <select class="form-control" name="id_mercadoria" id="id_mercadoria" required>
         <option value=""></option>
          <?php $status = $this->db->query("SELECT * FROM  Categoria_produto"); 
          foreach ($status->result() as $status){?>
         <option value="<?php echo $status->id_categoria;?>"><?php echo $status->nome_categoria;?></option>  
         <?php  }  ?>
</select>
   </div>
    </div>
    

   
    <div class="col-md-4">
         <div class="form-group">
           <label class="control-label" for="contentor">Contentor</label>
<select class="form-control" id="myselect" name="contentor">
    <option value="">Selecione uma opção</option>
    <option value="1">Camera Fria</option>
    <option value="2">Truck</option>
    <option value="3">container</option>
</select>
   </div>
    </div>

                <div class="col-md-6">
          <div class="form-group">
        <label class="control-label" for="placa_cavalo">Placa Cavalo</label>
        <input type="text" class="form-control" name="placa_cavalo" id="placa_cavalo" required>
    </div>
    </div>
                    <div class="col-md-6">
          <div class="form-group">
        <label class="control-label" for="placa_carreta">Placa Carreta</label>
        <input type="text" class="form-control" name="placa_carreta" id="placa_carreta" required>
    </div>
    </div>
   
    <div class="col-md-12">
          <div class="form-group">
        <label class="control-label" for="id_transportadora">Transportadora</label>
         <select class="form-control" name="id_transportadora" id="id_transportadora" required>
         <option value=""></option>
          <?php $transportadora = $this->db->query("SELECT * FROM  Transportadoras"); 
          foreach ($transportadora->result() as $transportadora ){?>
         <option value="<?php echo $transportadora->id_transportadora;?>"><?php echo $transportadora->nome_transportadora;?></option>  
         <?php  }  ?>
</select>
    </div>
    </div>
    </div>
    </div>
     <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="cpf_motorista">CPF</label>
        <input type="text" class="form-control" name="cpf_motorista" id="cpf_motorista" onChange="onChangeCpf()" required>
    </div>
    </div>
        <div class="col-md-6">
         <div class="form-group">
           <label class="control-label" for="status">Nome Motorista</label>
<INPUT TYPE="TEXT" class="form-control" id="qqId" value="" disabled/>
   </div>
    </div>
        <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="telefone_motorista">Telefone</label>
        <input type="text" class="form-control" name="telefone_motorista" id="telefone_motorista" required>
    </div>
    </div>
  <div class="col-md-12">
  <div class="form-group">
        <label class="control-label" for="observacao">Observação</label>
        <textarea class="form-control" name="observacao" id="observacao"></textarea>
  </div>
  </div>
  </div>


            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Fechar</a>
	 <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div></div>

<div class="modal fade" id="exampleModalCentercarregamento">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
 <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Preencher Container</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-3">
          <div class="form-group">
        <label class="control-label" for="sigla_container">Sigla</label>
        <input type="text" class="form-control" name="sigla_container" id="sigla_container">
    </div>
    </div>
                              <div class="col-md-9">
          <div class="form-group">
        <label class="control-label" for="numero_container">Numero</label>
        <input type="text" class="form-control" name="numero_container" id="numero_container">
    </div>
    </div>
            </div>
              
            </div>
            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-primary">OK</a>
            </div>
        </div>
    </div>
</div>

	</form>


</div>
	
</div>

<!--Modal Pedestre-->

<div class="modal fade" id="pedestre" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true" data-backdrop='static'><div id="pedestre"></div>
    <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar entrada</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" >
 
<form method="post">
<input type="hidden" name="acao" value="entrada_pedestre"> 
        
    <div class="col-md-12"><div class="row">
              <div class="col-md-4"> 
    <div class="form-group"><label for="exampleFormControlInput1">CPF</label>
    <input class="form-control" id="cpf_pedestre" type="text" maxlength="11" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" onchange="pedestreCpf()" placeholder="" name="cpf_pedestre" value="">
        </div></div>
       
    
    <div class="col-md-8">
         <div class="row">
      <div class="col-md-8">
    <div class="form-group"><label for="exampleFormControlInput1">Nome:</label>
<input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="nome_pedestre" value="
" disabled></div>
    </div> 
    <div class="col-md-4"> 
    <div class="form-group"><label for="exampleFormControlInput1">Telefone</label>
    <input class="form-control" id="exampleFormControlInput1" value="" type="text" placeholder="" name="telefone_pedestre" disabled>
        </div> </div>
    </div>
         </div>
                     <div class="col-md-12">
         <div class="row">

    </div>
         </div>  
   
           <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Tipo de Pedestre</label>
    <input class="form-control" id="exampleFormControlInput1" value="" type="text" placeholder="" name="tipo_pedestre" disabled>
        </div></div>
    <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Empresa</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" value="" placeholder="" name="empresa_cod" disabled>
        </div> </div>
        
                 
           </div>

    </div>  

     </div> 
    
   
 <hr>
                     
    
   


            <div class="modal-footer"><button class="btn btn-primary" type="button" data-dismiss="modal">Fechar</button></div>
       
    </div></div></div></div></form>

            </div>
            
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>


    function onChangeCpfv(e) {
    var tempo = 5000; //Dois segundos

 
      var cpf = document.getElementById('cpf_motorista_v').value;
       
    (function selectNumUsuarios () {
        $.ajax({
          url: "entrada/busca_pedestre?cpf="+cpf,
            
          success: function (n) {
              //essa é a function success, será executada se a requisição obtiver exito
              $('#nome_m').val(n);
              
          },

       });
    })();
};

    function onChangeCpf(e) {
    var tempo = 5000; //Dois segundos

 
      var cpf = document.getElementById('cpf_motorista').value;
       
    (function selectNumUsuarios () {
        $.ajax({
          url: "entrada/busca_pedestre?cpf="+cpf,
            
          success: function (n) {
              //essa é a function success, será executada se a requisição obtiver exito
              $('#qqId').val(n);
              
          },

       });
    })();
};

    function pedestreCpf(e) {
    var tempo = 5000; //Dois segundos

 
      var cpf = document.getElementById('cpf_pedestre').value;
        var link = "b_pedestre?cpf="+cpf;

    (function selectNumUsuarios () {
        $.ajax({
          url: "b_pedestre?cpf="+cpf,
            
          success: function (n) {
              //essa é a function success, será executada se a requisição obtiver exito
              $('#pedestre').load(link);
              
          },

       });
    })();
};

</script>

