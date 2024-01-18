<?php require_once '../../config/conexion.php';
if(isset($_SESSION['UsuarioID'])){

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Big-Smoke : Usu inicio </title>
    <?php require_once('../html/Header.php'); ?>
    </head>
    <body>
    <?php require_once('../html/Head.php'); ?>
        <header class="bg-dark py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">Big-Smoke</h1>
                        <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                    </div>
                </div>
        </header>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="productos-container">

                </div>
            </div>

        </section>

        <?php require_once('../html/Footer.php'); ?>
        <?php require_once('../html/Mainjs.php'); ?>
        <script type="text/javascript" src="usuhome.js"></script>
    </body>
    </html>
<?php 
    }else{

    header("Location:".Conectar::ruta()."/view/404/index.php");

}
?>