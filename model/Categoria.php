<?php 

Class Categoria extends Conectar{

    public function get_categoria(){
        $conectar = parent :: Conexion();
        parent :: set_names();
        $sql="SELECT * FROM categoria";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function get_categoria_x_id($ID_CAT){
        $conectar = parent :: Conexion();
        parent :: set_names();
        $sql="SELECT Categoria FROM categoria Where ID_CAT = ?";
        $sql= $conectar -> prepare ($sql);
        $sql->bindValue(1,$ID_CAT);
        $sql->execute();
        return $sql->fetchAll();
    }
}



?>