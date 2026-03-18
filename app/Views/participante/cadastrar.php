<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Participantes</title>
</head>

<body>

    <h2>Cadastrar Novo Participante</h2>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" required> <br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required> <br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required> <br>

        <input type="submit" value="Cadastrar">
    </form>

</body>

</html>

<?php

require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";


$ParticipanteController = new ParticipanteController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    // O Controller cuidará de transformar a senha em hash antes de enviar ao Model
    $ParticipanteController->cadastrar($nome, $email, $telefone, $senha);
    
    // Redireciona para a página principal após o cadastro
    header("Location: ../../../index.php");
    exit();
}

?>