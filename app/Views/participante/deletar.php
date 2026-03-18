<?php
// Importação do Controller de Participante e do Banco de Dados
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";

// Instância do Controller de Participante
$ParticipanteController = new ParticipanteController($pdo);

// Verifica se o ID foi enviado via URL e se é um número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Chama o método deletar do Controller de Participante
    $ParticipanteController->deletar($id);
    
    // Redireciona para a página principal após a exclusão
    header("Location: /draft-eventos/index.php");
    exit(); 
} else {
    // Redireciona com erro caso o ID seja inválido ou não exista
    header("Location: /draft-eventos/index.php?erro=id_invalido");
    exit();
}
?>