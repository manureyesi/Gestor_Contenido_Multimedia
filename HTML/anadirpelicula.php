<!DOCTYPE html>
<html lang="es">
<head>

    <?php

        require_once("php/conponentes.php");

		if(ComprobarSesion()==false){
			header('Location: index.php');
		}

	?>

  	<title>Añadir Pelicula</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="css/peliculas_style.css">
    <!--===============================================================================================-->
</head>
<body>

    <form action="php/subir_pelicula.php" method="post">

        Nombre: <input type="text" name="nombre" placeholder="Nombre"><br>
        Url Video: <input type="text" name="url_video" placeholder="Url Video"><br>
        Url IMG: <input type="text" name="url_img" placeholder="Url IMG"><br>
        Genero: <select name="genero">
                  <?php
                  echo listaGeneros();
                  ?>
                </select><br>
        Fecha Salida: <input type="text" name="fecha_salida" placeholder="Fecha Salida">
        <br>
        <br>
        <input type="submit" name="submit" value="Enviar"/>


    </form>

</body>
</html>
