<?php
require_once "../../Controllers/InscricaoController.php";
require_once "../../DB/Database.php";
$ctrl = new InscricaoController($pdo);
if (isset($_GET['id'])) {
    $ctrl->delete($_GET['id']);
}