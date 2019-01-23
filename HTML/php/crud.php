<?php

    require_once("config.php");

    function abrirConexion(){

        try {

            $conn = new PDO("mysql:host=".SERVIDOR.";dbname=".BDAT, USUARIO, CONTRA, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        }
        catch(PDOException $e){
            echo "Error de Conexion: " . $e->getMessage();
        }

    }

    function cerrarConexion($conexion){

        $conexion = null;

    }

    function selectPreparado($tabla, $where){

        $consulta = "SELECT * FROM ".$tabla." WHERE ".$where;

        $conn = abrirConexion();

        $sql = $conn->prepare($consulta);

        $sql -> execute();

        return $resultado = $sql->fetchAll();

    }

    function selectPreparadoEspecial($tabla, $campos, $where){

        $consulta = "SELECT ".$campos." FROM ".$tabla." WHERE ".$where;

        $conn = abrirConexion();

        $sql = $conn->prepare($consulta);

        $sql -> execute();

        return $resultado = $sql->fetchAll();

    }

    function updatePreparado($tabla, $datos, $condicion){

        try{

            $update = "UPDATE ".$tabla." SET ".$datos." WHERE ".$condicion;

            $conn = abrirConexion();

            $sql = $conn->prepare($update);

            $sql -> execute();

            return true;

        }
        catch(PDOException $e){
            return false;
        }

    }

    function insertPreparado($tabla, $datos, $values){

        try{

            $insert = "INSERT INTO ".$tabla." (".$datos.") VALUES (".$values.")";

            $conn = abrirConexion();

            $sql = $conn->prepare($insert);

            $sql -> execute();

            return true;

        }
        catch(PDOException $e){
            return false;
        }


    }

?>
