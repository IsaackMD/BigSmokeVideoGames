<?php

require_once ("../config/conexion.php");
require_once ("../model/Categoria.php");

$categoria = new Categoria();

switch($_GET["op"]){
    case "combo":
        $datos = $categoria->get_categoria();
        if(is_array($datos) == true and count($datos)>0){
            $html = "<option label ='Seleccione Categoria..' name ='ID_CAT' id='ID_CAT'></option>";
            foreach($datos as $row){
                $html .= "<option value =".$row['ID_Cat'].">".$row['Categoria']."</option>";
            }
            echo $html;
        }
        break;
}



?>