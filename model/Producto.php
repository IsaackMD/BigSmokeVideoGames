<?php

class Producto extends Conectar{
    public function get_productos(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "select * from productos where Activo = 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_producto_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call detalle_pro_x_id(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_carrito($idusu){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call ListCarrito(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$idusu);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_total($idusu){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call total(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$idusu);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_carrito($correo, $idusu, $proid){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call AgregarCarrito(?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$correo);
        $sql->bindValue(2,$idusu);
        $sql->bindValue(3,$proid);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete_carrito($IDdtVen){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call EliminarCarrito(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$IDdtVen);
        $sql->execute();
        return $sql->rowCount();
    }

    public function get_biblioteca($idusu){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call ListarBiblioteca(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$idusu);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validar($idusu,$prod){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call validarExis(?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$idusu);
        $sql->bindValue(2,$prod);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }  
    public function DetalleCom($idtrans){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call DetalleCompra(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$idtrans);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    } 
    public function Eliminar($proid){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call BajaProductos(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$proid);
        $sql->execute();
        return $sql->rowCount();
    } 
    public function nuevo($nom,$des, $catID,$precio,$Descuento,$img){
        $conectar= parent::conexion();
        parent::set_names();
        $prodx = new Producto();
        $img= '';
        if($_FILES["Imagen"]["name"]!=''){
            $img = $prodx->upload_file();
            $sql = "call CreaProduct(?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nom);
            $sql->bindValue(2,$des);
            $sql->bindValue(3,$catID);
            $sql->bindValue(4,$precio);
            $sql->bindValue(5,$Descuento);
            $sql->bindValue(6,$img);
            $sql->execute();
            return $sql->rowCount();
        }
    }
    public function actualizar_Prod($prodID,$nom,$des, $catID,$precio,$Descuento,$img){
        $conectar= parent::conexion();
        parent::set_names();
        $prodx = new Producto();
        $img= '';
        if($_FILES["Imagen"]["name"]!=''){
            $img = $prodx->upload_file();
            $sql = "call actualizar_productos(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prodID);
            $sql->bindValue(2,$nom);
            $sql->bindValue(3,$des);
            $sql->bindValue(4,$catID);
            $sql->bindValue(5,$precio);
            $sql->bindValue(6,$Descuento);
            $sql->bindValue(7,$img);
            $sql->execute();
            return $sql->rowCount();
        }else{
            $sql = "UPDATE `productos` SET `Nombre`= ? ,`Descripcion`= ? ,`ID_CAT`= ? ,`Precio`= ? ,`Descuento`= ? WHERE ID_Pro = ? and Activo = 1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nom);
            $sql->bindValue(2,$des);
            $sql->bindValue(3,$catID);
            $sql->bindValue(4,$precio);
            $sql->bindValue(5,$Descuento);
            $sql->bindValue(6,$prodID);
            $sql->execute();
            return $sql->rowCount();
        }
    }

    public function upload_file(){
        if(isset($_FILES["Imagen"])){
            $extension = explode('.',$_FILES['Imagen']['name']);
            $new_name = rand(). '.' .$extension[1];
            $destino = '../docs/phpemail/imgs/'.$new_name;
            move_uploaded_file($_FILES['Imagen']['tmp_name'], $destino);
            return "docs/phpemail/imgs/".$new_name;
        }
    }
}


?>