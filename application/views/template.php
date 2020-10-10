<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  
	<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
    

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<META NAME="DescriÃ§Ã£o" CONTENT="AssociaÃ§Ã£o Beneficente dos Militares Estaduais de Itajai/Santa Catarina">
<title>DESCO</title>
<meta name="copyright" content="AssociaÃ§Ã£o 5 de Maio">
<meta name="keywords" content="AssociaÃ§Ã£o, associacao, beneficente, repersentativa, subtenentes, sargentos, policia, militar, santa catarina, Itajai">
<meta name="robots" content="ALL">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<style>
#conteudo{
    padding-bottom:50px;
}
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="
    z-index: 99;
">
<div class="container-fluid">
  <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/img/logo.svg" alt="" style="
    WIDTH: 150PX;
"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    <ul class="navbar-nav ml-auto" style="padding-right: 50px;">
        

        
    <li class="nav-item"><a class="nav-link" href="inicial" >Inicial</a> </li>
    <li class="nav-item"><a class="nav-link" href="institucional">Institucional</a></li>
    <li class="nav-item"><a class="nav-link" href="http://sigrhportal.sea.sc.gov.br/SIGRHNovoPortal/">Contra-cheque</a></li>
    <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/associacao5demaio">Not&#237;cias</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php/formularios/">Formul&aacute;rios</a></li>
    <li class="nav-item"><a class="nav-link" href="eventos">Eventos</a></li>
   
    <li class="nav-item"><a class="nav-link" href="contato">Contato</a></li>
    </ul>


  </div>

<form class="cel" action="Minha_pagina" method="get" onSubmit="return verifica_form(this);"> 

  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="mat form-control form-control-sm" name="Matricula" id="Matricula" aria-describedby="Matricula" placeholder="Matricula" maxlength="6">
      <input type="hidden" name="lista_mes" value="<?php echo date('m/Y', strtotime("-1 months"))?>">
    </div>
    <div class="form-group col-md-2">
      <button type="submit" class="btn btn-outline-success btn-sm">Enviar</button>
    </div>
    </div>


</form>

</div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Primeiro Acesso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe marginheight="0" marginwidth="0" frameborder="0" src="Primeiro_acesso.asp" name="visualizar" id="visualizar" trusted="yes" application="yes" scrolling="yes" style="width: 100%;min-height: 400px;height: 415px;"></iframe>

      </div>
    </div>
  </div>
</div>
        </header>
        </div>
</section>


 <div id="contents"><?= $contents ?></div>



		<!-- Aqui vai abrir o Menu -->
    	<div id="contacts-section" class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 g-py-60">
      <div class="container">
        <div class="row">
          <!-- Footer Content -->
          <div class="col">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Sobre</h2>
            </div>

            <p>Fundada no dia 08 de dezembro de 1988, por um grupo de Policiais Militares especificamente do 1&#176; BPM &#45; Itaja&#237; e Bombeiros Militares da 5&#170; SCI/1&#176; GGI, para a finalidade de Fundarem uma Associa&#231;&#227;o com sede em Itaja&#237;.</p>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Links</h2>
            </div>

            <nav class="text-uppercase1">
              <ul class="list-unstyled g-mt-minus-10 mb-0">
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="http://www.pm.sc.gov.br/" target="_blank">PMSC - Pol&#237;cia Militar de Santa Catarina</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="http://www.cb.sc.gov.br/" target="_blank">BMSC - Bombeiro Militar de Santa Catarina</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="http://www.sea.sc.gov.br/" target="_blank">SEA - Secretaria de Estado da Administra&#231;&#227;o</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="http://www.detran.sc.gov.br/" target="_blank">DETRAN/SC - Departamento Estadual de Tr&#226;nsito</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="http://scsaude.sea.sc.gov.br/" target="_blank">SC Sa&#250;de</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                                <li class="g-pos-rel g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="http://www.bb.com.br" target="_blank">Banco do Brasil</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                                                <li class="g-pos-rel g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="https://consultas.ciasc.gov.br/rh/login.asp" target="_blank">CIASC</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                                                <li class="g-pos-rel g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="http://www.aprasc.org.br/index.php" target="_blank">APRASC</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
              </ul>
            </nav>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Contato</h2>
            </div>

            <address class="g-bg-no-repeat g-font-size-12 mb-0" style="background-image: url(https://htmlstream.com/preview/unify-v2.2/assets/img/maps/map2.png);">
          <!-- Location -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-map-marker"></i>
              </span>
            </div>
            <p class="mb-0">R. Cabo-Pm Ant&#244;nio Rodolfo,<br> 310 - Praia Brava, <br> Itaja&#237; - SC, 88306-725</p>
          </div>
          <!-- End Location -->

          <!-- Phone -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-phone"></i>
              </span>
            </div>
            <p class="mb-0">(47) 3348 - 0586 <br> (47) 3348 - 8913 <br> (47) 9 8893 - 6269</p>
          </div>
          <!-- End Phone -->

          <!-- Email and Website -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-globe"></i>
              </span>
            </div>
            <p class="mb-0">
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:info@htmlstream.com">associacao5demaio@hotmail.com</a>
              <br>
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="https://www.facebook.com/associacao5demaio">facebook.com/associacao5demaio</a>
            </p>
          </div>
          <!-- End Email and Website -->
        </address>
          </div>
          <!-- End Footer Content -->
        </div>
      </div>
    </div>

    <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20">
      <div class="container">
        <div class="row">
          <div class="col-md-9 text-center text-md-left g-mb-10 g-mb-0--md">
            <div class="d-lg-flex">
             <small>
              <ul class="u-list-inline">
                <li class="list-inline-item">
                  <p class="g-color-white-opacity-0_8 g-color-white--hover" href="#">2017 &#169; Todos os direitos reservados a :
<a href="https://azevedoseg.com">Azevedo Seguran&ccedil;a & Tecnologia</a> .</p>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="users">Restrito</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#">License</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#">Support</a>
                </li>
      
              </ul>
              </small> 
            </div>
          </div>

          <div class="col-md-3 align-self-center">
            <ul class="list-inline text-center text-md-right mb-0">
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                <a href="#" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                <a href="#" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-skype"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                <a href="#" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                <a href="#" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-pinterest"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                <a href="#" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                <a href="#" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/gobutton.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    



</body>
</html>    



 
