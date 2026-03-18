<?php
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";

$EventoController = new EventoController($pdo);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $EventoController->deletar($id);
    
    header("Location: /draft-eventos/index.php");
    exit(); 
} else {
    header("Location: /draft-eventos/index.php?erro=id_invalido");
    exit();
}