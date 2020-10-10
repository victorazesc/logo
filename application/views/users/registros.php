<h3>Registrar </h3>   
<div id="qqId"></div>
<hr>   
<div>

  <!-- Nav tabs -->

  <ul class="nav nav-tabs nav-fill" id="cardPill" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="veiculos-pill" href="#veiculosPill" data-toggle="tab" role="tab" aria-controls="veiculos" aria-selected="true">Veiculos</a></li>
    <li class="nav-item"><a class="nav-link" id="pedestres-pill" href="#pedestresPill" data-toggle="tab" role="tab" aria-controls="pedestres" aria-selected="false">Pedestres</a></li>
    
        <li class="nav-item"><a class="nav-link" id="transportadoras-pill" href="#transportadorasPill" data-toggle="tab" role="tab" aria-controls="transportadoras" aria-selected="true">Empresas</a></li>
        
    <li class="nav-item"><a class="nav-link" id="filiais-pill" href="#filiaisPill" data-toggle="tab" role="tab" aria-controls="filiais" aria-selected="false">Filiais</a></li>
                                
                                
                                
                                </ul>
                                <hr>

  <!-- Tab panes -->
  <div class="tab-content" id="cardPillContent">
    <div role="tabpanel" class="tab-pane fade active show" id="veiculosPill" aria-labelledby="veiculosPill">
        
        
        <form method="post">
    
         <input type="hidden" value="inserir_veiculo" name="acao" >
         
    <div class="row">
        <div class="col-md-8">
            
     <div class="col-md-12">
        <div class="row">
             <div class="col-md-3">
    <div class="form-group"><label for="placa">Placa</label>
    <input class="form-control" id="placa" type="text" onchange="onChangePlaca()" placeholder="QHE7223" name="placa" ></div>
    </div> 
                    <div class="col-md-9">
    <div class="form-group"><label for="tipo">Tipo</label>
    <select class="form-control" name="tipo">
        <option></option>
        <option>CARRO</option>
        <option>CARRETA</option>
        <option>CAVALO</option>
        <option>MOTO</option>
    </select>
   </div>
    </div>
                <div class="col-md-6">
    <div class="form-group"><label for="proprietario">Proprietario</label>
    <input class="form-control" id="proprietario" type="text" name="proprietario" placeholder=""></div>
    </div> 
    
                <div class="col-md-6">
    <div class="form-group"><label for="descricao">Descrição</label>
    <input class="form-control" id="descricao" type="text" placeholder="" name="descricao"></div>
    </div> </div></div>

    </div> 
    
                    <div class="col-md-4">
                 <div class="col-md-12">
    <div class="form-group"><label for="status">Status</label>
      <select class="form-control" name="status">
        <option></option>
        <option>LIBERADO</option>
        <option>BLOQUEADO</option>

    </select></div>
    </div> 
    <div class="col-md-12">
    <div class="row">
                    <div class="col-md-6">
    <div class="form-group"><label for="anomodelo">Ano modelo</label>
    <input class="form-control" id="anomodelo" type="text" placeholder="" name="ano1"></div>
    </div> 
                    <div class="col-md-6">
    <div class="form-group"><label for="exampleFormControlInput1">.</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="ano2"></div>
    </div> 
    </div>
    </div> 
                       
    

</div></div> 
                     <div class="col-md-12">
    <div class="form-group"><label for="exampleFormControlInput1">Observação</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="observacao"></div>
    </div>

<hr>
                     <div class="col-md-12">
    <div class="form-group"><button type="submit" class="btn btn-success">Cadastrar</button></div>
    </div>


</form>
   
    </div>    
  
    <div role="tabpanel" class="tab-pane fade" id="pedestresPill" aria-labelledby="pedestresPill">
        
         
        <form method="post">
<input type="hidden" name="acao" value="inserir_pedestre"/> 
        
    <div class="col-md-12"><div class="row">
    <div class="col-md-6">
    <div class="form-group"><label for="exampleFormControlInput1">Nome:</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="nome_pedestre"></div>
    </div>        
    
    <div class="col-md-6">
         <div class="row">
        <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">CPF</label>
    <input class="form-control" id="cpf_pedestre" type="text" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onchange="onChangeCpf()" placeholder="" name="cpf_pedestre">
        </div></div>
    <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Telefone</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="telefone_pedestre">
        </div> </div>
    </div>
         </div>
                     <div class="col-md-12">
         <div class="row">

    </div>
         </div>  
   
           <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Tipo de Pedestre</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="tipo_pedestre">
        </div></div>
    <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Empresa</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="empresa_cod">
        </div> </div>
        
                 
           </div>

    </div>  

    
    
    
    <div class="row">
        <div class="col-md-8">
   <div class="col-md-12">
        <div class="row">
       </div></div>
                                <div class="col-md-12">
    <div class="form-group"><label for="exampleFormControlInput1">Observação</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="observacao_pedestre"></div>
    </div>
    
    </div> 
    
                    <div class="col-md-4">
 
    <div class="col-md-12">
    <div class="row">
                    <div class="col-md-6">
    <div class="form-group"><label for="exampleFormControlInput1">Nivel de Acesso</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" value="3" name="nivel_acesso" readonly></div>
    </div> 
                    <div class="col-md-6">
    <div class="form-group"><label for="exampleFormControlInput1">Status Segurança</label>
    <select class="form-control" name="status_seguranca">
        <option selected>LIBERADO</option>
    <option>BLOQUEADO</option>
    </select>
    </div>
    </div> 
    </div>
    </div> 

    

</div></div>
 <hr>
                     <div class="col-md-12">
    <button type="submit" class="btn btn-success pull-left">Cadastrar</button>
    </div>

</form>
        
    </div>
    <div role="tabpanel" class="tab-pane fade" id="transportadorasPill" aria-labelledby="transportadorasPill">
          <form class="">
    
        
    <div class="col-md-12"><div class="row">
    <div class="col-md-3">
    <div class="form-group"><label for="exampleFormControlInput1">Tipo</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder=""></div>
    </div>        
    
    <div class="col-md-3">
         
        
    <div class="form-group"><label for="exampleFormControlInput1">Situação</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div>
     </div><div class="col-md-3">
    <div class="form-group"><label for="exampleFormControlInput1">CNPJ</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> 
    
         </div>
         <div class="col-md-3">
    <div class="form-group"><label for="exampleFormControlInput1">Inscrição Estadual</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> 
    
         </div>
         
         
         <div class="col-md-4">
    <div class="form-group"><label for="exampleFormControlInput1">Nome</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> 
    
         </div>
         <div class="col-md-4">
    <div class="form-group"><label for="exampleFormControlInput1">Fantasia</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> 
    
         </div>
         
                  <div class="col-md-4">
    <div class="form-group"><label for="exampleFormControlInput1">Ramo de Atividade</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> 
    
         </div>
                     <div class="col-md-12">
         <div class="row">

    </div>
         </div>  
   
           <div class="col-md-2"> 
    <div class="form-group"><label for="exampleFormControlInput1">CEP</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div></div>
    <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Endereço</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> </div>
         <div class="col-md-4"> 
    <div class="form-group"><label for="exampleFormControlInput1">Bairro</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> </div>
            <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Cidade</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> </div>
         <div class="col-md-2"> 
    <div class="form-group"><label for="exampleFormControlInput1">UF</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> </div>
                    <div class="col-md-4"> 
    <div class="form-group"><label for="exampleFormControlInput1">Pais</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> </div>
        
                 
           </div>

    </div>  
 <hr>
                     <div class="col-md-12">
    <button class="btn btn-success pull-left">Cadastrar</button>
    </div>
</form>
    
    </div>
    <div role="tabpanel" class="tab-pane fade" id="filiaisPill" aria-labelledby="filiaisPill">
         <form class="">
    
        
    <div class="col-md-12"><div class="row">
    <div class="col-md-6">
    <div class="form-group"><label for="exampleFormControlInput1">Nome:</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder=""></div>
    </div>        
    
    <div class="col-md-6">
         <div class="row">
        <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">CPF</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div></div>
    <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Telefone</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> </div>
    </div>
         </div>
                     <div class="col-md-12">
         <div class="row">

    </div>
         </div>  
   
           <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Tipo de Pedestre</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div></div>
    <div class="col-md-6"> 
    <div class="form-group"><label for="exampleFormControlInput1">Empresa</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="">
        </div> </div>
        
                 
           </div>

    </div>  

    
    
    
    <div class="row">
        <div class="col-md-8">
   <div class="col-md-12">
        <div class="row">
       </div></div>
                                <div class="col-md-12">
    <div class="form-group"><label for="exampleFormControlInput1">Observação</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder=""></div>
    </div>
    
    </div> 
    
                    <div class="col-md-4">
 
    <div class="col-md-12">
    <div class="row">
                    <div class="col-md-6">
    <div class="form-group"><label for="exampleFormControlInput1">Nivel de Acesso</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder=""></div>
    </div> 
                    <div class="col-md-6">
    <div class="form-group"><label for="exampleFormControlInput1">Status Segurança</label>
    <input class="form-control" id="exampleFormControlInput1" type="text" placeholder=""></div>
    </div> 
    </div>
    </div> 

    

</div>
 
</form>
    </div>    
    </div>
  </div>

</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>





    function onChangeCpf(e) {
    var tempo = 5000; //Dois segundos

 
      var cpf = document.getElementById('cpf_pedestre').value;
        

    (function selectNumUsuarios () {
        $.ajax({
          url: "users/busca_pedestre_c?cpf="+cpf,
          success: function (n) {
              //essa é a function success, será executada se a requisição obtiver exito
              $('#qqId').append(n);
              
              
          },

       });
    })();
};

    function onChangePlaca(e) {
    var tempo = 5000; //Dois segundos

 
      var placa = document.getElementById('placa').value;
    
        $.ajax({
          url: "users/busca_placa_c?placa="+placa,
          success: function (n) {
              //essa é a function success, será executada se a requisição obtiver exito
              $('#qqId').append(n);
          },
       });
};


</script>
