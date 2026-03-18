<?php

require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/Controllers/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/draft-eventos/app/DB/Database.php";

$ParticipanteController = new ParticipanteController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $participante = $ParticipanteController->buscarParticipante($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Participante</title>
</head>
<body>
    
    <h2>Editar Participante</h2>
    <form action="" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $participante['nome']; ?>" required> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $participante['email']; ?>" required> <br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?= $participante['telefone']; ?>" required> <br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" value="<?= $participante['senha']; ?>" required> <br>

        <input type="submit" value="Atualizar">

    </form>

</body>
</html>

<?php
} 
else {
    header("Location: /draft-eventos/app/Views/participante/listar.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Chama o método editar passando os 5 parâmetros necessários (nome, email, telefone, senha, id)
    $ParticipanteController->editar($nome, $email, $telefone, $senha, $id);
    
    header("Location: /draft-eventos/index.php");
    exit();
}
?>