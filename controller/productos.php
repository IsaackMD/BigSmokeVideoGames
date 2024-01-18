<?php
require_once('../config/conexion.php');
require_once('../model/Producto.php');

$productos = new Producto();

switch ($_GET["op"]) {
    case "Inicio":
        $datos = $productos->get_productos();
        ?>
        <div class="row">
            <?php foreach ($datos as $row) : ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <?php
                        if($row['Descuento']>0){
                                ?>
                                <div class="badge bg-success text-white position-absolute" id="etiqueta" style="top: 0.5rem; right: 0.5rem"> <?php
                                echo $row['Descuento'];?>% Descuento
                                </div>
                                <?php
                            }
                            ?>
                        <img class="card-img-top" src="<?php 
                            if(isset($_SESSION["UsuarioID"])){
                                ?>
                                    <?php echo "../../".$row['Imagen'];
                            }else{
                                echo $row['Imagen'];
                            }
                                ?>"
                        alt="..." />

                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?php echo $row['Nombre']; ?></h5>
                                <span class="text-muted text-decoration-line-through"><?php
                                if($row['Descuento']>0){ ?>
                                    $<?php echo number_format($row['Precio'],2,'.',','); ?>MXN
                                    <?php
                                }else{
                                    echo '';
                                }
                                ?>
                                </span>
                                $<?php echo number_format($row['Precio']-($row['Precio']* $row['Descuento']/100),2,'.',',');?> MXN
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <buttton class="btn btn-outline-dark m-1 flex-shrink-0" type="button" id="<?php echo $row['ID_Pro'] ?>" onclick="detallePro(<?php echo $row['ID_Pro'] ?>,'<?php echo sha1($row['ID_Pro']) ?>')">Ver Productos</buttton>
                                <div id="">
                                <?php
                                    if(isset($_SESSION["UsuarioID"])){
                                        $resultado=$productos->validar($_SESSION["UsuarioID"], $row['ID_Pro']);
                                        foreach($resultado as $fila){
                                            $clave = $fila['clave'];
                                        }
                                        if($clave==1){
                                            ?>
                                                <button class="btn btn-success flex-shrink-0" type="button" id="btnAgregar" disabled="disabled">
                                                <i class="bi bi-cart-check-fill"></i>
                                                    Ya en Biblioteca
                                                </button>
                                            <?php
                                        }else{
                                            ?>
                                                <button class="btn btn-outline-success flex-shrink-0" type="button" id="btnAgregar" onclick="Comprar(<?php echo $row['ID_Pro'];?>)">
                                                    <i class="bi-cart-fill me-1"></i>
                                                    Comprar Producto
                                                </button>
                                            <?php
                                            
                                        }
                                    }else{
                                        ?>
                                        <buttton class="btn btn-outline-success m-1 flex-shrink-0" type="button" onclick="carrito()">Comprar Productos</buttton>   
                                        <?php
                                    }  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        break; 
    case "DetallePro":
        $datos = $productos->get_producto_x_id($_POST["ID_Pro"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["ID_Pro"] = $row["ID_Pro"];
                    $output["Nombre"] = $row["Nombre"];
                    $output["Descripcion"] = $row["Descripcion"];
                    $output["ID_CAT"] = $row["ID_Cat"];
                    $output["Categoria"] = $row["Categoria"];
                    $output["Imagen"] = $row["Imagen"];
                    $output["Precio"] = $row["Precio"];
                    $output["Descuento"] = $row["Descuento"];
                    $output["PrecioFinal"] = $row["PrecioFinal"];
                }
                echo json_encode($output);
            }
        break;
    case "Carrito":
        $datos = $productos->get_carrito($_POST['UsuarioID']);
        $data=array();
        if(is_array($datos)==true and count($datos)<>0){
            foreach($datos as $row){
                $sub_array= array();
                $sub_array[]= '<img src="../../'.$row["Imagen"].'" class="rounded mx-auto d-block" alt="..." height="90px">';
                $sub_array[]=$row["Nombre"];
                $sub_array[]="$".number_format($row["Subtotal"],2,'.',',')."MXN";
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["DtVentaID"].');"  id="'.$row["DtVentaID"].'" class="btn btn-outline-danger btn-icon "><div><i class=" fa fa-regular fa-trash"></i></div></button>';
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
    case "Agregar":
        $resultado=$productos->insert_carrito( $_SESSION["Correo"], $_SESSION["UsuarioID"], $_POST['ID_Pro']);
            foreach($resultado as $row){
                $clave = $row['clave'];
            }
            echo json_encode($clave);
        break;
    case "Eliminar":
        $productos->delete_carrito($_POST['DtVentaID']);
    case "Total":
        $resultado = $productos->get_total($_POST['UsuarioID']);
            foreach($resultado as $row){
                $total= number_format($row["total"],2,'.','') ;
            }
            echo json_encode($total);
        break;
    case "Biblioteca":
        $datos = $productos->get_biblioteca($_POST['UsuarioID']);
        $data=array();
        if(is_array($datos)==true and count($datos)<>0){
            foreach($datos as $row){
                $sub_array= array();
                $sub_array[]= '<img src="'.$row["Imagen"].'" class="rounded mx-auto d-block" alt="..." height="90px">';
                $sub_array[]=$row["Nombre"];
                $sub_array[] = '<button type="button" onClick="descargar()" width="16" height="16" class="btn btn-outline-success btn-icon "><div><i class="bi bi-arrow-down-circle-fill"></i></div></button>';
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

    case "Verificar":
        $resultado=$productos->validar($_SESSION["UsuarioID"], $_POST['ID_Pro']);
        foreach($resultado as $row){
            $clave = $row['clave'];
        }
        if($clave==1){
            ?>
                <button class="btn btn-success flex-shrink-0" type="button" id="btnAgregar" disabled="disabled">
                <i class="bi bi-cart-check-fill"></i>
                    Ya en Biblioteca
                </button>
            <?php
        }else{
            ?>
                <button class="btn btn-outline-dark flex-shrink-0" type="button" id="btnAgregar" onclick="Agregar(<?php echo $_POST['ID_Pro'];?>)">
                    <i class="bi-cart-fill me-1"></i>
                    Agregar al Carrito
                </button>
            <?php
            
        }
        break;
    case "DetalleCompra":
        $datos = $productos->DetalleCom($_POST['Transaccion_ID']);
        $data=array();
        if(is_array($datos)==true and count($datos)<>0){
            foreach($datos as $row){
                $sub_array= array();
                $sub_array[]=$row["Nombre"];
                $sub_array[]= "$".$row["Subtotal"]." MXN";
                $sub_array[]= $row["Transaccion_ID"];
                $sub_array[] = $row["Fecha_Registrada"];
                $sub_array[] = $row["Total"];
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
    case "listar":
        $datos = $productos->get_productos();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ID_Pro"];
            $sub_array[] = '<img class="rounded-0 mx-auto d-block" alt="..." height="100px" src="../../'.$row['Imagen'].'"/>';
            $sub_array[] = $row["Nombre"];
            $sub_array[] = $row["Precio"];
            $sub_array[] = $row["Descuento"]."%";
            $sub_array[] = '<button type="button" onClick="editar('.$row["ID_Pro"].');" width="16" height="16" class="btn btn-outline-success btn-icon "><div><i class=" bi bi-pencil-square"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_Pro"].');" width="16" height="16" class="btn btn-outline-danger btn-icon "><div><i class="bi bi-trash-fill"></i></div></button>';
           
            $data[]= $sub_array;
        }
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($results);
        
        break;
    case "BajarProducto":
        $productos->Eliminar($_POST["ID_Pro"]);
        break;
    case "guardaryeditar":
       if(empty($_POST["ID_Pro"])){
            $productos->nuevo($_POST["Nombre"],$_POST["Descripcion"],$_POST["ID_CAT"],$_POST["Precio"],$_POST["Descuento"],$_POST["Imagen"]);
       }else{
            $productos->actualizar_Prod($_POST["ID_Pro"],$_POST["Nombre"],$_POST["Descripcion"],$_POST["ID_CAT"],$_POST["Precio"],$_POST["Descuento"],$_POST["Imagen"]);
       }
        break;
}
?>

