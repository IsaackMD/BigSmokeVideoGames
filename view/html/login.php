<?php 
  require_once '../../config/conexion.php';
  if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){
    require_once '../../model/Usuario.php';
    $usuario = new Usuario();
    $usuario->login();
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Big-Smoke : Inicio de Sesión</title>

    <!-- vendor css -->
    <link href="../../Plantillas/Template_Bracket2.0-master/template/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../Plantillas/Template_Bracket2.0-master/template/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../../Plantillas/Template_Bracket2.0-master/template/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
      <form method="post">
          <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
              <?php 
                  if(isset($_GET['m'])){
                    switch($_GET['m']){
                      case '1':
                        ?>
                          <div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          <strong class="d-block d-sm-inline-block-force">Error !</strong>  Datos incorrectos.
                          </div><!-- alert -->
                          <?php
                          break;
                      case '2':
                        ?>
                          <div class="alert alert-warning" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          <strong class="d-block d-sm-inline-block-force">Error !</strong>  Campos Vacios
                          </div>
                          <?php
                    }
                  }

              ?>
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Big-Smoke <span class="tx-normal">]</span></div>
            <div class="tx-center mg-b-60">Pantalla de Inicio De Sesión</div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Ingresa tu correo" name="Correo">
            </div><!-- form-group -->
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Ingresa tu Contraseña" name="Password">
            </div><!-- form-group -->
            <input type="hidden" name="enviar" value="si" class="form-control">
            <button type="submit" class="btn btn-info btn-block">Iniciar</button>

            <div class="mg-t-60 tx-center">No tienes Cuenta.? <a href="http://localhost/Big-Smoke_2.0/view/html/sign_up.php" class="tx-info">Registrar</a></div>
          </div><!-- login-wrapper -->
      </form>
    </div><!-- d-flex -->

    <script src="../../Plantillas/Template_Bracket2.0-master/template/lib/jquery/jquery.js"></script>
    <script src="../../Plantillas/Template_Bracket2.0-master/template/lib/popper.js/popper.js"></script>
    <script src="../../Plantillas/Template_Bracket2.0-master/template/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
