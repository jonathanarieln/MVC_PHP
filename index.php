<?php
    require_once("database/database.php");


    // Todo esta lógica hara el papel de un FrontController
    if(!isset($_REQUEST['c']))
    {
      //Llamado de la página principal
      $controller = 'controller/contacts_controller.php';

    }
    else
    {
      if($_REQUEST['c']=="N")
      {
        $controller = 'controller/new_controller.php';
      }else if($_REQUEST['c']=="E")
      {
        $controller = 'controller/edit_controller.php';
      }else{
        $controller = 'controller/contacts_controller.php';
      }
    }

      require_once("$controller");
?>
