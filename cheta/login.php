<?php
// incluyo oja de funciones
  require_once("funciones.php");


// si el usuario esta logueado redirecciono a pagina de inicio
  if(estaLogueado()) {
    header("location:index.php");exit;
  }
//declaro array de errores vacio !
  $errores = [];

//si me envian algo por post, entro a este if
  if ($_POST) {
	 // en el array "errores", declarado vacio anteriormente, guardo los errores que devuelve la validacion, solo en caso de que existan los mismos.
    $errores = validarLogin($_POST);

// si valirdarLogin , no me devuelve ningun error, es decir, SI MI ARRAY ERRORES SE ENCUENTRA VACIO, entro al if
    if(empty($errores)) {
	// me guardo en la variable $usuario los datos del usuario que se quiere loguear
      $usuario = buscarPorMail($_POST["mail"]);
	 // guardo al ID del usuario en session.
      loguear($usuario);

	  // si checkean "recordarme" guardo al usuario en su cookie por 30 dias
      if (isset($_POST["recordame"])) {
        setcookie("idUser", $usuario["id"], time() + 60 * 60 * 24 * 30);
      }
// redirecciono al usuario a su perfil
      header("location:perfilDeUsuario.php?id=" . $usuario["id"]);exit;
    }
  }
?>
<?php require_once("head.php"); ?>
  <body>
    <?php require_once("header.php"); ?>
    <h1>Login</h1>

<!-- si validarLogin me guardó errores en el array $errores, los recorro y los imprimo -->

    <?php if(count($errores) > 0) { ?>
      <ul>
          <?php foreach($errores as $error) { ?>
            <li>
              <?=$error?>
            </li>
          <?php } ?>
      </ul>
    <?php } ?>
    <form action="login.php" method="post">
      <div class="">
        <label for="">Mail</label>
        <input type="text" name="mail" value="">
      </div>
      <div class="">
        <label for="">Contraseña</label>
        <input type="password" name="password" value="">
      </div>
      <div class="">
        <input type="checkbox" name="recordame">Recordame
      </div>
      <div class="">
        <input type="submit" name="" value="Login">
      </div>
    </form>
	<br><br><br>
	No tenes usuario ?<a href="form.php"> RRRegistrate ! </a>
  <?php require_once("footer.php"); ?>
  </body>
</html>
