<?php
// me traigo hoja de funciones
  require_once("funciones.php");
// si NO esta logueado, redirijo al login
  if(!estaLogueado()) {
    header("location:login.php");exit;
  }
  // si esta logueado, busco al usuario por el id que me llega por $_GET
  // y me lo guardo en la variable $usuario
  $id = $_GET["id"];
  $usuario = buscarPorId($id);
// me guardo en la variable $file, la foto del usuario
  $file = glob('img/'.$usuario["usuario"].'.*');

  $file = $file[0];


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
	  <!-- traigo el nombre del usuario que me guarde anteriormente para imrpimirlo -->
    <h1>Bienvenidos al perfil de <?=$usuario["nombre"]?></h1>
    <ul>
		<!-- recorro los datos del usuario e imprimo todo menos ID y menos password -->
      <?php foreach($usuario as $propiedad => $valor) { ?>
        <?php if ($propiedad != "id" && $propiedad != "password") { ?>
          <li>
            <?=$propiedad?>: <?=$valor?>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>
	<!-- traigo imagen del usuario -->
    <img width="50" src="<?=$file?>" alt="">

	<br><br>
	<a href="inicio.php">Ir al inicio</a>
	<br>
	<a href="deslogueo.php">Cerrar sesion ! </a>

  </body>
</html>
