<!DOCTYPE html>
<html lang="es">
<head>

    <?php

        require_once("php/conponentes.php");

		if(ComprobarSesion()==false){
			header('Location: index.php');
		}

	?>

  	<title>Peliculas</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="css/peliculas_style.css">
    <!--===============================================================================================-->
</head>
<body>

    <?php
        require_once("php/conponentes.php");
        listarPeliculas();
    ?>

</body>
</html>
