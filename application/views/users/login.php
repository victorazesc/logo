<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DESCO - Acesso Restrito</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon.ico">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>

html, body { margin:0; height: 100% !important;}


  body {
    margin: 0;
    font-family: "Metropolis", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #687281;
    text-align: left;

  
background-color: #06794f;
    background-image: linear-gradient(135deg, #06794f 0%, rgba(15, 162, 139, 0.8) 100%);
}
.panel{
    margin-top: 40px;
    background: #fff;
    border-radius: 20px;
    color: #333;
}
.footer.footer-dark {
    color: rgba(255, 255, 255, 0.6);

}

.py-4 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
} 

.footer {
    height: 4rem;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
}
small, .small {
    font-size: 1.1em;
    font-weight: 400;
}
#layoutAuthentication {
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    min-height: 100vh;
}
#layoutAuthentication #layoutAuthentication_content {
    min-width: 0;
    flex-grow: 1;
}
form{
    text-align:left;
}

</style>
</head>


<body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center text-center">  <br>     
<a class="navbar-brand" style='width: 195px; height: 65px; background-image: url("<?php echo base_url()?>assets/img/Logo.svg"); background-size: contain;' href="inicial"></a></div>
                                    <div class="card-body">
 
    <?php if(!empty($this->input->get('msg')) && $this->input->get('msg') == 1) { ?>
      <div class="alert alert-danger">
        Por favor entre com uma informação valida.
      </div>
    <?php } ?>
                                         <?php echo form_open('users/dologin'); ?>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Entre com seu usuario!" name="email"></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Entre com sua senha!" name="password"></div>
                          
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password-basic.html">Forgot Password?</a>
                                            
                                            <input  name="enviar" type="submit" class="btn btn-primary" id="enviar" value="Login"></div>
                                        <?php echo form_close(); ?> 
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="javascript:void(document.body.style.backgroundColor='green !important')">Seu IP: <?php echo $_SERVER['REMOTE_ADDR'];?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright Victor Azevedo 2020</div>
                            <div class="col-md-6 text-md-right small">
                     
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <script src="js/sb-customizer.js"></script>
      
    

</body>



































