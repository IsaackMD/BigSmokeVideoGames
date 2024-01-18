<?php
    class Usuario extends Conectar{
    public function login(){
        $conectar = parent::Conexion();
        parent::set_names();
        if(isset($_POST["enviar"])){
            $correo = $_POST["Correo"];
            $pass = $_POST["Password"];
            if(empty($correo) and empty($pass)){
                header("Location:".Conectar::ruta()."/view/html/login.php?m=2");
                exit();
            }else{
                $sql = "SELECT * FROM usuario WHERE Correo= ? and Password = ? and Activo = 1;";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1,$correo);
                $stmt->bindValue(2,$pass);
                $stmt->execute();
                $resultado = $stmt->fetch();

                if(is_array($resultado) and count($resultado)>0){
                    $_SESSION["UsuarioID"]=$resultado["UsuarioID"];
                    $_SESSION["Nombre"]=$resultado["Nombre"];
                    $_SESSION["Apellido_P"]=$resultado["Apellido_P"];
                    $_SESSION["Apellido_M"]=$resultado["Apellido_M"];
                    $_SESSION["Correo"]=$resultado["Correo"];
                    $_SESSION["Avatar"]=$resultado["Avatar"];
                    $_SESSION["ID_Rol"]=$resultado["ID_Rol"];
                    if(isset($_SESSION["ID_Rol"]) and $_SESSION["ID_Rol"] == "1"){
                        header("Location:".Conectar::ruta()."view/Admin_Home");
                    }else{
                        header("Location:".Conectar::ruta()."view/Usu_home/");
                    }
                }else{
                    header("Location:".Conectar::ruta()."/view/html/login.php?m=1");
                    exit();
                }
            }
        }
    }
    public function singup(){
        $conectar = parent::Conexion();
        parent ::set_names();
        if(isset($_POST["submiT"])){
            $nom = $_POST["Nombre"];
            $apepP = $_POST["Apellido_P"];
            $apepM = $_POST["Apellido_M"];
            $correo = $_POST["Correo"];
            $contra = $_POST["contra"];
            $sex = $_POST["Sexo"];

            if(empty($nom) or empty($apepP) or empty($apepM) or empty($correo) or empty($contra) or empty($sex) ){
                header("Location:".Conectar::ruta()."/view/html/sign_up.php?m=2");
                exit();
            }else{
                $sql = "call crearCli(?,?,?,?,?,?);";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1,$nom);
                $stmt->bindValue(2,$apepP);
                $stmt->bindValue(3,$apepM);
                $stmt->bindValue(4,$correo);
                $stmt->bindValue(5,$sex);
                $stmt->bindValue(6,$contra);
                $stmt->execute();
                $resultado = $stmt->fetch();

                header("Location:".Conectar::ruta()."view/html/login.php");
                exit();
            }
        }
    }

    public function ListUsuario(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call ListUsuario();";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function nuevo($nom,$apep, $apem,$corre,$sex,$pass,$img){
        $conectar= parent::conexion();
        parent::set_names();
        $usuariox = new Usuario();
        $img= '';
        if($_FILES["Avatar"]["name"]!=''){
            $img = $usuariox->upload_file();
            $sql = "call CrearAdmin(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nom);
            $sql->bindValue(2,$apep);
            $sql->bindValue(3,$apem);
            $sql->bindValue(4,$corre);
            $sql->bindValue(5,$sex);
            $sql->bindValue(6,$pass);
            $sql->bindValue(7,$img);
            $sql->execute();
            return $sql->rowCount();
        }
    }

    public function actualizar($usuID,$nom,$apep,$apem,$corre,$sex,$pass,$img){
        $conectar= parent::conexion();
        parent::set_names();
        $usuariox = new Usuario();
        $img= '';
        if($_FILES["Avatar"]["name"]!=''){
            $img = $usuariox->upload_file();
            $sql = "call Actualizar_usu(?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usuID);
            $sql->bindValue(2,$nom);
            $sql->bindValue(3,$apep);
            $sql->bindValue(4,$apem);
            $sql->bindValue(5,$corre);
            $sql->bindValue(6,$sex);
            $sql->bindValue(7,$pass);
            $sql->bindValue(8,$img);
            $sql->execute();
            return $sql->rowCount();
        }else{
            $sql = "UPDATE `usuario` SET `Nombre`= ? ,`Apellido_P`=?,`Apellido_M`=?,`Correo`=?,`Sexo`=?,`Password`=?  WHERE `UsuarioID`= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nom);
            $sql->bindValue(2,$apep);
            $sql->bindValue(3,$apem);
            $sql->bindValue(4,$corre);
            $sql->bindValue(5,$sex);
            $sql->bindValue(6,$pass);
            $sql->bindValue(7,$usuID);

            $sql->execute();
            return $sql->rowCount();
        }
    }

    public function upload_file(){
        if(isset($_FILES['Avatar'])){
            $extension = explode('.',$_FILES['Avatar']['name']);
            $new_name = rand(). '.' .$extension[1];
            $destino = '../docs/phpemail/imgs_usu/'.$new_name;
            move_uploaded_file($_FILES['Avatar']['tmp_name'], $destino);
            return "docs/phpemail/imgs_usu/".$new_name;
        }
    }

    public function usuario_x_id($usuID){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "Select * from usuario where UsuarioID = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usuID);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Eliminar($usuID){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "call Baja_usuario(?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usuID);
        $sql->execute();
        return $sql->rowCount();
    } 
}
?>