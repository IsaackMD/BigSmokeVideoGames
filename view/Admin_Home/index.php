<?php require_once '../../config/conexion.php';
if(isset($_SESSION['UsuarioID'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big-Smoke : Admin Inicio</title>
    <?php require_once '../html/Adm_Head.php'?>
</head>
<body>
    <?php require_once '../html/Admin_Header.php'?>
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Usuarios</h4>
        <p class="mg-b-0">Lista de Usuarios Activos.</p>
      </div><!-- d-flex -->
      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
          <div class="col-sm-3 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion-android-people tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Usuarios Activos.</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">1,975,224</p>
                  <span class="tx-11 tx-roboto tx-white-6">24% higher yesterday</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card col-12 m-2">
            <div class="card-header">
              Lista De Usuarios
            </div>
            <div class="card-body">
              <!-- Button trigger modal -->
              <button  class="btn btn-outline-success m-2" id="add_button" onclick="nuevo()"><i class="fa fa-plus-square"></i> Nueva Usuario</button>
              <table id="tablaUsuarios" class="table table-striped table-bordered dt-responsive nowrap m-4 ">
                <thead class="thead-dark">
                  <tr>
                      <th class="text-white">Usuario ID</th>
                      <th class="text-white">Imagen</th>
                      <th class="text-white">Nombre</th>
                      <th class="text-white">Rol</th>
                      <th ></th>
                      <th ></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    </div>


    <?php require_once '../html/Admin_Footer.php'?>
    <?php require_once '../html/Admin_Mainjs.php'?>
    <?php require_once 'modalusuarios.php'?>
    <script type="text/javascript" src="adminhome.js"></script>
</body>
</html>
<?php 
    }else{

    header("Location:".Conectar::ruta()."/view/404/index.php");

}
?>