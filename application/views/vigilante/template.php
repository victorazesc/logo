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

</style>


    </head>



     <?php 
 
 $email = $_SESSION['email'];
 $usuarios = $this->db->query("SELECT * FROM users where email = '$email' "); ?>    
        <?php foreach($usuarios->result() as $users){?>
        

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-light text-center shadow">
            <a class="navbar-brand" href="index.html"><img width="100px" src="<?php echo base_url()?>assets/img/Logo.svg"></a><!-- Navbar Search-->

            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']?> <?php echo $users->sobrenome?> <i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="users/logout"><span class="icon-log-in"></span> Sair</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
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
$(window).load(function() {
    $('#myModali').modal('show');
});
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
         <script>
paceOptions = {
  ajax: true,
  document: true,
  eventLag: false
};

Pace.on('done', function() {
  $('#preloader').delay(500).fadeOut(800);
});
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







