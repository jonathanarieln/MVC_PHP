<?php
session_start();

require_once("model/contact.php");
require_once("view/contacts_view.php");

if(isset($_POST["id"])&&isset($_POST["eliminar"])){
  if($objContacts->deleteContactById($_POST["id"])){
    echo "<script>location.reload();</script>";
  }

}
unset($_POST["eliminar"]);

if(isset($_SESSION["TIPO"])){
  if($_SESSION["TIPO"]=="N"){
    echo "Añadiremos al nuevo contacto";
    $objContacts->insertContact($_POST["nombre"],$_POST["apellido"]);
    session_unset();
    session_destroy();
    echo "<script>location.reload();</script>";
  }

  if($_SESSION["TIPO"]=="E"){
    echo "Editaremos al contacto";
    $objContacts->editContact($_POST["nombre"],$_POST["apellido"],$_POST["idEditar"]);
    session_unset();
    session_destroy();
    echo "<script>location.reload();</script>";
  }


}

?>
