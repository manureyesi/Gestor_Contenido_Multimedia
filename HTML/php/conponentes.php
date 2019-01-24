<?php

    require_once("crud.php");

    function listarPeliculas(){

      $error = true;
      $crearmenu = '';
      $resultado = selectPreparado("PELICULAS", "1");

      foreach ($resultado as $row){

          $error = false;

          $url_pelicula = str_replace(" ", "%", $row["NOMBRE"]);

          $crearmenu .= '<div class="gallery">
            <a href="VerPeliculas.php?pelicula='.$url_pelicula.'">
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

    function ErrorInicioSesion($error){

        $respuestaError = '';

        switch ($error) {
            case '1':
                $respuestaError = 'Los campos no pueden estar vacios';
                break;

            default:
                $respuestaError = 'Error Generico';
                break;
        }
        return $respuestaError;
    }

    function usuarioInicioSesion($usuario, $contrasena){

        $error = false;

        $resultado = selectPreparado("USUARIOS", "USUARIO = '".$usuario."' and CONTRASENA = '".$contrasena."'");

        foreach ($resultado as $row){
            $error = true;
        }

        return $error;

    }

    function reproducirPelicula($pelicula){

        $buscar_pelicula = str_replace("%", " ", $pelicula);

        $error = true;
        $crearPelis = '';
        $resultado = selectPreparado("PELICULAS", "NOMBRE = '".$buscar_pelicula."'");

        foreach ($resultado as $row){

            $error = false;
            $path;

            if (file_exists(CARPETA_PELIS1.$row["URL_VIDEO"])) {
                $path = CARPETA_PELIS1.$row["URL_VIDEO"];
            } else if (file_exists(CARPETA_PELIS2.$row["URL_VIDEO"])) {
                $path = CARPETA_PELIS2.$row["URL_VIDEO"];
            } else{
                $error = true;
            }

            $crearPelis .= '<video width="80%" height="50%" autoplay controls>
                             <source src="'.$path.'" type="video/mp4">
                             <source src="'.$path.'" type="video/x-matroska">
                            Your browser does not support the video tag.
                            </video> ';
        }

        if($error === true){
            header('Location: peliculas.php');
        }
        echo $crearPelis;

    }

    function incrementarVisita($pelicula){
        $buscar_pelicula = str_replace("%", " ", $pelicula);

        $resultado = selectPreparado("PELICULAS", "NOMBRE = '".$buscar_pelicula."'");

        foreach ($resultado as $row){
            $suma = $row["VISITAS"]+1;
            updatePreparado("PELICULAS", "VISITAS = ".$suma, "NOMBRE = '".$buscar_pelicula."'");
        }


    }

?>
