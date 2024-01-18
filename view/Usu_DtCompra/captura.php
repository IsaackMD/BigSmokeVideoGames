<?php
    require '../../config/conexion.php';
    require '../../view/Usu_DtCompra/index.php';
    
    
    $db = new Conectar();
    $conectar = $db->Conexion();
    
        $json = file_get_contents('php://input');
        $datos=json_decode($json,true);
        
        echo '<pre>';
        print_r($datos);
        echo '</pre>';

        
        if(is_array($datos)){
            $id_transaccion = $datos['detalles']['id'];
            $status = $datos['detalles']['status'];
            $monto = $datos['detalles']['purchase_units'][0]['amount']['value'];
            $fecha = $datos['detalles']['update_time'];
            $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
            $emailClient = $_SESSION['Correo'];
            $nom = $_SESSION["usu_Nombre"];
            
            $sql = $conectar->prepare("call Confi_compra(?,?,?,?,?);");
            $sql->execute([$id_transaccion,$fecha_nueva,$status,$monto,$_SESSION['UsuarioID']]);


            

           

        }
        
        include "../html/SendEmail.php";



?>