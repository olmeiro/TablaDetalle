
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
  </head>
  <body>
    <h1 align="center">Facturación Login:</h1>
    <form class="" action="Usuario/Controlador/ControladorUsuario.php" method="post">
      Usuario: <input type="text" name="NombreUsuario" id="NombreUsuario" value="">
      <br>
      Contraseña: <input type="password" name="Contrasena" id="Contrasena" value="">
      <br>
      <!-- <input type="hidden" name="Acceder" id="Acceder" value=""> -->
      <!-- //hidden para identificar que vista realiza la peticion -->
      <button type="submit" name="Acceder">Acceder</button>
    </form>
  </body>
</html>
