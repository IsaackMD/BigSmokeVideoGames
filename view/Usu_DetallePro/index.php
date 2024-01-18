<?php require_once '../../config/conexion.php';
if(isset($_SESSION['UsuarioID'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big-Smoke : Usu DetalleProduct..</title>
    <?php require_once('../html/Header.php'); ?>
</head>
<body>
    <?php require_once('../html/Head.php'); ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5" >
            <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <input type="hidden" id="ID_Pro">
                        <img class="card-img-top mb-5 mb-md-0 border border-secondary" src="" alt="..." id="ImagPro" />
                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1" ><h5 id="Categoria"></h6> </div>
                        <h1 class="display-5 fw-bolder" text="Shop item template" id="Titulo" text="a"></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through" id="PrecioNorm"></span>
                            <strong class="text-dark-500" id="PrecioVen"></strong>
                            <span id="PrecioCDes"><small class="text-success"text="" id="descuento"></small></span> 
                        </div>
                        <p class="lead justify-content-start" id="Desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex" id="btn-container">

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php require_once('../html/Footer.php'); ?>
    <?php require_once('../html/Mainjs.php'); ?>
    <script type="text/javascript" src="usudetallepro.js"></script>
</body>
</html>
<?php
    }else{

    header("Location:".Conectar::ruta()."/view/404/index.php");

}
?>