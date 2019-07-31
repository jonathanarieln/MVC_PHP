<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="./" method="post">
    Nombre: <input type="text" name="nombre" value="<?php echo $editNombre ?>"><br>
    Apellido: <input type="text" name="apellido" value="<?php echo $editApellido ?>"><br>
    <input type="hidden" name="idEditar" value="<?php echo $_POST["id"];?>">
    <input type="submit" value="ACTUALIZAR">
    </form>
  </body>
</html>
