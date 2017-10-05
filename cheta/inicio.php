<?php
// traigo hoja de funciones
  require_once("funciones.php");
//si NO esta logueado, redirecciono al login
  if(!estaLogueado()) {
    header("location:login.php");exit;
  }else {
    echo "<h2>Bienvenido</h2>";
  }

?>

<?php require_once("head.php"); ?>
<?php require_once("header.php"); ?>
  <body>
    <h1>Bienvenidos a Cheeta Tech's</h1>

	<br><br><br>
	<a href="deslogueo.php">Cerrar sesion ! </a>
<?php require_once("footer.php"); ?>
  </body>
</html>
