<?php

require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/InscricaoController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";

$EventoController = new EventoController($pdo);
$EventoController->listar();

$ParticipanteController = new ParticipanteController($pdo);
$ParticipanteController->listar();

$InscricaoController = new InscricaoController($pdo);
$InscricaoController->listarInscricoes();
?>