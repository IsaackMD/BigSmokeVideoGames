<?php 
  require_once '../../config/conexion.php';
  if(isset($_POST["submiT"]) and $_POST["submiT"]=="si"){
    require_once '../../model/Usuario.php';
    $usuario = new Usuario();
    $usuario->singup();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big-Smoke : Registrar</title>
    <link href="../../Plantillas/Template_Bracket2.0-master/template/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../Plantillas/Template_Bracket2.0-master/template/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../../Plantillas/Template_Bracket2.0-master/template/css/bracket.css">
</head>
<body>
    <form method="post" id="signUp_Form">
        <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
            <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <?php 
                    if(isset($_GET['m'])){
                        switch($_GET['m']){
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
                    <div class="tx-center mg-b-40">Registrar</div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre(s)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Apellido_P" name="Apellido_P" placeholder="Apellido Paternos">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Apellido_M" name="Apellido_M" placeholder="Apellido Maternos">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" id="contra" name="contra">
                </div>
                <div class="form-group">
                    <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Sexo: </label>
                    <div class="row row-xs">
                        <div class="col-sm-4">
                        <select class="form-control select2" id="Sexo"  name="Sexo" data-placeholder="Seleccionar">
                            <option >Sexo</option>
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                    <input type="hidden" name="submiT" value="si" class="form-control">
                    <button type="submit" class="btn btn-info btn-block">Registro</button>
                <div class="mg-t-40 tx-center">Ya eres Parte.? <a href="http://localhost/Big-Smoke_2.0/view/html/login.php" class="tx-info">Inicia Sesión</a></div>
            </div>
        </div>
    </form>


    
    <script src="../../Plantillas/Template_Bracket2.0-master/template/lib/jquery/jquery.js"></script>
    <script src="../../Plantillas/Template_Bracket2.0-master/template/lib/popper.js/popper.js"></script>
    <script src="../../Plantillas/Template_Bracket2.0-master/template/lib/bootstrap/bootstrap.js"></script>
</body>
</html>