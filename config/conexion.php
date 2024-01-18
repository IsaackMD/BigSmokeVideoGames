<?php

    session_start();

    class Conectar{
        protected $dbh;

        public function Conexion(){
            try{
                    $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=bd_bgsmoke_20","root","");
                    return $conectar;
            }catch(Exception $e){
                print "!Error BD!:".$e->getMessage()."<br>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
        public static function ruta(){
            return "http://localhost/Big-Smoke_2.0/";
        }
    }


?>