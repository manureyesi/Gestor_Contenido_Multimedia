<?php

    require_once("crud.php");

    function listarPeliculas(){

      $error = true;
      $crearmenu = '';
      $resultado = selectPreparado("PELICULAS", "1");

      foreach ($resultado as $row){

          $error = false;

          $url_pelicula = str_replace(" ", "_", $row["NOMBRE"]);

          $crearmenu .= '<div class="gallery">
            <a target="_blank" href="VerPeliculas?pelicula='.$url_pelicula.'">
              <img src="'.$row["URL_IMG"].'" alt="'.$row["NOMBRE"].'" width="600" height="400">
            </a>
            <div class="desc">'.$row["NOMBRE"].'</div>
          </div>';

      }

      if($error === true){
      }
      echo $crearmenu;
    }

    function IniciarSesion($usuario){

        session_start();
        $_SESSION["USUARIO"] = $usuario;

    }

    function ComprobarSesion(){

        session_start();
        $error = false;

        if($_SESSION!=NULL){

            $resultado = selectPreparado("USUARIOS", "USUARIO = '".$_SESSION["USUARIO"]."'");

            foreach ($resultado as $row){
                $error = true;
            }
        }

        return $error;
    }

?>
