<?php
session_start();
require_once("model/contact.php");
$objEditController = new contact();
$idEdit = $_POST["id"];
foreach ($objEditController->getContactById($idEdit) as $contact) {
      $editNombre = $contact["nombre"];
      $editApellido = $contact["apellido"];
}
require_once("view/edit_view.php");
if(isset($_POST["c"])){
  $_SESSION["TIPO"] = $_POST["c"];
}
?>
