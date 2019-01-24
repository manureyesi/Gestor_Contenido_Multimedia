<?php

    require_once("conponentes.php");

    if($_POST["user"] == null || $_POST["pass"] == null){
        header('Location: ../index.php?error=1');
    }
    else{
        $pass = md5($_POST["pass"]);
        $usuario = $_POST["user"];

        if(usuarioInicioSesion($usuario, $pass)==true){
            IniciarSesion($usuario);
            header('Location: ../peliculas.php');
        }
        else{
            header('Location: ../index.php?error=2');
        }

    }
?>
