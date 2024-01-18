<?php require_once '../../config/conexion.php';
if(isset($_SESSION['UsuarioID'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big-Smoke : Carrito</title>
    <?php require_once '../html/Header.php' ?>
</head>
<body>
    <?php require_once '../html/Head.php' ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5" >
            <div class="row">
                <h3 class="py-4">Detalle De Compra</h5>
                <div class="col-md-6" id="paypal-button-container">
                </div>
                <div class="col-md-6">
                <table id="carrito_data"  class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th style="width:8%" >Imagen </th>
                            <th style="width:12%" >Producto</th>
                            <th style="width:5%; text-align: center;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
                <div class="d-flex align-items-end justify-content-end" id="carrito-container">
                    <h3 id="total" text=""></h3>
                </div>
            </div>
        </div>
    </section>
    <?php require_once '../html/Footer.php' ?>
    <?php require_once '../html/Mainjs.php' ?>

    <script src="https://www.paypal.com/sdk/js?client-id=AT80_Ft4nnChPuAUsVfhe3lsuB-HSPdLEQE9Paa9iwCpL3gS_jvSRbGrOXtP8_QgyhfopSGTzBdy23QG&currency=MXN"></script>
    <script type="text/javascript" src="usudtcompra.js"></script>
</body>
</html>
<?php 
    }else{

    header("Location:".Conectar::ruta()."/view/404/index.php");

}
?>