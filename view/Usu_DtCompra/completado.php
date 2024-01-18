<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big-Smoke : Completado</title>
    <?php require_once '../html/Header.php' ?>
    <style>
        /* Estilo para el borde izquierdo del párrafo */
        #DetalleComp {
            border-left: 30px solid #FAFAFA; /* Puedes ajustar el ancho y el color del borde según tus necesidades */
            padding-left: 60px; /* Puedes ajustar el espacio entre el texto y el borde izquierdo */
        }
    </style>
</head>
<body>
    <?php require_once '../html/Head.php' ?>
    <section>
        <div class="container mt-5">
            <div class="row gx-4 gx-lg-5 align-items-center" >
                <div class="m-2 py-4 col-6"><h1 ><i class="bi bi-check-circle-fill text-success"></i> Compra Realizada.</h1> </div>
                <div class=" py-4 col-5 d-flex align-items-end justify-content-end"><h4 id="Fecha"></h4></div>
                <div class="col-8"><h4 id="DetalleComp"></h4></div>
                    <div class="col-4 d-flex align-items-end justify-content-end"><h5 id="Total"></h5></div>
                    <div class="m-4">
                        <table id="DetalleCom_data"  class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

    </section>
    <?php require_once '../html/Footer.php' ?>
    <?php require_once '../html/Mainjs.php' ?>
    <script type="text/javascript" src="detallecompra.js"></script>
</body>
</html>