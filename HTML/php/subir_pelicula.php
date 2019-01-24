<?php

    require_once("conponentes.php");

    if($_POST["nombre"] == null || $_POST["url_video"] == null
    || $_POST["url_img"] == null || $_POST["fecha_salida"] == null){
        header('Location: ../anadirpelicula.php?error=1');
    }
    else{
        $nombre = $_POST["nombre"];
        $url_video = $_POST["url_video"];
        $url_img = $_POST["url_img"];
        $fecha_salida = $_POST["fecha_salida"];

        $cadena;
        $envioGenero = false;
        if($_POST["genero"] != NULL){
            $envioGenero = true;
            $cadena = "'".$nombre."' , '".$url_video."' , '".$url_img."' , '".$_POST["genero"]."' , '".$fecha_salida."'";
        } else{
            $envioGenero = false;
            $cadena = "'".$nombre."' , '".$url_video."' , '".$url_img."' , '".$fecha_salida."'";
        }

        if(subirPelicula($cadena, $envioGenero)){
            header('Location: ../anadirpelicula.php');
        }
        else{
            header('Location: ../anadirpelicula.php?error=2');
        }

    }

?>
