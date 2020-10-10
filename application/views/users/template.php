<?php defined('BASEPATH') OR exit('No direct script access allowed');
echo (isset($msg) ? $msg : '');
function admin(){ if ($_SESSION['email'] == 'victor.azevedo'){echo 'show';}else{echo  'hidden';}}?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOG'O</title>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon.ico">
        <link href="<?php echo base_url()?>assets/css/novo.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>assets/icomoon/seticone.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css">
        <link href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<style>

/* width */
::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

input{
    text-transform:uppercase;
}

.btn-xs {
    padding: 0.25rem 0.5rem;
    font-size: 0.7rem;
    border-radius: 0.35rem;
    line-height: 1;
}

</style>


    </head>

     <?php 
 
 $email = $_SESSION['email'];
 $usuarios = $this->db->query("SELECT * FROM users where email = '$email' "); ?>    
        <?php foreach($usuarios->result() as $users){?>
        

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-light text-center shadow">
            <a class="navbar-brand" href="index.html"><img width="100px" src="<?php echo base_url()?>assets/img/Logo.svg"></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Pesquisar por..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']?> <?php echo $users->sobrenome?> <i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="perfil"><span class="icon-settings"></span> Configurações</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="users/logout"><span class="icon-log-in"></span> Sair</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Núcleo</div>
                            <a class="nav-link" href="users"
                                ><div class="sb-nav-link-icon"><span class="icon-activity"></span></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Aplicações</div>
                            
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#acesso" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><span class="icon-key"></span></div>
                                 Controle de Entrada
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="acesso" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="add_entrada">Add Entrada</a>
                                <a class="nav-link" href="entrada">Controle de Entrada</a></nav>
                            </div>
                            
                            
                             <a class="nav-link" href="registros"><div class="sb-nav-link-icon"><span class="icon-user-plus"></span></div>
                                 Registros                      </a>
                            
                            
                            
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><span class="icon-truck2"></span></div>
                                 Grade de descarga
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="/envia_evento">Add Descarga</a><a class="nav-link" href="/list_eventos">Grade de Descarga</a></nav>
                            </div>
                            
                            
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1"
                                ><div class="sb-nav-link-icon"><span class="icon-map"></span></div>
                                 Mapeamento
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="/mapeamento">Mapear</a><a class="nav-link" href="/finalizados">Finalizado</a></nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Adicionais</div>
                            
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2"
                                ><div class="sb-nav-link-icon"><span class="icon-printer"></span></div>
                                 Relatórios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/imprimir_descarga">Descargas</a>
                                <a class="nav-link" href="/horario_descarga">Horario de Descarga</a>
                                <a class="nav-link" href="/relatorio_entradas">Entradas</a>
                                
                                </nav>
                            </div>
                       <!--adminitrativo-->
                       <div class="<?php admin() ?>">
                       <div class="sb-sidenav-menu-heading ">Adminitrativo</div>
                            
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3"
                                ><div class="sb-nav-link-icon"><span class="icon-settings"></span></div>
                                 Adminitrador
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="usuarios">Usuarios</a>
                          
                                
                                </nav>
                            </div>
                        </div>
                       
                       
                       
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main style="padding-top: 20px;">
                    <div class="container-fluid">
     
     <?= $contents ?>
     
     
                    </div>
                </main>

            </div>
        </div>

        <script src="<?php echo base_url()?>assets/js/pace.js"></script>

       <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

 <script src="<?php echo base_url()?>assets/js/novo.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script><script src='<?php echo base_url() ?>assets/js/bootstrap-datepicker.js'></script>
      
<script src="<?php echo base_url()?>assets/js/datatables-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>



<script type="text/javascript">
//$(window).load(function() {
  //  $('#myModali').modal('show');
//});
</script>



<script>

    $('#excluir').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>

<script>
 window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });
 }, 5500);
</script>
        <script>
        $('#datepicker').datepicker({
        ok: '',
        clear: 'Clear selection',
        close: 'Cancel'
        })
      </script>


  
<script>
    
    $(document).ready(function(){ //Make script DOM ready
    $('#myselect').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="3"){ //Compare it and if true
            $('#exampleModalCenter').modal("show"); //Open Modal
        }
        
    });
});
    

$(document).ready(function () {
    $('#abrir').click(function () {
        $('#descarga').modal({
            show: true
        })
    });
        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });
});
    
</script>

<!--carregamento-->
<script>
    
    $(document).ready(function(){ //Make script DOM ready
    $('#myselect').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="3"){ //Compare it and if true
            $('#exampleModalCentercarregamento').modal("show"); //Open Modal
        }
        
    });
});
    

$(document).ready(function () {
    $('#abrir').click(function () {
        $('#carregamento').modal({
            show: true
        })
    });
        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });
});
    
</script>
       
<script>
    
    $(document).ready(function() {
    $('table.display').DataTable();
} );

$('.nav-tabs a[href="#<?php if (isset($_GET['t'])){echo $_GET['t']; }else{echo " ";} ?>"]').tab('show')
    
</script>


    </body>
    <?php } ?>
</html>







