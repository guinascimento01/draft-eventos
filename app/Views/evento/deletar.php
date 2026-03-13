<?php

require_once "C:/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/xampp/htdocs/draft-eventos/app/DB/Database.php";

$EventoController = new EventoController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $evento = $EventoController->deletar($id, null, null, null, null, null, null);
    header("Location:../../../index.php");
}
else{
    header("Location:../../index.php");
}

?>