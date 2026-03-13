<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
</head>
<body>

    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required> <br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required> <br>

        <label for="data">Data:</label>
        <input type="date" name="data" required> <br>

        <label for="horario">Horário:</label>
        <input type="time" name="horario" required>

        <label for="local">Local:</label>
        <input type="text" name="local" required>

        <label for="max_part">Máximo de Participantes:</label>
        <input type="number" min="1" max="150" name="max_part" required>

        <input type="submit">
    </form>

</body>
</html>

<?php

require_once "C:/xampp/htdocs/draft-eventos/app/Controllers/EventoController.php";
require_once "C:/xampp/htdocs/draft-eventos/app/DB/Database.php";


$EventoController = new EventoController ($pdo);

if($_SERVER['REQUEST_METHOD'] == $_POST){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $max_part = $_POST['max_part'];

    $UsuarioController->cadastrar($nome, $descricao, $data, $horario, $local, $max_part);
    header("Location:../../index.php");
}

?>