<?php
session_start();
require_once("model/contact.php");
require_once("view/new_view.php");

if(isset($_POST["c"])){
  $_SESSION["TIPO"] = $_POST["c"];
}
?>
