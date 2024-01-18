<?php
require_once('../config/conexion.php');
require_once('../model/Usuario.php');

$usuario = new Usuario();

switch ($_GET["op"]) {

    case "ListarUsu":
        $datos = $usuario->ListUsuario();
        $data=array();
        if(is_array($datos)==true and count($datos)<>0){
            foreach($datos as $row){
                $sub_array= array();
                $sub_array[]=$row["UsuarioID"];
                $sub_array[]= '<img src="../../'.$row["Avatar"].'" class="rounded-circle mx-auto d-block" alt="..." height="90px">';
                $sub_array[]=$row["Nombre"]." ".$row['Apellido_P']." ".$row['Apellido_M'];
                if($row["ID_Rol"] == 2){
                    $sub_array[]="<span class='label label-success'>Cliente</span>" ;
                }else{
                    $sub_array[]= "<span class='label label-success'>Administrador</span>" ;
                }
                $sub_array[] = '<button type="button" onClick="editar('.$row["UsuarioID"].')" width="16" height="16" class="btn btn-outline-success btn-icon "><div><i class=" bi bi-pencil-square"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["UsuarioID"].')" width="16" height="16" class="btn btn-outline-danger btn-icon "><div><i class="bi bi-trash-fill"></i></div></button>';
                $data[]= $sub_array;
            }

        }
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($results);
        break;
    case "guardaryeditar":
            if(empty($_POST["UsuarioID"])){
                $usuario->nuevo($_POST["Nombre"],$_POST["Apellido_P"],$_POST["Apellido_M"],$_POST["Correo"],$_POST["Sexo"],$_POST["Password"],$_POST["Avatar"]);
            }else{
                $usuario->actualizar($_POST["UsuarioID"],$_POST["Nombre"],$_POST["Apellido_P"],$_POST["Apellido_M"],$_POST["Correo"],$_POST["Sexo"],$_POST["Password"],$_POST["Avatar"]);
            }
        break;
    case "DetalleUsu":
        $datos= $usuario->usuario_x_id($_POST["UsuarioID"]);
        foreach($datos as $row){
            $output["UsuarioID"] = $row["UsuarioID"];
            $output["Nombre"] = $row["Nombre"];
            $output["Apellido_P"] = $row["Apellido_P"];
            $output["Apellido_M"] = $row["Apellido_M"];
            $output["Correo"] = $row["Correo"];
            $output["Sexo"] = $row["Sexo"];
            $output["Password"] = $row["Password"];
            $output["Avatar"] = $row["Avatar"];
        }
        echo json_encode($output);
        break;
    case "BajaUsu":
        $usuario->Eliminar($_POST["UsuarioID"]);
        break;
}