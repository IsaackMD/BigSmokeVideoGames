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
            <div class="row gx-4 gx-lg-5 align-items-center" >
                <table id="carrito_data"  class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th style="width:8%" >Imagen </th>
                            <th style="width:12%" >Producto</th>
                            <th style="width:5%; text-align: center;">Total</th>
                            <th style="width:2%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="d-flex align-items-end justify-content-end" id="carrito-container">
                <h5 id="total"></h5>
            </div>
            <div class="d-flex align-items-end justify-content-end">
                <a class="btn btn-info text-light btn-lg m-3" href="http://localhost/Big-Smoke_2.0/view/Usu_DtCompra">Realizar Compra</a>
            </div>
        </div>
    </section>
    <?php require_once '../html/Footer.php' ?>
    <?php require_once '../html/Mainjs.php' ?>
    <script type="text/javascript" src="usucarrito.js"></script>
</body>
</html>
<?php 
    }else{

    header("Location:".Conectar::ruta()."/view/404/index.php");

}
?>