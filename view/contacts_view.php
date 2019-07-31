<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Contactos</title>
</head>
<body>
<table>
   <form action="./" method="post">
     <input type="Hidden" name="c" value="N">
     <input type="submit" value="NUEVO">
   </form>
    <?php
    $objContacts = new contact();
    foreach ($objContacts->getAllContacts() as $contact) {
        ?>
        <tr>
            <td>
                <?php echo $contact["nombre"]; ?>
            </td>
            <td>
                <?php echo $contact["apellido"]; ?>
            </td>
            <td>
                <form action="./" method="post">
                  <input type="Hidden" name="id" value="<?php echo $contact["id"];?>">
                  <input type="Hidden" name="c" value="E">
                  <input type="submit" value="MODIFICAR">
                </form>
            </td>
            <td>
              <form action="./" method="post">
                <input type="Hidden" name="id" value="<?php echo $contact["id"];?>">
                <input type="submit" value="ELIMINAR">
              </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
