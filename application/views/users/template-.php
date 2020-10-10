





<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function admin(){
        if($_SESSION['email'] == 'victor.azevedo'){echo 'show';}else{echo  'hidden';}
    }    



?>




<!DOCTYPE html>
<html lang="en">

 
 <?php 
 
 $email = $_SESSION['email'];
 $usuarios = $this->db->query("SELECT * FROM users where email = '$email' "); ?>    
        <?php foreach($usuarios->result() as $users){?>   

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOG'O</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon.ico">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url()?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
 window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
 }, 3500);
</script>


<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>




<style>
  .navbar-brand {
    float: left;
    height: 50px;
    padding: 10px 15px;
    font-size: 18px;
    line-height: 20px;
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #e0e0e0 !important;
    opacity: 1;
}

.input-group-addon{
    background-color: #e0e0e0 !important;
}

.sidebar hr.sidebar-divider {
    margin: 0 1rem 1rem !important;
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
    border: 0 !important;
    border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
}


.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    top:10px;
    right: 10px;
    z-index:9999;
    position: fixed;
}
@media (min-width: 768px){
.sidebar {
    z-index: 1;
    position: absolute;
    width: 250px;
    margin-top: 75px;
}

.py-3{
    
padding:20px;
background: #e0e0e0;
 position: inherit;
    margin: 0 0 0 200px;
box-shadow: 0 -0.20rem 1.75rem 0 rgba(58,59,69,.15)!important
    border-left: 1px solid #e7e7e7;   
}

}
</style>

<body class="bg-primary">

    <div id="wrapper">

        <!-- Navigation -->
<nav class="navbar navbar-static-top shadow" role="navigation" style="margin-bottom: 0; background: #fff;    position: fixed;
    width: 100%;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        
<a class="navbar-brand" style="width: 120px;height: 40px;margin-top: 10px;margin-left: 40px;background-image: url(<?php echo base_url()?>assets/img/Logo.svg);background-size: contain;" href="inicial"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">


                <!-- /.dropdown -->
                
               
                
                
                <li class="dropdown" style="padding: 5px;">
                    <a href="#" class="dropdown-toggle" id="drop3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="
    color: #555;
"><span style="
    padding: 5px;
    position: relative;
    top: -4px;
"><?php echo $_SESSION['name']?> <?php echo $users->sobrenome?></span> <i class="fas fa-user-circle" style="font-size: 25px"></i> 
<span class="caret" style="
    position: relative;
    top: -4px;
"></span> </a> <ul class="dropdown-menu" aria-labelledby="drop3"> 
                    
        <li><a href="#" class="disabled text-center"><strong style="text-transform: capitalize"><?php echo $_SESSION['email']?></strong></a></li>
        
        <li><a href="#" class="disabled text-center"><strong> <?php echo $_SERVER['REMOTE_ADDR'];?></strong></a></li> <li class=""><a href="perfil">Perfil</a></li> <li role="separator" class="divider"></li> 
        <li class="text-center" style="
    position: relative;
    top: -2px;
">
  <a href="users/logout">Sair</a>
</li> </ul> 
               
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="sidebar" role="navigation">
                <div class="sidebar-nav">
         
                    <ul class="nav" id="side-menu">
                        <br>
                        <li>
                        <a href="users"><i class="fas fa-fw fa-tachometer-alt"></i>&nbsp Dashboard</a>
                        </li>
                        <hr class="sidebar-divider">
                        <div class="sidebar-heading">Aplicações</div>
                        
                        <li>
                            <a href="#"><i class="fas fa-truck-loading"></i> Grade de descarga<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="/envia_evento">Add Descarga</a>
                                </li>
                                <li>
                                    <a href="/list_eventos">Grade de Descarga</a>
                                </li>
                          
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fas fa-map-marked-alt"></i>&nbsp Mapeamento<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="mapeamento">Mapeamento</a>
                                </li>
                                <li>
                                    <a href="finalizados">Finalizados</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <hr class="sidebar-divider">
                        <div class="sidebar-heading">Adicionais</div>
                          <li>
                            <a href="#"><i class="fa fa-list-ul fa-fw"></i> Relatório<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="/imprimir_descarga">Descargas</a>
                                </li>
                                      <li class="">
                                    <a href="/horario_descarga">Horario de Descarga</a>
                                </li>
                                <li>
                                    <a href="/relatorio_entradas">Entradas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                <li class="<?php admin() ?>">
                            <a href="#"><i class="fa fa-users-cog fa-fw"></i> Administrativo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="usuarios">Usuarios</a>
                                </li>
                                <li>
                                    <a href="/relatorio_entradas">Entradas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
<hr class="sidebar-divider">
<br>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
<div>

 <div id="contents" style="padding-top: 70px;"><?= $contents ?></div>




</div>



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
   
      <!-- Bootstrap Core JavaScript -->
    <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
 
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
    <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">


$(window).load(function() {
    $('#myModali').modal('show');
});
</script>
<script src='<?php echo base_url() ?>assets/js/bootstrap-datepicker.js'></script><script  src="<?php echo base_url()?>assets/js/script.js"></script>


<script type="text/javascript" >
function abreURL(url,metodo,onde){
   if(metodo=='POST'){
      // metodo post
       $.post(url, function(data) {
      // página do carregador (loading)
       $("#carregador").show();
       $( "#"+onde).load(url);
      });
   }
   else if(metodo=='GET'){
      // metodo get
      $.get(url, function(data) {
     // página do carregador (loading)
      $("#carregador").show();
     $( "#"+onde).load(url);
    });
  }
}
</script>








<!-- Footer -->
<footer class="page-footer font-small  py-3">

  <!-- Copyright -->
  <div class="footer-copyright text-center">2020 desenvolvido por:
    <a target="blank" href="https://www.linkedin.com/in/v1ct0r-4z3v3d0">Victor Azevedo</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>

</html>
<?php } ?>

 <?php $modal = $this->db->query("SELECT * FROM users where email = '$email' and password = 'e19d5cd5af0378da05f63f891c7467af' "); ?>    
       
 <?php foreach($modal->result() as $modali){ ?> 
<div class="modal fade" id="myModali" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Altere sua senha</h4>
      </div>
      <div class="modal-body">
      <p>Sua senha é a padrão de acesso do sistema, altere-a para deixar de ver essa mensagem !!</p>
      <form method="post">
    
	    <input type="hidden" name="acao" value="editar">
        
        
<div class="row">

<hr class="sidebar-divider">
<div class="col-md-12 hidden">
<label class="control-label" for="tipo">Email</label>
<input type="text" class="form-control" name="email" id="email" value="<?php echo $users->email ?>">
<input type="hidden" name="id" value="<?php echo $users->user_id?>">
</div>
<div>&nbsp</div>
<div class="col-md-6">
<label class="control-label" for="nome">Nome</label>
<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $users->name ?>">
</div>

<div class="col-md-6">
<label class="control-label" for="sobrenome">Sobrenome</label>
<input type="text" class="form-control" name="sobrenome" id="sobrenome" value="<?php echo $users->sobrenome ?>">
</div>
<div>&nbsp</div>
<div class="col-md-12">
<label class="control-label" for="senha">Senha</label>
<input type="text" class="form-control" value="abcd1234" name="senha" id="senha">
</div>

<div class="col-md-6 hidden">
<label class="control-label" for="status">Nivel</label>
<select class="form-control " name="status" >
    <option value="<?php echo $users->status ?>" selected><?php if($users->status == '1'){ echo 'Administrador';}
elseif($users->status == '2'){ echo 'Controladoria';}
elseif($users->status == '3'){ echo 'Logistica';}?></option>
    <option value="3">Logistica</option>
    <option value="2">Controladoria</option>   
    <option value="1">Administrador</option>

</select>
</div>
<div>&nbsp</div>

  </div>


			

</div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
      </div>
</div>

       
       
       
       
      </div>
 
      	</form>
   
      </div>

    </div>
  </div>
</div>

<?php } ?>
