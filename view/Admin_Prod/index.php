<?php require_once '../../config/conexion.php';
if(isset($_SESSION['UsuarioID'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../html/Adm_Head.php'?>
</head>
<body>
    <?php require_once '../html/Admin_Header.php'?>
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Productos</h4>
        <p class="mg-b-0">Lista de Productos.</p>
      </div><!-- d-flex -->
      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="bg-danger rounded overflow-hidden">
                <div class="pd-25 d-flex align-items-center">
                    <i class=" ion-ios-box-outline tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Productos</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">$329,291</p>
                    <span class="tx-11 tx-roboto tx-white-6">$390,212 before tax</span>
                    </div>
                </div>
                </div>
            </div><!-- col-3 -->
            <div class="card col-12 m-2">
            <div class="card-header">
              Lista De Usuarios
            </div>
            <div class="card-body">
              <!-- Button trigger modal -->
              <button  class="btn btn-outline-success m-2" id="add_button" onclick="nuevo()"><i class="fa fa-plus-square"></i> Nueva Usuario</button>
              <table id="tablaProductos" class="table table-striped table-bordered dt-responsive nowrap m-4 ">
                <thead class="thead-dark">
                  <tr>
                      <th class="text-white">ProductoID</th>
                      <th class="text-white">Imagen</th>
                      <th class="text-white">Nombre</th>
                      <th class="text-white">Precio</th>
                      <th class="text-white">Descuento</th>
                      <th ></th>
                      <th ></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php require_once '../html/Admin_Footer.php'?>
    </div>
    <?php require_once '../html/Admin_Mainjs.php'?>
    <?php require_once 'modalproductos.php'?>
    <script type="text/javascript" src="adminproducto.js"></script>
</body>
</html>
<?php
    }else{

    header("Location:".Conectar::ruta()."/view/404/index.php");

}
?>